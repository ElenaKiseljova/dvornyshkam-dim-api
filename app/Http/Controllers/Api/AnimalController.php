<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\AnimalUpdateRequest;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB::enableQueryLog();

        $animals = Animal::allowedTrash()
            ->allowedSorts(['name', 'slug', 'category', 'gender', 'birthday', 'animal_friendly', 'vaccinated', 'created_at', 'updated_at'], 'created_at')
            ->allowedSearch('name', 'slug', 'id')
            ->allowedFilters('category', 'gender', 'vaccinated', 'weight')
            ->paginate(request()->query('per_page') ?? 15);

        // dump(DB::getQueryLog());

        if (request()->wantsJson()) {
            return response()->json(['data' => $animals], 200);
        }

        return view('animals.index', compact('animals'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animal = new Animal();

        $categories = Animal::CATEGORIES;
        $genders = Animal::GENDERS;

        return view('animals.create', compact('animal', 'categories', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request)
    {
        $animal = Animal::create([...$request->validated(), 'image' => null]);

        $animal->update([...$request->validated(), 'image' => $this->uploadImage($animal)]);

        $message = 'Animal has been added successfully';

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $animal,
                'message' => $message
            ], 201);
        }

        return redirect()->route('animals.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string | int $animal)
    {
        if (is_numeric($animal)) {
            $animal = Animal::where('id', $animal)->firstOrFail();
        } else {
            $animal = Animal::where('slug', $animal)->firstOrFail();
        }

        if (request()->wantsJson()) {
            return response()->json(['data' => $animal,], 200);
        }

        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $categories = Animal::CATEGORIES;
        $genders = Animal::GENDERS;

        return view('animals.edit', compact('animal', 'categories', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalUpdateRequest $request, Animal $animal)
    {
        $animal->update([...$request->validated(), 'image' => $this->uploadImage($animal)]);

        $message = 'Animal has been updated successfully';

        if (request()->wantsJson()) {
            return response()->json(['data' => $animal, 'message' => $message], 200);
        }

        return redirect()->route('animals.index')->with('message', $message);
    }


    /**
     * Move the specified resource to trash.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        $message = 'Animal has been moved to trash.';

        if (request()->wantsJson()) {
            return response()->json(['data' => $animal, 'message' => $message], 200);
        }

        $redirect = request()->query('redirect');

        return ($redirect ? redirect()->route($redirect) : back())
            ->with('message', $message)
            ->with('undoRoute', getUndoRoute('animals.restore', $animal));
    }

    /**
     * Move the specified resource from trash.
     */
    public function restore(Animal $animal)
    {
        $animal->restore();

        $message = 'Animal has been restored from trash.';

        if (request()->wantsJson()) {
            return response()->json(['data' => $animal, 'message' => $message], 200);
        }

        return back()
            ->with('message', $message)
            ->with('undoRoute', getUndoRoute('animals.destroy', $animal));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function forceDelete(Animal $animal)
    {
        $animal->forceDelete();


        $message = 'Animal has been removed permanently';

        if (request()->wantsJson()) {
            return response()->json(['data' => $animal, 'message' => $message], 200);
        }

        return back()
            ->with('message', $message);
    }

    protected function uploadImage(Animal $animal)
    {
        if (request()->hasFile('image')) {
            $uploadedFile = request()->file('image');

            $fileName = $uploadedFile->storeAs(
                "animals/{$animal->id}",
                'main' . '.' . $uploadedFile->getClientOriginalExtension()
            );

            $url = Storage::url($fileName);

            return $url;
        }

        return $animal->image;
    }
}

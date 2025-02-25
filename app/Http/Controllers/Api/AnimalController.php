<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\AnimalUpdateRequest;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('animals.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request)
    {
        $animal = Animal::create($request->validated());

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
    public function show(Animal $animal)
    {
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
        return view('animals.edit')->with('animal', $animal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalUpdateRequest $request, Animal $animal)
    {
        $animal->update($request->validated());

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
}

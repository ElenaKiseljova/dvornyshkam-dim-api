<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    $animals = Animal::latest()
      ->allowedSorts(['name', 'slug', 'category', 'gender', 'birthday', 'animal_friendly', 'vaccinated', 'created_at', 'updated_at'], 'created_at')
      ->allowedSearch('name', 'slug')
      ->allowedFilters('category', 'gender', 'vaccinated', 'weight')
      ->paginate(request()->query('per_page') ?? 15);

    // dump(DB::getQueryLog());

    return response()->json($animals, 200);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

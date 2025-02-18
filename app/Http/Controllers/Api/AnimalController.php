<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $animals = Animal::latest()
      ->where(function ($query) {
        if ($search = request()->query('search')) {
          $query->where('name', 'like', "%{$search}%");
          $query->orWhere('slug', 'like', "%{$search}%");
        }
      })
      ->where(function ($query) {
        if ($gender = request()->query('gender')) {
          $query->where('gender', $gender);
        }
      })
      ->where(function ($query) {
        if ($vaccinated = request()->query('vaccinated')) {
          $query->where('vaccinated', boolval($vaccinated));
        }
      })
      ->where(function ($query) {
        if ($weight_min = request()->query('weight_min')) {
          $query->where('weight', '>=', $weight_min);
        }
      })
      ->where(function ($query) {
        if ($weight_max = request()->query('weight_max')) {
          $query->where('weight', '<=', $weight_max);
        }
      })
      ->orderBy(request()->query('order_by') ?? 'created_at', request()->query('order') ?? 'asc')
      ->paginate(request()->query('per_page') ?? 15);



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

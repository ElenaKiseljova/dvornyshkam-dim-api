<?php

use App\Http\Controllers\Api\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/animals', AnimalController::class);
Route::delete('/animals/{animal}/restore', [AnimalController::class, 'restore'])
    ->name('animals.restore')
    ->withTrashed();
Route::delete('/animals/{animal}/force-delete', [AnimalController::class, 'forceDelete'])
    ->name('animals.force-delete')
    ->withTrashed();

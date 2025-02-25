<?php

use App\Http\Controllers\Api\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/animals', AnimalController::class);
Route::controller(AnimalController::class)
    ->prefix('/animals')
    ->group(function () {
        Route::delete('/{animal}/restore', 'restore')->name('animals.restore')->withTrashed();
        Route::delete('/{animal}/forceDelete', 'forceDelete')->name('animals.force-delete')->withTrashed();
    });

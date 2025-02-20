<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Middleware\ApiMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('/animals', AnimalController::class)->middleware(ApiMiddleware::class)->except(['edit', 'create']);
Route::controller(AnimalController::class)
    ->prefix('/animals')
    ->middleware(ApiMiddleware::class)
    ->group(function () {
        Route::delete('/{id}/restore', 'restore');
        Route::delete('/{id}/forceDelete', 'forceDelete');
    });

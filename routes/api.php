<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Middleware\ApiMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/animals', AnimalController::class)->except(['edit', 'create'])->middleware(ApiMiddleware::class);
Route::controller(AnimalController::class)
    ->middleware(ApiMiddleware::class)
    ->prefix('/animals')
    ->group(function () {
        Route::delete('/{animal}/restore', 'restore')->withTrashed();
        Route::delete('/{animal}/forceDelete', 'forceDelete')->withTrashed();
    });

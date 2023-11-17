<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('pets', [PetController::class, 'index']);
Route::post('pets', [PetController::class, 'store']);
Route::delete('pets/{id}', [PetController::class, 'destroy']);
Route::get('pets/{id}', [PetController::class, 'show']);
Route::put('pets/{id}', [PetController::class, 'update']);

Route::post('breeds', [BreedController::class, 'store']);
Route::get('breeds', [BreedController::class, 'index']);

/*
Route::resource('pets', PetController::class)
  ->only(['index', 'show', 'store', 'update', 'destroy']);
*/
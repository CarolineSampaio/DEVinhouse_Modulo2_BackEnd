<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SpecieController;
use Illuminate\Support\Facades\Route;

Route::post('breeds', [BreedController::class, 'store']);
Route::get('breeds', [BreedController::class, 'index']);

Route::post('species', [SpecieController::class, 'store']);
Route::get('species', [SpecieController::class, 'index']);


Route::post('pets', [PetController::class, 'store']);
Route::get('pets', [PetController::class, 'index']);

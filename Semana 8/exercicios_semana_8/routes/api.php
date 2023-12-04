<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Route;

Route::resource('peoples', PeoplesController::class)->only(
    ['index', 'show', 'store', 'update', 'destroy']
);

Route::resource('pets', PetController::class)->only(
    ['index', 'show', 'store', 'update', 'destroy']
);

Route::get('races', [RaceController::class, 'index']);
Route::get('races/{id}', [RaceController::class, 'show']);
Route::post('races', [RaceController::class, 'store']);
Route::put('races/{id}', [RaceController::class, 'update']);
Route::delete('races/{id}', [RaceController::class, 'destroy']);

<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('pets', [PetController::class, 'index']);
Route::post('pets', [PetController::class, 'store']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
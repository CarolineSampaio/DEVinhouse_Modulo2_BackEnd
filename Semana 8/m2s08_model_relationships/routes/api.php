<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\BandsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('artists', ArtistsController::class)->except(['create', 'edit']);
Route::resource('bands', BandsController::class)->except(['create', 'edit']);

// Route::prefix('bands')->group(function () {
//   Route::get('/', [BandsController::class, 'index']);
//   Route::get('/{id}', [BandsController::class, 'show']);
//   Route::post('/', [BandsController::class, 'store']);
//   Route::patch('/{id}', [BandsController::class, 'update']);
//   Route::delete('/{id}', [BandsController::class, 'delete']);
// });
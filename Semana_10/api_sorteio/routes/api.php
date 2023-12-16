<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('clients', [ClientController::class, 'store']);
Route::get('clients', [ClientController::class, 'index']);
Route::put('clients/{id}', [ClientController::class, 'update']);
Route::delete('clients/{id}', [ClientController::class, 'destroy']);

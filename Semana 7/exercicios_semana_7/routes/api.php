<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMarkerController;
use Illuminate\Support\Facades\Route;

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::post('/markers', [MarkerController::class, 'store']);
Route::get('/markers', [MarkerController::class, 'index']);
Route::delete('/markers/{id}', [MarkerController::class, 'destroy']);

Route::post('/product_markers', [ProductMarkerController::class, 'store']);
Route::get('/product_markers', [ProductMarkerController::class, 'index']);
Route::delete('/product_markers/{id}', [ProductMarkerController::class, 'destroy']);

Route::post('/avaliation', [AvaliationController::class, 'store']);
Route::get('/avaliation', [AvaliationController::class, 'index']);
Route::get('/avaliation/{id}', [AvaliationController::class, 'show']);
Route::put('/avaliation/{id}', [AvaliationController::class, 'update']);
Route::delete('/avaliation/{id}', [AvaliationController::class, 'destroy']);

Route::get('assets', [AssetController::class, 'index']);
Route::post('assets', [AssetController::class, 'store']);
Route::get('assets/{id}', [AssetController::class, 'show']);
Route::delete('assets/{id}', [AssetController::class, 'destroy']);
Route::put('assets/{id}', [AssetController::class, 'update']);

Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('achievements', [AchievementController::class, 'index']);
Route::post('achievements', [AchievementController::class, 'store']);
Route::put('/achievements/{id}', [AchievementController::class, 'update']);
Route::delete('/achievements/{id}', [AchievementController::class, 'destroy']);

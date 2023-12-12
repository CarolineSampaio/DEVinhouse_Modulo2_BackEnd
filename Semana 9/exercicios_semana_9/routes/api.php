<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMarkerController;
use App\Http\Controllers\ProductRequirementController;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);
Route::put('products/{id}', [ProductController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
Route::put('categories/{id}', [CategoryController::class, 'update']);

Route::get('achievements', [AchievementController::class, 'index']);
Route::post('achievements', [AchievementController::class, 'store']);

Route::get('products_requirements', [ProductRequirementController::class, 'index']);
Route::post('products_requirements', [ProductRequirementController::class, 'store']);

Route::get('markers', [MarkerController::class, 'index']);
Route::post('markers', [MarkerController::class, 'store']);

Route::get('product_markers', [ProductMarkerController::class, 'index']);
Route::post('product_markers', [ProductMarkerController::class, 'store']);

Route::get('assets', [AssetController::class, 'index']);
Route::post('assets', [AssetController::class, 'store']);
Route::get('assets/{id}', [AssetController::class, 'show']);
Route::delete('assets/{id}', [AssetController::class, 'destroy']);
Route::put('assets/{id}', [AssetController::class, 'update']);

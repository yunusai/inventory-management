<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

Route::post('/items', [ItemController::class, 'store']); // Create a new item
Route::get('/items', [ItemController::class, 'index']); // List all items
Route::get('/items/low-stock', [ItemController::class, 'lowStock']); // List items with low stock
Route::get('/items/summary', [ItemController::class, 'summary']); // Get item summary

Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/suppliers', [SupplierController::class, 'store']);
Route::get('/suppliers', [SupplierController::class, 'index']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

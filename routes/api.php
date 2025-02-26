<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Category
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);

// Order
Route::post('/orders', [CategoryController::class, 'store']);
Route::get('/orders', [CategoryController::class, 'index']);
Route::get('/orders/{id}', [CategoryController::class, 'show']);
Route::put('/orders', [CategoryController::class, 'update']);

// Product
Route::post('/products', [CategoryController::class, 'store']);
Route::get('/products', [CategoryController::class, 'index']);
Route::get('/products/{id}', [CategoryController::class, 'show']);

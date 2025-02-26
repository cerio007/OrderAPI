<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/productzz', function () {
    $user = Product::all();
    return $user;
});

Route::post('/orders', [CategoryController::class, 'store']);
Route::get('/orders', [CategoryController::class, 'index']);
Route::get('/orders/{id}', [CategoryController::class, 'show']);
Route::put('/orders', [CategoryController::class, 'update']);

Route::post('/products', [CategoryController::class, 'store']);
Route::get('/products', [CategoryController::class, 'index']);
Route::get('/products/{id}', [CategoryController::class, 'show']);

Route::post('/productzz', function (Request $request) {
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    } catch (\Throwable $th) {
        return response()->json(['data' => $th->getMessage(), 'mumu' => $request]);
    }
});

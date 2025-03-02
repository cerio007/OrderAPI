<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $prodService;

    public function __construct(ProductService $productService)
    {
        $this->prodService = $productService;
    }
// Get all Product
    public function index()
    {
        return $this->prodService->getProducts();
    }
// Create a Product
    public function store(Request $request, Product $product)
    {
        return $this->prodService->createProduct($request, $product);
        
    }
// Get a Product
    public function show($id)
    {
        return $this->prodService->getAProduct($id);
    }

// Update a Product
    public function update(Request $request, $id)
    {
        return $this->prodService->updateProd($request, $id);
    }
// Delete a Product
    public function destroy($id)
    {
        return $this->prodService->deleteProduct($id);
    }
}

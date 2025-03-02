<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

// Create Product
    public function createProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);
        return $this->productRepo->createProduct($request, $product);
    }

// Get Products
    public function getProducts()
    {
        return $this->productRepo->getProducts();
    }
// Get a Product
    public function getAProduct($id)
    {
        return $this->productRepo->getAProduct($id);
    }

// Update Product
    public function updateProd(Request $request, $id)
    {
        return $this->productRepo->updateProd($request, $id);
    }

// Delete Product
    public function deleteProduct($id)
    {
        return $this->productRepo->deleteProduct($id);
    }
}

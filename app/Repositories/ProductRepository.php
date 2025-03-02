<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
// Create Product
    public function createProduct(Request $request, Product $product)
    {
        try {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->category_id = $request->input('category_id');

        $product->save();
            return $this->responseData($product, "Created Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
// Get all Products
    public function getProducts()
    {
        try {
            $allProducts = Product::all();
            return $this->responseData($allProducts, "Fetched Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
// Get A Product
    public function getAProduct($id)
    {
        try {
            $product = Product::findOrFail($id);

            return $this->responseData($product, "Fetched Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
// Update Product
    public function updateProd(Request $request, $id)
    {
//     // Check if the category exists
//     if (isset($data['name']) && !Product::where('id', $data['name'])->exists()) {
//         return response()->json(['error' => 'Product not found'], 404);
//     }
    try {
        
          $updateProduct = Product::findOrFail($id);

          // Validate the request data
          $validatedProduct = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
          ]);
  
          // Update the user's attributes
          $updateProduct->name = $validatedProduct['name'];
          $updateProduct->description = $validatedProduct['description'];
          $updateProduct->price = $validatedProduct['price'];
          $updateProduct->stock_quantity = $validatedProduct['stock_quantity'];
          $updateProduct->category_id = $validatedProduct['category_id'];

          $updateProduct->save();
        return $this->responseData($updateProduct, "Product updated successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
// Delete Product
public function deleteProduct($id) {
    try {
        $product = Product::findOrFail($id);
        $product->delete();
        return $this->responseData($product, "Product deleted successfully");
    } catch (\Throwable $th) {
        return $this->responseData($th, "Failed");
    }
}
    private function responseData($data, $message)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }
}

<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function createProduct(array $product)
    {
        try {
            $createdProduct = Product::create($product);
            return $this->responseData($createdProduct, "Created Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }

    public function getProducts()
    {
        try {
            $allProducts = Product::all();
            return $this->responseData($allProducts, "Fetched Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }

    public function getAProduct($productId)
    {
        try {
            $product = Product::findOrFail($productId);

            return $this->responseData($product, "Fetched Successfully");
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

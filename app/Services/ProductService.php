<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function createProduct($data)
    {
        return $this->productRepo->createProduct($data);
    }

    public function getProducts()
    {
        return $this->productRepo->getProducts();
    }

    public function getAProduct($productId)
    {
        return $this->productRepo->getAProduct($productId);
    }
}

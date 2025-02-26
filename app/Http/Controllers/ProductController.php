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

    public function index()
    {
        return $this->prodService->getProducts();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        return $this->prodService->createProduct($request()->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $this->prodService->getAProduct($request['id']);
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $OrderService;

    public function __construct(OrderService $orderService)
    {
        $this->OrderService = $orderService;
    }

    public function index()
    {
        return $this->OrderService->getOrders();
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

        return $this->OrderService->createOrder($request()->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $this->OrderService->getAnOrder($request['id']);
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        return $this->OrderService->createOrder($request()->all());
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
    }
}

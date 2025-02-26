<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function createOrder($name)
    {
        try {
            $order = Order::create([
                'name' => $name
            ]);
            return $this->responseData($order, "Created Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }

    public function getOrder()
    {
        try {
            $allOrder = Order::all();
            return $this->responseData($$allOrder, "Fetched Successfully");
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

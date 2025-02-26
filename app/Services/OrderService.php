<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepo;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepo = $orderRepository;
    }

    public function createOrder($data)
    {
        return $this->orderRepo->createOrder($data);
    }

    public function getOrders()
    {
        return $this->orderRepo->getOrders();
    }

    public function getAnOrder($orderId)
    {
        return $this->orderRepo->getAnOrder($orderId);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Services\Interfaces\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService; //injection

    public function __construct(IOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function showByID($id): \Illuminate\Http\JsonResponse
    {
        $data = $this->orderService->show($id, null);
        return response()->json($data);
    }

    public function showByUser($id): \Illuminate\Http\JsonResponse
    {
        $data = $this->orderService->show(null, $id);
        return response()->json($data);
    }

    public function create()
    {
        return view('order.Home', [
                'users' => User::all(),
                'products' => Product::all()
            ]
        );
    }

    public function store(OrderRequest $orderRequest)
    {
        $attribute = $orderRequest->validated();
        $this->orderService->store($attribute);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $user = $order->User_id;
        return view('order.Update', [
                'user' => $user,
                'products' => Product::all(),
            ]
        );
    }

    public function update(OrderRequest $orderRequest, $user_id)
    {
        $attribute = $orderRequest->validated();
        $this->orderService->update($attribute, $user_id);
    }

}

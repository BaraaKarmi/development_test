<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use App\Services\Interfaces\IOrderService;
use phpDocumentor\Reflection\Types\This;

/**
 * Class OrderService.
 */
class OrderService implements IOrderService
{
    private $order;

    public function __construct(Order $order)
    {

        $this->order = $order;

    }

    public function create()
    {

    }

    public function all()
    {

    }

    public function show($attribute1, $attribute2)
    {
        if ($attribute1 != null) {
            $this->order = Order::find($attribute1);
            return $this->order;
        } elseif ($attribute2 != null) {
            return Order::where('User_id', $attribute2)->get();
        }
    }

    public function store(array $attribute)
    {
        $order = Order::create(['Order_date' => new \DateTime(), 'User_id' => $attribute['user']]);
        $order->products()->attach($attribute['product'], ['unit_price' => '0', 'quantity' => '0']);
        $payment = Payment::create(['payment_type' => $attribute['payment'], 'payment_date' => new \DateTime(), 'Order_id' => $order->id, 'price' => $attribute['price']]);
        $order->save();
        $payment->save();
    }

    public function update(array $attribute, $id)
    {
        $order = Order::find($id);
        $order->products()->attach($attribute['product'], ['product'], ['unit_price' => '0', 'quantity' => '0']);
        $order->save();
    }
}

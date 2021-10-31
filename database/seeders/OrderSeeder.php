<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = Order::create(['Order_date' => new \DateTime(), 'User_id' => '2']);
        $order->products()->attach(2, ['unit_price' => '200', 'quantity'=>'4']);

        $order = Order::create(['Order_date' => new \DateTime(), 'User_id' => '3']);
        $order->products()->attach(2, ['unit_price' => '400', 'quantity'=>'3']);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Int_;

class PayementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payments')->insert([

            [
                'payment_date' => new \DateTime(),
                'payment_type'=>\Str::random(3),
                'price'=>'100',
                'Order_id'=>'2',

            ],
            [
                'payment_date' => new \DateTime(),
                'payment_type'=>\Str::random(3),
                'price'=>'100',
                'Order_id'=>'3',
            ],
            [
                'payment_date' => new \DateTime(),
                'payment_type'=>\Str::random(3),
                'price'=>'100',
                'Order_id'=>'4',
            ]

        ]);
    }
}

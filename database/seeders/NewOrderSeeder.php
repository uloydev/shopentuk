<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'status' => 'unpaid',
            'user_id' => rand(3, 13), //done
            'user_address_id' => rand(1, 20),
            'shipping_price' => rand(3000, 13000), //done
            'shipping_point' => rand(10, 95), //done
            'product_price' => rand(30000, 130000), //done
            'product_point' => rand(1, 130), // done
            'price_total' => rand(300000, 13000000), //done
            'point_total' => rand(3, 123), //done
            'weight_total' => rand(3, 13), //done
            'voucher_discount' => rand(3, 13), //done
            'no_resi' => Str::random(10)
        ]);
    }
}

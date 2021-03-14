<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaymentConfirmation;
use App\Models\SiteSetting;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siteSetting = SiteSetting::first();
        $users = User::where('role', 'user')->inRandomOrder()->limit(10)->get();
        foreach ( $users as $index => $user ) {
            $products = Product::inRandomOrder()->limit(2)->get();
            $order = new Order();
            $order->user_id = $user->id;
            $order->user_address_id = $user->main_address->id;
            $order->product_price = 0;
            $order->shipping_price = $siteSetting->shipping_price;
            foreach ( $products as $product) {
                $orderProduct = OrderProduct::create([
                    'order_id' => $index+1,
                    'product_id' => $product->id,
                    'original_price' => $product->price,
                    'discounted_price' => $product->discount ? $product->discount->discounted_price : null,
                    'quantity' => 1,
                ]);
                if ($orderProduct->discounted_price) {
                    $order->product_price += $orderProduct->discounted_price;
                } else {
                    $order->product_price += $orderProduct->original_price;
                }
            }
            $order->grand_total = $order->product_price + $order->shipping_price;
            $order->save();
            if ( $order->id % 2 != 0) {
                PaymentConfirmation::create([
                    'full_name' => $user->name,
                    'phone' => $user->phone,
                    'order_id' => $order->id,
                    'payment_date' => Carbon::today(),
                    'payment_method' => 'ovo',
                ]);
            }
        }
    }
}

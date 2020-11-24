<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartItem::factory()->times(20)->create();
        // $users = User::where('role', 'customer')->get();
        // foreach ($users as $user) {
        //     CartItem::create([
        //         'cart_id' => Cart::create(['user_id' => $user->id])->id,
        //         'product_id' => Product::inRandomOrder()->first()->id,
        //         'quantity' => 1,
        //         'is_toko_point' => false
        //     ]);
        // }
    }
}

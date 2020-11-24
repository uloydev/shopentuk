<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $userIds = User::select('id')->where('role', 'customer')->get();
        $productIds = Product::all()->pluck('id');

        return [
            'image' => $this->faker->image(),
            'cart_id' => $this->faker->randomElement(Cart::all()->pluck('id')),
            'product_id' => $this->faker->randomElement($productIds),
            'quantity' => rand(1, 3),
            'is_toko_point' => false,
        ];
    }
}

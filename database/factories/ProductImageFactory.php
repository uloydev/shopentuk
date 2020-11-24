<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->randomElement([
                'img/hoodie.jpg',
                'img/telkomsel.jpg',
                'img/bag.jpg',
                'img/hoodie_blue.jpg',
                'img/jeans_women.jpg',
                'img/tshirt.jpg'
            ]),
            'product_id' => Product::factory(), //create new product based on ProductFactory, no need ProductSeeder
            'is_main_image' => true,
        ];
    }
}

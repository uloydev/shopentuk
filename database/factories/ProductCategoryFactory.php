<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = $this->faker->unique(true)->randomElement(['pria', 'wanita', 'pulsa', 'voucher']);
        
        $isDigitalProduct = false;
        switch ($categories) {
            case 'pria':
                $description = 'pakaian pria';
                break;

            case 'wanita':
                $description = 'pakaian wanita';
                break;

            case 'pulsa':
                $description = 'pulsa sim prabayar';
                $isDigitalProduct = true;
                break;
    
            case 'voucher':
                $description = 'voucher';
                $isDigitalProduct = true;
                break;
        }
        
        return [
            'title' => $categories,
            'description' => $description,
            'image' => "img/baju.jpg",
            'is_digital_product' => $isDigitalProduct,
        ];
    }
}

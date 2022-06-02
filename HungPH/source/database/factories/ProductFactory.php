<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $product = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->title,
            'quantity' => $this->faker->randomFloat(1, 100),
            'price' => $this->faker->randomDigit,
            'origin' => $this->faker->country(),
        ];
    }
}

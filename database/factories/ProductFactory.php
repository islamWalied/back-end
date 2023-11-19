<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->sentence(2),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(0,1,500),
            'quantity' => $this->faker->randomFloat(0,1,50),
            'age_range' => $this->faker->randomFloat(0,1,13),
            'image' => $this->faker->imageUrl
        ];
    }
}

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
            'product_name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(50,500),
            'quantity' => $this->faker->randomFloat(5,50),
            'age_range' => $this->faker->randomFloat(1,13),
            'image' => $this->faker->imageUrl
        ];
    }
}

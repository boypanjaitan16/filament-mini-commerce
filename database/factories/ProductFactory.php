<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
            'product_category_id' => fake()->randomElement(ProductCategory::all()->pluck('id')),
            'name' => fake()->words(5, true),
            'price' => fake()->numberBetween(10000, 100000),
            'description' => fake()->paragraph(10)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();
        return [
            'user_id' => User::factory(),
            'product_id' => $product->id, // Assign a random product
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $product->price * $this->faker->numberBetween(1, 5),
        ];
    }
}

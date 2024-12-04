<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friendships>
 */
class FriendshipsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customers_id' => Customers::factory(),
            'friendship_customers_id' => Customers::factory(),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected'])
        ];
    }
}

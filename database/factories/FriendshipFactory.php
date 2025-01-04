<?php

namespace Database\Factories;

use App\Enums\FriendshipRoles;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friendship>
 */
class FriendshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'friendship_customer_id' => Customer::factory(),
            'status' => FriendshipRoles::random(),
        ];
    }
}

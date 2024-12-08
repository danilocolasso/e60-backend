<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Comment;
use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'customers_id' => Customer::factory(),
            'parent_comments_id' => Comment::factory(),
            'approved_by_user_id' => User::factory(),
            'rooms_id' => Room::factory(),
            'approved_at' => $this->faker->dateTime(),
        ];
    }
}

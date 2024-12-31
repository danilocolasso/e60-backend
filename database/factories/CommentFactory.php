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
class CommentFactory extends Factory
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
            'customer_id' => Customer::query()->inRandomOrder()->value('id') ?? Customer::factory(),
            'parent_comment_id' => Comment::query()->inRandomOrder()->value('id') ?? Comment::factory(),
            'approved_by_user_id' => User::query()->inRandomOrder()->value('id') ?? User::factory(),
            'room_id' => Room::query()->inRandomOrder()->value('id') ?? Room::factory(),
            'approved_at' => $this->faker->dateTime(),
        ];
    }
}

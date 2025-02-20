<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomSchedule>
 */
class RoomScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'booking_id' => Booking::inRandomOrder()->first()->id,
            'start_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'end_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'value' => $this->faker->randomFloat(2, 100, 1000),
            'participants' => $this->faker->numberBetween(1, 20),
            'is_blocked' => $this->faker->boolean(),
            'block_reason' => $this->faker->sentence(),
            'blocked_by_user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

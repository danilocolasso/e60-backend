<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
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
        $startTime = Carbon::instance($this->faker->dateTimeBetween('-1 month', 'now'));
        $endTime = (clone $startTime)->addMinutes(40);

        return [
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
            'room_id' => Room::query()->inRandomOrder()->value('id') ?? Room::factory(),
            // 'booking_id' => Booking::query()->inRandomOrder()->value('id') ?? Booking::factory(),
            'user_id' => User::query()->inRandomOrder()->value('id') ?? User::factory(),
            'date' => $startTime->format('Y-m-d'),
            'start_time' => $startTime->format('H:i:s'),
            'end_time' => $endTime->format('H:i:s'),
            'token' => $this->faker->unique()->bothify('####-####'),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'blocked_schedule' => $this->faker->boolean(50) ? null : $endTime,
            'blocking_history' => json_encode(['test' => $this->faker->sentence()]),
        ];
    }
}

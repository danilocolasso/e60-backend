<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('#####'),
            'discount' => $this->faker->numberBetween(0, 100),
            'fixed_amount_per_person' => $this->faker->randomFloat(2, 0, 100),
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
            'room_id' => Room::query()->inRandomOrder()->value('id') ?? Room::factory(),
            'booking_id' => Booking::query()->inRandomOrder()->value('id') ?? Booking::factory(),
            'expiration_date' => $this->faker->date(),
            'start_time' => $this->faker->time('H:i', '00:00'),
            'end_time' => $this->faker->time('H:i', '23:59'),
            'reservation_start_date' => $this->faker->date(),
            'reservation_end_date' => $this->faker->date(),
            'partner' => $this->faker->company(),
            'days_of_week' => json_encode(array_map(fn() => (bool) random_int(0, 1), range(0, 6))),
        ];
    }
}

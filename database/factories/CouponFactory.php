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
            'branches_id' => Branch::factory(),
            'rooms_id' => Room::factory(),
            'bookings_id' => Booking::factory(),
            'expiration_date' => $this->faker->date(),
            'start_time' => $this->faker->time('H:i', '00:00'),
            'end_time' => $this->faker->time('H:i', '23:59'),
            'reservation_start_date' => $this->faker->date(),
            'reservation_end_date' => $this->faker->date(),
            'partner' => $this->faker->company(),
            'sunday' => $this->faker->boolean(),
            'monday' => $this->faker->boolean(),
            'tuesday' => $this->faker->boolean(),
            'wednesday' => $this->faker->boolean(),
            'thursday' => $this->faker->boolean(),
            'friday' => $this->faker->boolean(),
            'saturday' => $this->faker->boolean(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
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
            'code' => strtoupper($this->faker->bothify('CUP-####')),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'fixed_amount_per_person' => $this->faker->randomFloat(2, 0, 100),
            'booking_id' => Booking::inRandomOrder()->first()->id,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'valid_until' => $this->faker->dateTimeBetween('now', '+1 month'),
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'partner' => $this->faker->company(),
            'is_valid_sunday' => $this->faker->boolean(),
            'is_valid_monday' => $this->faker->boolean(),
            'is_valid_tuesday' => $this->faker->boolean(),
            'is_valid_wednesday' => $this->faker->boolean(),
            'is_valid_thursday' => $this->faker->boolean(),
            'is_valid_friday' => $this->faker->boolean(),
            'is_valid_saturday' => $this->faker->boolean(),
            'booking_start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'booking_end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}

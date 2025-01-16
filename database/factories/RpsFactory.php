<?php

namespace Database\Factories;

use App\Enums\RpsStatus;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rps>
 */
class RpsFactory extends Factory
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
            'start_time'    => $this->faker->dateTimeBetween('-1 week', 'now'),
            'total_records' => $this->faker->numberBetween(1, 20),
            'total_amount'  => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(RpsStatus::cases()),
            'first_rps_number' => $this->faker->numberBetween(1000, 9999),
        ];
    }
}

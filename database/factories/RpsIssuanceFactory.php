<?php

namespace Database\Factories;

use App\Enums\RpsIssuanceRoles;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RpsIssuance>
 */
class RpsIssuanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
            'start_datetime' => $this->faker->dateTimeThisYear(),
            'records' => $this->faker->numberBetween(1, 100),
            'total_value' => $this->faker->randomFloat(2, 10, 1000),
            'status' => RpsIssuanceRoles::random(),
            'first_rps_number' => $this->faker->numberBetween(1, 10000),
        ];
    }
}

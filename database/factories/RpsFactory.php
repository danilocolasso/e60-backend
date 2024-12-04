<?php

namespace Database\Factories;

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
            'start_datetime' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'records' => $this->faker->numberBetween(0, 500),
            'branches_id' => $this->faker->optional()->numberBetween(1, 50),
            'total' => $this->faker->optional()->randomFloat(2, 0, 10000),
            'status' => $this->faker->randomElement(['GENERATED', 'PENDING', 'COMPLETED', 'FAILED']),
            'first_rps_number' => $this->faker->numberBetween(0, 1000),
        ];
    }
}

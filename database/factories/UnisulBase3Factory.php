<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnisulBase3>
 */
class UnisulBase3Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf' => $this->faker->cpf(true),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr,
            'school' => $this->faker->word(),
            'university' => $this->faker->word(),
            'campus' => $this->faker->word(),
            'degree' => $this->faker->word(),
            'referral' => $this->faker->word(),
            'password' => Hash::make('password'),
            'created_at' => now(),
        ];
    }
}

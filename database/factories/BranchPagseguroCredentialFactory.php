<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BranchPagseguron>
 */
class BranchPagseguroCredentialFactory extends Factory
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
            'token' => $this->faker->uuid(),
            'email' => $this->faker->email(),
            'client_id' => $this->faker->uuid(),
            'client_secret' => $this->faker->uuid(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BranchGiftcard>
 */
class BranchGiftcardFactory extends Factory
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
            'giftcard_person_limit' => $this->faker->numberBetween(1, 10),
            'giftcard_value_per_person' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}

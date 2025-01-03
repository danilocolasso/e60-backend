<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dictionary>
 */
class DictionaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'index' => $this->faker->unique()->word(),
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
            'text_pt' => $this->faker->sentence(),
            'text_en' => $this->faker->sentence(),
            'text_es' => $this->faker->sentence(),
        ];
    }
}

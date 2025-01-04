<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_br' => $this->faker->sentence(3),
            'subject_en' => $this->faker->sentence(3),
            'subject_es' => $this->faker->sentence(3),
            'email' => $this->faker->unique()->safeEmail(),
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BranchRps>
 */
class BranchRpsConfigurationFactory extends Factory
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
            'tax_rate' => $this->faker->randomFloat(2, 0, 1),
            'service_code' => $this->faker->randomNumber(),
            'federal_service_code' => $this->faker->word(),
            'municipal_service_code' => $this->faker->word(),
            'municipal_taxation_code' => $this->faker->word(),
            'format' => $this->faker->word(),
            'service_item_list' => $this->faker->text(),
            'simple_national_optant' => $this->faker->boolean(),
            'special_trib_regime' => $this->faker->word(),
            'service_trib_code' => $this->faker->word(),
            'last_rps_number' => $this->faker->randomNumber(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerPhoto>
 */
class CustomerPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'legend' => $this->faker->sentence(),
            'url' => $this->faker->imageUrl(200, 200, 'people', true),
            'share' => $this->faker->boolean(),
            'customer_id' => Customer::query()->inRandomOrder()->value('id') ?? Customer::factory(),
        ];
    }
}

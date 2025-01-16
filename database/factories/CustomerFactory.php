<?php

namespace Database\Factories;

use App\Models\Achievement;
use App\Models\Branch;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'document_number' => $this->faker->numerify('###########'),
            'birth_date' => $this->faker->date(),
            'street' => $this->faker->streetName(),
            'street_number' => $this->faker->buildingNumber(),
            'neighborhood' => $this->faker->word(),
            'zip_code' => $this->faker->numerify('#####-###'),
            'complement' => $this->faker->word(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'password' => $this->faker->password(),
            'phone' => $this->faker->phoneNumber(),
            'newsletter' => $this->faker->boolean(),
            'is_corporate' => $this->faker->boolean(),
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'image_url' => $this->faker->imageUrl(),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function ($customer) {
            $achievements = Achievement::inRandomOrder()->take(1, 3)->pluck('id');
            $customer->achievements()->attach($achievements);
        });
    }
}

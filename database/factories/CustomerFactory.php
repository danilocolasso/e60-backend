<?php

namespace Database\Factories;

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
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->date(),
            'cpf' => $this->faker->numberBetween(1111111111,999999999),
            'phone' => $this->faker->phoneNumber(),
            'cellphone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'neighborhood' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->words(2, true),
            'zipcode' => $this->faker->postcode(),
        ];
    }
}

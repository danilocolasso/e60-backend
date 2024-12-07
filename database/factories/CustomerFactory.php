<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'cpf' => $this->faker->cpf(true),
            'birth_date' => $this->faker->date('Y-m-d', '2004-12-31'),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->secondaryAddress(),
            'district' => $this->faker->citySuffix(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip_code' => $this->faker->postcode(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'number_mobile' => $this->faker->phoneNumber(),
            'number_phone' => $this->faker->phoneNumber(),
            'news_subscription' => $this->faker->boolean(),
            'is_corporate' => $this->faker->boolean(),
            'contact_json' => json_encode(['contact' => $this->faker->sentence()]),
            'branches_id' => Branch::factory(),
            'rdstation_message' => $this->faker->sentence(),
            'rdstation_timestamp' => $this->faker->dateTime(),
            'rdstation_uuid' => $this->faker->uuid(),
            'invitation_code' => $this->faker->randomNumber(5, true),
            'invitation_used' => $this->faker->numberBetween(0, 5),
            'achievements' => '[' . implode(',', $this->faker->randomElements(range(1, 20), 3)) . ']',
            'username' => $this->faker->userName(),
            'image_url' => $this->faker->imageUrl(200, 200, 'people', true),
        ];
    }
}

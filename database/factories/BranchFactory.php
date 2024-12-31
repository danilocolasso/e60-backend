<?php

namespace Database\Factories;

use App\Enums\BranchRoles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => BranchRoles::random(),
            'name' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'is_active' => $this->faker->boolean(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->secondaryAddress(),
            'district' => $this->faker->citySuffix(),
            'city_code' => $this->faker->postcode(),
            'zip_code' => $this->faker->postcode(),
            'state' => $this->faker->stateAbbr(),
            'address' => $this->faker->address(),
            'cnpj' => only_numbers($this->faker->cnpj()),
            'municipal_registration' => $this->faker->randomNumber(8),
            'progressive_discount_json' => $this->faker->json(),
            'is_advance_voucher' => $this->faker->boolean(),
            'deleted_at' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
}

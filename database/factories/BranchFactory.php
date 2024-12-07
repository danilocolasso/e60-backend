<?php

namespace Database\Factories;

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
            'rps_id' => $this->faker->randomNumber(),
            'users_id' => $this->faker->randomNumber(),
            'type' => $this->faker->word(),
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
            'cnpj' => $this->faker->cnpj(),
            'municipal_registration' => $this->faker->randomNumber(8),
            'pagseguro_token' => $this->faker->uuid(),
            'pagseguro_email' => $this->faker->email(),
            'pagseguro_client_id' => $this->faker->uuid(),
            'pagseguro_client_secret' => $this->faker->uuid(),
            'paypal_user' => $this->faker->userName(),
            'paypal_password' => $this->faker->password(),
            'paypal_signature' => $this->faker->sha256(),
            'enotas_api_key' => $this->faker->uuid(),
            'enotas_company_id' => $this->faker->uuid(),
            'template_path_issue_report' => $this->faker->filePath(),
            'progressive_discount_json' => $this->faker->text(),
            'last_rps_number' => $this->faker->randomNumber(),
            'rps_tax_rate' => $this->faker->randomFloat(2, 0, 1),
            'rps_service_code' => $this->faker->word(),
            'rps_federal_service_code' => $this->faker->word(),
            'rps_municipal_service_code' => $this->faker->word(),
            'rps_municipal_taxation_code' => $this->faker->word(),
            'rps_format' => $this->faker->word(),
            'rps_service_item_list' => $this->faker->text(),
            'rps_simple_national_optant' => $this->faker->boolean(),
            'rps_special_trib_regime' => $this->faker->word(),
            'rps_service_trib_code' => $this->faker->word(),
            'giftcard_person_limit' => $this->faker->numberBetween(1, 10),
            'giftcard_value_per_person' => $this->faker->randomFloat(2, 10, 100),
            'is_advance_voucher' => $this->faker->boolean(),
            'deleted_at' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
}

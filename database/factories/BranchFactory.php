<?php

namespace Database\Factories;

use App\Enums\BranchType;
use App\Enums\RpsFormat;
use App\Enums\State;
use App\Models\Branch;
use App\Models\City;
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
            'type' => $this->faker->randomElement(BranchType::cases()),
            'name' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'state' => $this->faker->randomElement(State::cases()),
            'pagseguro_data' => [
                'id' => $this->faker->uuid,
                'secret' => $this->faker->password,
                'email' => $this->faker->companyEmail,
                'token' => $this->faker->sha256,
            ],
            'paypal_data' => [
                'user' => $this->faker->userName,
                'password' => $this->faker->password,
                'signature' => $this->faker->sha256,
            ],
            'rps_format' => $this->faker->randomElement(RpsFormat::cases()),
            'municipal_registration' => $this->faker->numerify('#########'),
            'cnpj' =>  only_numbers($this->faker->cnpj()),
            'last_rps_number' => $this->faker->numberBetween(1, 100000),
            'rps_municipal_service_code' => $this->faker->numberBetween(1000, 9999),
            'rps_trib_service_invoice' => $this->faker->numberBetween(1000, 9999),
            'rps_regime_especial_trib_invoice' => $this->faker->numberBetween(1000, 9999),
            'rps_simple_national_optant' => $this->faker->boolean ? 1 : 0,
            'rps_federal_service_code' => $this->faker->numberBetween(1000, 9999),
            'rps_tax_rate' => $this->faker->numberBetween(0, 100),
            'rps_code_service' => $this->faker->numberBetween(1000, 9999),
            'rps_item_list_service' => $this->faker->numberBetween(1000, 9999),
            'rps_municipal_taxation_code' => $this->faker->numberBetween(1000, 9999),
            'rps_service_trib_code' => $this->faker->numberBetween(1000, 9999),
            'giftcard_value_per_person' => $this->faker->randomFloat(2, 0, 1000),
            'giftcard_person_limit' => $this->faker->numberBetween(1, 10),
            'is_advance_voucher' => $this->faker->boolean,
            'street' => $this->faker->streetName,
            'street_number' => $this->faker->buildingNumber,
            'complement' => $this->faker->optional()->secondaryAddress,
            'neighborhood' => $this->faker->word,
            'city_id' => City::inRandomOrder()->first()->id,
            'zip_code' => $this->faker->postcode,
            'proposal_text' => $this->faker->optional()->paragraph,
            'template_issue_report_path' => $this->faker->optional()->filePath,
            'enotas_data' => json_encode([
                'api_key' => $this->faker->sha256,
                'company_id' => $this->faker->uuid,
            ]),
            'is_active' => true,
        ];
    }
}

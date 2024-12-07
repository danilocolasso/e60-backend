<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BranchBanner>
 */
class BranchBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'banners_id' => Banner::factory(),
            'branches_id' => Branch::factory(),
        ];
    }
}

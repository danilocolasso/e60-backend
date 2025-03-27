<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->colorName(),
            'name_en' => $this->faker->colorName(),
            'name_es' => $this->faker->colorName(),
            'image_url' => $this->faker->imageUrl(),
            'cover_url' => $this->faker->imageUrl(),
            'icon_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'description_en' => $this->faker->paragraph(),
            'description_es' => $this->faker->paragraph(),
            'min_participants' => $this->faker->numberBetween(1, 2),
            'max_participants' => $this->faker->numberBetween(3, 10),
            'duration_in_minutes' => $this->faker->numberBetween(30, 120),
            'branch_id' => Branch::inRandomOrder()->first()?->id,
            'display_branch_id' => Branch::inRandomOrder()->first()?->id,
            'valid_from' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'valid_until' => $this->faker->dateTimeBetween('now', '+1 month'),
            'url' => $this->faker->url(),
            'is_multi_participants' => $this->faker->boolean(),
            'is_delivery' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}

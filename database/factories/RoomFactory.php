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
            'branch_id' => Branch::query()->inRandomOrder()->value('id') ?? Branch::factory(),
            'name_pt' => $this->faker->unique()->word(),
            'name_en' => $this->faker->unique()->word(),
            'name_es' => $this->faker->unique()->word(),
            'description_br' => $this->faker->sentence(3),
            'description_en' => $this->faker->sentence(3),
            'description_es' => $this->faker->sentence(3),
            'image' => $this->faker->imageUrl(100, 100, 'technics'),
            'image_cover' => $this->faker->imageUrl(900, 100, 'technics'),
            'image_icon' => $this->faker->imageUrl(30, 30, 'technics'),
            'participants_min' => $this->faker->numberBetween(1, 2),
            'participants_max' => $this->faker->numberBetween(2, 20),
            'duration_in_minutes' => $this->faker->randomElement(['10', '20', '30', '60', '120', '240']),
            'is_active' => $this->faker->boolean(),
            'is_delivery' => $this->faker->boolean(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'multiple_participants' => $this->faker->date(),
            'link_room' => $this->faker->url,
        ];
    }
}

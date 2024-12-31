<?php

namespace Database\Factories;

use App\Models\ChallengeEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChallengeRiddles>
 */
class ChallengeRiddleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'challenge_event_id' => ChallengeEvent::query()->inRandomOrder()->value('id') ?? ChallengeEvent::factory(),
            'order' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->word(),
            'answer' => $this->faker->word(),
            'attempts' => $this->faker->numberBetween(1, 5),
            'image_path' => $this->faker->imageUrl(100, 100, 'technics'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ChallengeEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChallengeParticipant>
 */
class ChallengeParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'challenge_event_id' => ChallengeEvent::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'correct_answers' => $this->faker->numberBetween(0, 10),
            'incorrect_answers' => $this->faker->numberBetween(0, 10),
            'status' => $this->faker->randomElement(['active', 'won', 'lost']),
        ];
    }
}

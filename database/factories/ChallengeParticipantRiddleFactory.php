<?php

namespace Database\Factories;

use App\Models\ChallengeParticipant;
use App\Models\ChallengeEvent;
use App\Models\ChallengeRiddle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChallengeParticipantRiddle>
 */
class ChallengeParticipantRiddleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'challenge_participants_id' => ChallengeParticipant::factory(),
            'challenge_events_id' => ChallengeEvent::factory(),
            'challenge_riddles_id' => ChallengeRiddle::factory(),
            'attempts' => $this->faker->numberBetween(0, 10),
            'answers' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'right', 'wrong']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\ChallengeParticipantRiddlesRoles;
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
            'challenge_event_id' => ChallengeEvent::query()->inRandomOrder()->value('id') ?? ChallengeEvent::factory(),
            'challenge_participants_id' => ChallengeParticipant::query()->inRandomOrder()->value('id') ?? ChallengeParticipant::factory(),
            'challenge_riddle_id' => ChallengeRiddle::query()->inRandomOrder()->value('id') ?? ChallengeRiddle::factory(),
            'attempts' => $this->faker->numberBetween(0, 10),
            'answers' => $this->faker->sentence(),
            'status' => ChallengeParticipantRiddlesRoles::random(),
        ];
    }
}

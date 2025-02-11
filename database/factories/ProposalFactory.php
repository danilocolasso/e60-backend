<?php

namespace Database\Factories;

use App\Enums\ProposalEventType;
use App\Enums\ProposalStatus;
use App\Enums\ProposalType;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proposal>
 */
class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'monitor_user_id' => User::inRandomOrder()->first()->id,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
             'type' => $this->faker->randomElement(ProposalType::cases()),
             'status' => $this->faker->randomElement(ProposalStatus::cases()),
            'return_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'notes' => $this->faker->paragraph(),
            'item_person_quantity' => $this->faker->numberBetween(0, 10),
            'item_room_quantity' => $this->faker->numberBetween(0, 5),
            'item_monitoring_quantity' => $this->faker->numberBetween(0, 3),
            'item_consultant_quantity' => $this->faker->numberBetween(0, 3),
            'item_waiter_quantity' => $this->faker->numberBetween(0, 3),
            'item_partykit_quantity' => $this->faker->numberBetween(0, 3),
            'item_coffee_quantity' => $this->faker->numberBetween(0, 3),
            'item_person_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_room_amount' => $this->faker->randomFloat(2, 50, 500),
            'item_monitoring_amount' => $this->faker->randomFloat(2, 0, 200),
            'item_consultant_amount' => $this->faker->randomFloat(2, 0, 200),
            'item_waiter_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_partykit_amount' => $this->faker->randomFloat(2, 0, 150),
            'item_coffee_amount' => $this->faker->randomFloat(2, 0, 50),
            'item_other_amount' => $this->faker->randomFloat(2, 0, 150),
            'item_openingfee_amount' => $this->faker->randomFloat(2, 0, 50),
            'item_other_description' => $this->faker->sentence(),
            'party_title' => $this->faker->sentence(3),
            'total_amount' => $this->faker->randomFloat(2, 100, 1000),
            'coffee_schedule_description' => $this->faker->sentence(),
            'extra_room_schedule_description' => $this->faker->sentence(),
            'item_lunch_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_happyhour_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_cleaning_amount' => $this->faker->randomFloat(2, 0, 100),
            'student_amount' => $this->faker->randomFloat(2, 0, 100),
            'participant_amount' => $this->faker->randomFloat(2, 0, 100),
            'snack_amount' => $this->faker->randomFloat(2, 0, 20),
            'transport_amount' => $this->faker->randomFloat(2, 0, 50),
            'student_quantity' => $this->faker->numberBetween(0, 10),
            'participant_quantity' => $this->faker->numberBetween(0, 10),
            'snack_quantity' => $this->faker->numberBetween(0, 10),
            'transport_quantity' => $this->faker->numberBetween(0, 10),
            'is_custom' => $this->faker->boolean(),
            'is_scenography' => $this->faker->boolean(),
            'event_time' => $this->faker->time(),
            'product' => $this->faker->word(),
            'last_return_date' => null,
             'event_type' => $this->faker->randomElement(ProposalEventType::cases())->value,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Enums\BookingTypes;
use App\Enums\DiscountTypes;
use App\Enums\NfeStatus;
use App\Enums\PaymentMethods;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Proposal;
use App\Models\Room;
use App\Models\Rps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'proposal_id' => Proposal::inRandomOrder()->first()->id,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'rps_id' => Rps::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'monitor' => User::inRandomOrder()->first()->id,
            'participants' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'status' => $this->faker->randomElement(BookingStatus::cases()),
            'language' => $this->faker->randomElement(['en', 'pt', 'es']),
            'pagseguro_data' => ['example_key' => 'example_value'],
            'paypal_data' => ['example_key' => 'example_value'],
            'payment_method' => $this->faker->randomElement(PaymentMethods::cases()),
            'payment_date' => null,
            'type' => $this->faker->randomElement(BookingTypes::cases())->value,
            'paid_amount' => $this->faker->randomFloat(2, 50, 500),
            'participant_quantity' => $this->faker->numberBetween(1, 10),
            'invoice_description' => $this->faker->sentence(),
            'invoice_number' => null,
            'invoice_date' => null,
            'nfe_status' => $this->faker->randomElement(NfeStatus::cases())->value,
            'can_edit_invoice_number' => $this->faker->boolean(),
            'party_code' => null,
            'party_title' => null,
            'history' => $this->faker->paragraph(),
            'is_email_issue_sent' => $this->faker->boolean(),
            'student_amount' => $this->faker->randomFloat(2, 0, 100),
            'participant_amount' => $this->faker->randomFloat(2, 0, 100),
            'snack_amount' => $this->faker->randomFloat(2, 0, 50),
            'transport_amount' => $this->faker->randomFloat(2, 0, 50),
            'student_quantity' => $this->faker->numberBetween(0, 10),
            'snack_quantity' => $this->faker->numberBetween(0, 10),
            'transport_quantity' => $this->faker->numberBetween(0, 10),
            'item_person_quantity' => $this->faker->numberBetween(0, 10),
            'item_room_quantity' => $this->faker->numberBetween(0, 10),
            'item_monitoring_quantity' => $this->faker->numberBetween(0, 10),
            'item_consultant_quantity' => $this->faker->numberBetween(0, 10),
            'item_waiter_quantity' => $this->faker->numberBetween(0, 10),
            'item_partykit_quantity' => $this->faker->numberBetween(0, 10),
            'item_coffee_quantity' => $this->faker->numberBetween(0, 10),
            'item_person_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_room_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_monitoring_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_consultant_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_waiter_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_partykit_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_coffee_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_other_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_openingfee_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_other_description' => $this->faker->sentence(),
            'item_happyhour_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_cleaning_amount' => $this->faker->randomFloat(2, 0, 100),
            'item_lunch_amount' => $this->faker->randomFloat(2, 0, 100),
            'coffee_schedule_description' => $this->faker->sentence(),
            'extra_room_schedule_description' => $this->faker->sentence(),
            'is_custom' => $this->faker->boolean(),
            'is_scenography' => $this->faker->boolean(),
            'event_date' => $this->faker->date(),
            'event_start_time' => $this->faker->time(),
            'event_end_time' => $this->faker->time(),
            'product' => $this->faker->word(),
            'amount_to_pay' => $this->faker->randomFloat(2, 50, 500),
            'is_giftcard' => $this->faker->boolean(),
            'discount_type' => $this->faker->randomElement(DiscountTypes::cases())->value,
        ];
    }
}

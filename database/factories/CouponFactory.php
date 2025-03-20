<?php

namespace Database\Factories;

use App\Enums\CouponUsageType;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usageType = $this->faker->randomElement(CouponUsageType::cases());
        $quantity = in_array($usageType, [
            CouponUsageType::Unlimited,
            CouponUsageType::Unique,
        ], true)
            ? null
            : $this->faker->numberBetween(1, 50);

        return [
            'code' => strtoupper($this->faker->bothify('CUP-####')),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'usage_type' => $usageType,
            'quantity' => $quantity,
            'valid_until' => $this->faker->dateTimeBetween('now', '+1 month'),
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'partner_name' => $this->faker->company(),
            'is_valid_sunday' => $this->faker->boolean(),
            'is_valid_monday' => $this->faker->boolean(),
            'is_valid_tuesday' => $this->faker->boolean(),
            'is_valid_wednesday' => $this->faker->boolean(),
            'is_valid_thursday' => $this->faker->boolean(),
            'is_valid_friday' => $this->faker->boolean(),
            'is_valid_saturday' => $this->faker->boolean(),
            'booking_start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'booking_end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Coupon $coupon): void {
            $customers = Customer::inRandomOrder()->take(10, 25)->get();
            $rooms = Room::inRandomOrder()->take(5, 15)->get();

            $coupon->rooms()->attach($rooms);

            switch ($coupon->usage_type) {
                case CouponUsageType::Unique:
                    $customer = $customers->random(1);
                    $coupon->customers()->attach($customer);
                    break;

                case CouponUsageType::UniquePerCustomer:
                    $customerQuantity = $this->faker->numberBetween(1, $customers->count());
                    $selectedCustomers = $customers->random($customerQuantity);
                    $coupon->customers()->attach($selectedCustomers);
                    break;

                case CouponUsageType::Limited:
                    $customerQuantity = $this->faker->numberBetween(1, min($coupon->quantity, $customers->count()));
                    $selectedCustomers = $customers->random($customerQuantity);
                    $coupon->customers()->attach($selectedCustomers);
                    break;

                case CouponUsageType::Unlimited:
                    $coupon->customers()->attach($customers);
                    break;
            }
        });
    }
}

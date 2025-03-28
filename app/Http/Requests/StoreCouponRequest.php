<?php

namespace App\Http\Requests;

use App\Enums\CouponDiscountType;
use App\Enums\CouponUsageType;
use App\Enums\Weekday;
use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Coupon::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|min:3|max:255',
            'discount' => 'required|numeric|min:0',
            'discount_type' => ['required', 'string', Rule::in(CouponDiscountType::cases())],
            'usage_type' => ['required', 'string', Rule::in(CouponUsageType::cases())],
            'quantity' => [
                'integer',
                'min:1',
                Rule::requiredIf(function () {
                    return in_array($this->usage_type, [
                        CouponUsageType::Limited->value,
                        CouponUsageType::UniquePerCustomer->value,
                    ]);
                }),
            ],
            'valid_until' => 'nullable|date',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'partner_name' => 'required|string|min:3|max:255',
            'valid_days' => 'array',
            'valid_days.*' => [Rule::in(Weekday::cases())],
            'booking_start_date' => 'nullable|date',
            'booking_end_date' => 'nullable|date',
            'rooms' => 'array',
            'rooms.*' => 'exists:rooms,id',
        ];
    }
}

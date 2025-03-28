<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'usages' => $this->customers->count(),
            'usage_type' => $this->usage_type,
            'quantity' => $this->quantity,
            'valid_until' => $this->valid_until,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'partner_name' => $this->partner_name,
            'valid_days' => [
                'sunday' => $this->is_valid_sunday,
                'monday' => $this->is_valid_monday,
                'tuesday' => $this->is_valid_tuesday,
                'wednesday' => $this->is_valid_wednesday,
                'thursday' => $this->is_valid_thursday,
                'friday' => $this->is_valid_friday,
                'saturday' => $this->is_valid_saturday,
            ],
            'booking_start_date' => $this->booking_start_date,
            'booking_end_date' => $this->booking_end_date,
            'rooms' => $this->rooms->map(fn ($room) => [
                'id' => $room->id,
                'name' => $room->name,
                'branch' => $room->branch->only(['id', 'name']),
            ]),
        ];
    }
}

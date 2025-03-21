<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponListResource extends JsonResource
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
            'branches' => $this->branches()->pluck('name'),
            'quantity' => $this->quantity,
            'usage_type' => $this->usage_type,
            'usages' => $this->customers->count(),
        ];
    }
}

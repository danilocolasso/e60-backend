<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'branch' => $this->branch->name,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
            'min_participants' => $this->min_participants,
            'max_participants' => $this->max_participants,
            'duration_in_minutes' => $this->duration_in_minutes,
            'is_multi_participants' => $this->is_multi_participants,
            'is_delivery' => $this->is_delivery,
            'is_active' => $this->is_active,
        ];
    }
}

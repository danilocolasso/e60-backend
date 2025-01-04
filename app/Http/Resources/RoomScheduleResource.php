<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomScheduleResource extends JsonResource
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
            'branch_id' => $this->branch_id,
            'room_id' => $this->room_id,
            // 'booking_id' => $this->booking_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'token' => $this->token,
            'price' => $this->price,
            'blocked_schedule' => $this->blocked_schedule,
            'blocking_history' => $this->blocking_history,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

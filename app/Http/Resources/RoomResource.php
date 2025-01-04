<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'name_pt' => $this->name_pt,
            'name_en' => $this->name_en,
            'name_es' => $this->name_es,
            'description_br' => $this->description_br,
            'description_en' => $this->description_en,
            'description_es' => $this->description_es,
            'image' => $this->image,
            'image_cover' => $this->image_cover,
            'image_icon' => $this->image_icon,
            'participants_min' => $this->participants_min,
            'participants_max' => $this->participants_max,
            'duration_in_minutes' => $this->duration_in_minutes,
            'is_active' => $this->is_active,
            'is_delivery' => $this->is_delivery,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'multiple_participants' => $this->multiple_participants,
            'link_room' => $this->link_room,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

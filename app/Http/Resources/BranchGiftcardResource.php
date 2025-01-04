<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchGiftcardResource extends JsonResource
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
            'giftcard_person_limit' => $this->giftcard_person_limit,
            'giftcard_value_per_person' => $this->giftcard_value_per_person,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

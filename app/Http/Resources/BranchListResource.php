<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchListResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'rps' => $this->rps,
            'type' => $this->type,
            'admin' => $this->admin,
            'is_advance_voucher' => $this->is_advance_voucher,
            'is_active' => $this->is_active,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchPaypalCredentialResource extends JsonResource
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
            'user' => $this->user,
            'password' => $this->password,
            'signature' => $this->signature,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

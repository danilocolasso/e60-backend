<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchPagseguroCredentialResource extends JsonResource
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
            'token' => $this->token,
            'email' => $this->email,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

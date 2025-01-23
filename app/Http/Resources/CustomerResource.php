<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'document_number' => $this->document_number,
            'birth_date' => $this->birth_date->format('Y-m-d'),
            'street' => $this->street,
            'street_number' => $this->street_number,
            'neighborhood' => $this->neighborhood,
            'zip_code' => $this->zip_code,
            'complement' => $this->complement,
            'city' => $this->city,
            'state' => $this->state,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
            'newsletter' => $this->newsletter,
            'is_corporate' => $this->is_corporate,
            'branch_id' => $this->branch_id,
            'image_url' => $this->image_url,
            'contacts' => $this->contacts,
        ];
    }
}

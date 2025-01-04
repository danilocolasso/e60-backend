<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'user_id' => $this->user_id,
            'type' => $this->type,
            'name' => $this->name,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'district' => $this->district,
            'city_code' => $this->city_code,
            'zip_code' => $this->zip_code,
            'state' => $this->state,
            'address' => $this->address,
            'cnpj' => $this->cnpj,
            'municipal_registration' => $this->municipal_registration,
            'progressive_discount_json' => $this->progressive_discount_json,
            'is_advance_voucher' => $this->is_advance_voucher,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'branch_banners' => BranchBannerResource::collection($this->whenLoaded('branchBanner')),
            'branch_enotas' => BranchEnotaResource::collection($this->whenLoaded('branchEnotas')),
            'branch_giftcards' => BranchGiftcardResource::collection($this->whenLoaded('branchGiftcard')),
            'branch_pagseguro_credentials' => BranchPagseguroCredentialResource::collection($this->whenLoaded('branchPagseguroCredential')),
            'branch_paypal_credentials' => BranchPaypalCredentialResource::collection($this->whenLoaded('branchPaypalCredential')),
            'branch_rps_configurations' => BranchRpsConfigurationResource::collection($this->whenLoaded('branchRpsConfiguration')),
            'rooms' => RoomResource::collection($this->whenLoaded('room')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

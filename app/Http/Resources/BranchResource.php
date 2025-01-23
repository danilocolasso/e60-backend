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
            'rps' => $this->rps,
            'admin' => $this->admin,
            'type' => $this->type,
            'name' => $this->name,
            'phone' => $this->phone,
            'state' => $this->state,
            'pagseguro_data' => $this->pagseguro_data,
            'paypal_data' => $this->paypal_data,
            'rps_format' => $this->rps_format,
            'municipal_registration' => $this->municipal_registration,
            'cnpj' => $this->cnpj,
            'last_rps_number' => $this->last_rps_number,
            'rps_municipal_service_code' => $this->rps_municipal_service_code,
            'rps_trib_service_invoice' => $this->rps_trib_service_invoice,
            'rps_regime_especial_trib_invoice' => $this->rps_regime_especial_trib_invoice,
            'rps_simple_national_optant' => $this->rps_simple_national_optant,
            'rps_federal_service_code' => $this->rps_federal_service_code,
            'rps_tax_rate' => $this->rps_tax_rate,
            'rps_code_service' => $this->rps_code_service,
            'rps_item_list_service' => $this->rps_item_list_service,
            'rps_municipal_taxation_code' => $this->rps_municipal_taxation_code,
            'rps_service_trib_code' => $this->rps_service_trib_code,
            'giftcard_value_per_person' => $this->giftcard_value_per_person,
            'giftcard_person_limit' => $this->giftcard_person_limit,
            'is_advance_voucher' => $this->is_advance_voucher,
            'street' => $this->street,
            'street_number' => $this->street_number,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'proposal_text' => $this->proposal_text,
            'enotas_data' => $this->enotas_data,
            'is_active' => $this->is_active,
        ];
    }
}

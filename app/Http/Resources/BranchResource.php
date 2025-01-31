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
            'rps' => $this->rps ? [
                'id' => $this->rps->id,
                'name' => $this->rps->name,
            ] : null,
            'admin' => $this->admin ? [
                'id' => $this->admin->id,
                'name' => $this->admin->name,
            ] : null,
            'type' => $this->type,
            'name' => $this->name,
            'phone' => $this->phone,
            'state' => $this->state,
            'pagseguro' => [
                'email' => $this->pagseguro_data['email'] ?? null,
                'token' => $this->pagseguro_data['token'] ?? null,
                'key' => $this->pagseguro_data['key'] ?? null,
            ],
            'paypal' => [
                'user' => $this->paypal_data['user'] ?? null,
                'password' => $this->paypal_data['password'] ?? null,
                'signature' => $this->paypal_data['signature'] ?? null,
            ],
            'rps_format' => $this->rps_format,
            'municipal_registration' => $this->municipal_registration,
            'cnpj' => $this->cnpj,
            'rps_last_number' => $this->rps_last_number,
            'rps_municipal_service_code' => $this->rps_municipal_service_code,
            'rps_tax_service_invoice' => $this->rps_tax_service_invoice,
            'rps_special_tax_regime_invoice' => $this->rps_special_tax_regime_invoice,
            'rps_simple_national_optant' => $this->rps_simple_national_optant,
            'rps_federal_service_code' => $this->rps_federal_service_code,
            'rps_tax_rate' => $this->rps_tax_rate,
            'rps_code_service' => $this->rps_code_service,
            'rps_item_list_service' => $this->rps_item_list_service,
            'rps_municipal_taxation_code' => $this->rps_municipal_taxation_code,
            'giftcard_value_per_person' => $this->giftcard_value_per_person,
            'giftcard_person_limit' => $this->giftcard_person_limit,
            'is_advance_voucher' => $this->is_advance_voucher,
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'proposal_text' => $this->proposal_text,
            'enotas' => [
                'api_key' => $this->enotas_data['api_key'] ?? null,
                'company_id' => $this->enotas_data['company_id'] ?? null,
            ],
            'is_active' => $this->is_active,
        ];
    }
}

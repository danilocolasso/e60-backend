<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchRpsConfigurationResource extends JsonResource
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
            'tax_rate' => $this->tax_rate,
            'service_code' => $this->service_code,
            'federal_service_code' => $this->federal_service_code,
            'municipal_service_code' => $this->municipal_service_code,
            'municipal_taxation_code' => $this->municipal_taxation_code,
            'format' => $this->format,
            'service_item_list' => $this->service_item_list,
            'simple_national_optant' => $this->simple_national_optant,
            'special_trib_regime' => $this->special_trib_regime,
            'service_trib_code' => $this->service_trib_code,
            'last_rps_number' => $this->last_rps_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

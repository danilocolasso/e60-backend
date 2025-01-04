<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DictionaryResource extends JsonResource
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
            'index' => $this->index,
            'text_pt' => $this->text_pt,
            'text_en' => $this->text_en,
            'text_es' => $this->text_es,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

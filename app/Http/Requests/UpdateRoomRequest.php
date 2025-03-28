<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', $this->room);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:rooms,id',
            'name' => 'required|string|max:255',
            'name_en' => 'string|max:255|nullable',
            'name_es' => 'string|max:255|nullable',
            'image_url' => 'string|max:255',
            'cover_url' => 'string|max:255',
            'icon_url' => 'string|max:255',
            'description' => 'string',
            'description_en' => 'string|nullable',
            'description_es' => 'string|nullable',
            'min_participants' => 'integer|min:0',
            'max_participants' => 'integer|min:0',
            'duration_in_minutes' => 'required',
            'branch_id' => 'required|integer|exists:branches,id',
            'display_branch_id' => 'integer|exists:branches,id',
            'valid_from' => 'date',
            'valid_until' => 'date|after:valid_from',
            'url' => 'string|nullable|max:255',
            'is_multi_participants' => 'boolean',
            'is_delivery' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}

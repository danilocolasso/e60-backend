<?php

namespace App\Http\Requests;

use App\Enums\BranchType;
use App\Enums\State;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->branch);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rps_id' => 'nullable|integer|exists:branches,id',
            'admin_user_id' => 'nullable|integer|exists:users,id',
            'type' => ['required', Rule::in(BranchType::cases())],
            'state' => ['nullable', Rule::in(State::cases())],
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'zip_code' => 'nullable|string|min:8|max:9',
            'pagseguro' => 'nullable|array',
            'pagseguro.email' => 'nullable|email|max:255',
            'pagseguro.token' => 'nullable|string|max:255',
            'pagseguro.key' => 'nullable|string|max:255',
            'paypal' => 'nullable|array',
            'paypal.user' => 'nullable|string|max:255',
            'paypal.password' => 'nullable|string|max:255',
            'paypal.signature' => 'nullable|string|max:255',
            'enotas' => 'nullable|array',
            'enotas.api_key' => 'nullable|string|max:255',
            'enotas.company_id' => 'nullable|string|max:255',
            'giftcard_person_limit' => 'required|integer|min:1',
            'giftcard_value_per_person' => 'required|numeric|min:0',
            'is_advance_voucher' => 'required|boolean',
            'is_active' => 'required|boolean',
            'proposal_text' => 'nullable|string',
        ];
    }
}

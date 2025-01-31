<?php

namespace App\Http\Requests;

use App\Enums\BranchType;
use App\Enums\RpsFormat;
use App\Enums\RpsSimplesNationalOptant;
use App\Enums\RpsSpecialTaxRegimeInvoice;
use App\Enums\RpsTaxServiceInvoice;
use App\Enums\State;
use App\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Branch::class);
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
            'rps_format' => ['required', Rule::in(RpsFormat::cases())],
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'cnpj' => 'required|string|size:18',
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
            'municipal_registration' => 'required|integer|min:0',
            'rps_last_number' => 'required|integer|min:0',
            'rps_municipal_service_code' => 'required|integer|min:0',
            'rps_tax_service_invoice' => ['required', Rule::in(RpsTaxServiceInvoice::cases())],
            'rps_special_tax_regime_invoice' => ['required', Rule::in(RpsSpecialTaxRegimeInvoice::cases())],
            'rps_simple_national_optant' => ['required', Rule::in(RpsSimplesNationalOptant::cases())],
            'rps_federal_service_code' => 'required|integer|min:0',
            'rps_tax_rate' => 'required|numeric|min:0',
            'rps_code_service' => 'required|integer|min:0',
            'rps_item_list_service' => 'required|integer|min:0',
            'rps_municipal_taxation_code' => 'required|integer|min:0',
            'giftcard_person_limit' => 'required|integer|min:1',
            'giftcard_value_per_person' => 'required|numeric|min:0',
            'is_advance_voucher' => 'required|boolean',
            'is_active' => 'required|boolean',
            'proposal_text' => 'nullable|string',
        ];
    }
}

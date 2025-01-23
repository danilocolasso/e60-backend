<?php

namespace App\Http\Requests;

use App\Enums\State;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Customer::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'document_number' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'complement' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => ['nullable', 'string', 'max:2', Rule::enum(State::class)],
            'username' => 'required|string|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'newsletter' => 'boolean',
            'is_corporate' => 'boolean',
            'branch_id' => 'required|exists:branches,id',
            'image_url' => 'nullable|url',
            'contacts' => 'array',
            'contacts.*.name' => 'nullable|string|min:3|max:255',
            'contacts.*.department' => 'nullable|string|min:3|max:255',
            'contacts.*.email' => 'nullable|email|max:255',
            'contacts.*.phone' => 'nullable|string|max:20',
        ];
    }
}

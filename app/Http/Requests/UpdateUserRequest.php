<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'email',
            'username' => 'string',
            'password' => 'nullable|string',
            'password_confirmation' => 'nullable|string|required_with:password|string',
            'role' => 'required|string',
            'branches' => 'array',
            'management_report_show' => 'boolean',
        ];
    }
}

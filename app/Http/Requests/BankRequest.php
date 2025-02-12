<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_id' => 'nullable|exists:tenants,id',
            'account_name' => 'required|string|max:255',
            'currency_id' => 'nullable|exists:currencies,id',
            'status' => 'nullable|in:active,hidden',
            'personal_account' => 'nullable|boolean',
            'primary_account' => 'nullable|boolean',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string',
            'routing_number' => 'nullable|string|max:20',
            'details_on_invoices' => 'nullable|string|max:20',
            'balance' => 'required|numeric|min:0',
            'guess_explanations' => 'nullable|boolean',
            'sort_code' => 'nullable|string|max:10',
            'iban' => 'nullable|string|max:34',
            'bic' => 'nullable|string|max:11',
        ];
    }
}

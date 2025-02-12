<?php

namespace App\Http\Requests;

use App\Enums\Language;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $contactId = $this->route('contact') ?? $this->id;
        return [
            'name' => 'required|string|max:255',
            'organisation' => 'required|string|max:255',
            'email' => ['nullable','email',Rule::unique('contacts', 'email')->ignore($contactId),'max:255'],
            'billing_email' => ['nullable','email',Rule::unique('contacts', 'Billing_email')->ignore($contactId),'max:255'],
            'telephone' => 'nullable|string|max:20',
            'business_id' => 'nullable|exists:businesses,id',
            'mobile_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'town' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'default_payment_terms' => 'nullable|integer',
            'contact_level_email' => 'nullable|boolean',
            'contact_level_invoice' => 'nullable|boolean',
            'display_contact_name' => 'nullable|boolean',
            'sales_tax_registration_number' => 'nullable|integer',
            'invoice_language' => ['nullable','string', Rule::enum(Language::class)],
            'tenant_id' => 'nullable',
        ];
    }
}

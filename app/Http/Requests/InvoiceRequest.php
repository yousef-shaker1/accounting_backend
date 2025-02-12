<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'contact_id' => 'required|exists:contacts,id',
            'business_id' => 'nullable|exists:businesses,id',
            'invoice_reference' => 'required|numeric',
            'invoice_date' => 'required|date',
            'payment_terms' => 'required|numeric',
            'currency_id' => 'nullable|exists:currencies,id',
            'additional_text' => 'nullable|string',
            'invoice_discount' => 'nullable|numeric',
            'custom_contact_name' => 'nullable|string',
            'custom_payment_terms' => 'nullable|string',
            'po_reference' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'status' => ['nullable', Rule::enum(Status::class)],
            'is_letterheaded' => 'nullable|boolean',
            'display_project_name' => 'nullable|boolean',
            'display_bic_iban' => 'nullable|boolean',
        ];
    }
}

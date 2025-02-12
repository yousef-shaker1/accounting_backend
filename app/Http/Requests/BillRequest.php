<?php

namespace App\Http\Requests;

use App\Enums\Bill_Recurs;
use App\Enums\Activity;
use App\Enums\Currency;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'reference' => 'required|numeric',
            'bill_date' => 'required|date',
            'due_on' => 'required|date|after_or_equal:today',
            'currency_id' => 'nullable|exists:currencies,id',
            'is_tax_included' => 'nullable|in:including,excluding',
            'comment' => 'nullable|string',
            'item_category_type' => 'nullable|in:single,multiple',
            'business_category_id' => 'required|exists:business_categories,id',
            'total_price' => 'required|numeric',
            'bill_recurs' => ['nullable', Rule::enum(Bill_Recurs::class)],
            'file' => 'nullable|file|max:2048',
            'attachment_description' => 'nullable|string',
        ];
    }
}

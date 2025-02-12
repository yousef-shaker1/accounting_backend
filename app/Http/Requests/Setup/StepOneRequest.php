<?php

namespace App\Http\Requests\Setup;

use App\Enums\Country;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StepOneRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'zip_code' => ['nullable', 'digits:5'],
            'phone' => ['nullable', 'string', 'max:20'],
            'business_category_id' => ['required', 'exists:business_categories,id'],
            'country' => ['nullable', Rule::enum(Country::class)],
        ];
    }
}

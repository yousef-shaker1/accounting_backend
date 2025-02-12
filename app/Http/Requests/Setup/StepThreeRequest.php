<?php

namespace App\Http\Requests\Setup;

use Illuminate\Foundation\Http\FormRequest;

class StepThreeRequest extends FormRequest
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
            'company_start_date' => ['required', 'date_format:m-d-Y'],
            'first_accounting_year_end_date' => ['required', 'date_format:m-d-Y'],
            'app_start_date' => ['required', 'date_format:m-d-Y'],
        ];
    }
}

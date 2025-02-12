<?php

namespace App\Http\Requests\Setup;

use App\Enums\DateFormatEnum;
use App\Enums\UnitEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StepTwoRequest extends FormRequest
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
            'date_format' => ['required', Rule::enum(DateFormatEnum::class)],
            'currency_id' => ['nullable', 'exists:currencies,id'],
            'timezone_id' => ['nullable', 'exists:timezones,id'],
            'unit' => ['required', Rule::enum(UnitEnum::class)],
        ];
    }
}

<?php

namespace App\Http\Requests\Setup;

use Illuminate\Foundation\Http\FormRequest;

class StepFourRequest extends FormRequest
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
            'is_registered' => 'required|boolean',
            'effective_from' => 'required_if:is_registered,true|date',
            'name' => 'required_if:is_registered,true|string|max:255',
            'tax_rate' => 'required_if:is_registered,true|numeric|min:0|max:100',
        ];
    }
}

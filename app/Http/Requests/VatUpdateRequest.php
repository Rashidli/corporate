<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VatUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'institution_name' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'corporate_name' => 'required|string|max:255',
            'voen' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'payment_edv' => 'required|string|max:255',
            'payment_date_edv' => 'required|string|max:255',
            'note_edv' => 'required|string|max:255',
            'is_active' => 'required',
        ];
    }
}

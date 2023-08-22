<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActStoreRequest extends FormRequest
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
            'act_number' => 'required|string|max:255',
            'total_price' => 'required|string|max:255',
            'edv' => 'required|string|max:255',
            'corporate_name' => 'required|string|max:255',
            'voen' => 'required|string|max:255',
            'file' => 'required',
            'enterprise_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ];
    }
}

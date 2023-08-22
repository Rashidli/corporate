<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingUpdateRequest extends FormRequest
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
            'corporate_name' => 'required|string|max:255',
            'voen' => 'required|string|max:255',
            'person_name' => 'required|string|max:255',
            'person_phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'sender' => 'required|string|max:255',
            'activity_area' => 'required|string|max:255',
            'payment_condition' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'meeting_date' => 'required|string|max:255',
            'meeting_time' => 'required|string|max:255',
            'meeting_type' => 'required|string|max:255',
            'service_offer' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'meeting_person' => 'required|string|max:255',
            'meeting_progress' => 'required|string|max:255',
            'note' => 'required|string|max:255',
            'price_offer' => 'required|string|max:255',
            'protocol' => 'required|string|max:255',
            'service_offer_file' => 'nullable',
            'protocol_file' => 'nullable',
            'is_active' => 'required'
        ];
    }
}

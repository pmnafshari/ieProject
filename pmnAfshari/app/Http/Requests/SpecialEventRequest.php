<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:specials,title'],
            'discount' => ['required', 'lte:100', 'gte:1'],
            'start_date' => ['required','integer' ],
            'end_date' => ['required' ,'integer'],
            'sms_text' => ['nullable'],
            'text' => ['nullable'],
            'notify_sms' => ['nullable'],
            'notify_email' => ['nullable'],
            'notify_ticket' => ['nullable'],

        ];
    }
}

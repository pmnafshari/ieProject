<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'code' => ['required', 'unique:discounts,code'],
            'users_number' => ['required','integer', 'max:1000' , 'min:1'],
            'max' => ['required', 'integer','max:1000' , 'min:1'],
            'exp_date' => ['required', 'date'],
            'discount_toman' => ['required', 'integer','min:100'],
            'discount_per' => ['required', 'integer','max:100','min:1'],
            'create_date' => ['required', 'date'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class placeOrderRequest extends FormRequest
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
            'phone'=>'required|max:20',
            'country'=>'required|max:255',
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'company_name'=>'max:255',
            'address'=>'required|max:255',
            'town'=>'required|max:255',
            'email'=>'email|required|max:255',
        ];
    }
}

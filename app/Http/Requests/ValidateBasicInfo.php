<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBasicInfo extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address_1' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'company_type ' => 'required'
        ];
    }

    public function messages(){

        return [
            
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'company_type.required' => 'Company Type is required',
            'address_1.required' => 'Address is required',
            'phone.required' => 'Phone is required',
            'city.required' => 'City is required',
            'state.required' => 'State is required'
        ];
    }
}

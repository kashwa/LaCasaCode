<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonPostRequest extends FormRequest
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
            'email' => 'required|unique:persons',
            'country_code' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date_format:yy-m-d',
            'avatar' => 'required',
            'phone_number' => array(
                'required',
                'regex:/^\+?[1-9]\d{1,14}$/'    // E. 164 format
            )
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupCreateRequest extends FormRequest
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
            'sponsorname' => 'required|max:4',
            'position' =>'required',
            'registration_type'=>'required',
             'first_name' => 'required',
              'last_name' => 'required',
             'gender' => 'required',
             'dob' => 'required|date|before:-18 years',
             'passport' => 'required',
               'address1' => 'required|max:255',
               'country' => 'required|max:255',
               'state' => 'required|max:255',
               'city' => 'required|max:255',
             'email' => 'required|email|max:255',
            'landline_no' => 'required',
                 'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                 'username' => 'required',           
               'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
    'password_confirmation' => 'min:6'
        ];

   
    }
    public function messages(){
        return[
            'sponsorname.max' => 'sponsorname should not exceed 4',
        ];
    }
}
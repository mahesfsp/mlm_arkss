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
        return false;
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
        ];
    }
    public function messages(){
        return[
            'sponsorname.max' => 'sponsorname should not exceed 4',
        ];
    }
}

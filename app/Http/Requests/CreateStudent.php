<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudent extends FormRequest
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
               'Fullname' => 'bail|required',
                'email' => 'bail|required|email',
                'avatar' => 'bail|required',
                'address' => 'bail|required',
            ];
    
    }

    public function message()
    {
        return [
            'name.required' => 'Chua dien ten',
            'email.required' => 'Chua dien mail',
            'email.email' => 'Email chua dung dinh dang',
            'avatar.required' => 'Chua co anh',
            'address.required' => 'Chua co dia chi',
        ];
    }
}


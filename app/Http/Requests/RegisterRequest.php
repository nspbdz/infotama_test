<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\BaseController;


class RegisterRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Z][a-z]+(\s[A-Z][a-z]+)?$/',
            'email' => 'required|email|unique:users',
            'gander'=> 'required|in:1,2',
            'phone' => 'required|numeric',
            'username' => 'required|max:10|unique:users',
            'password' => 'required|min:7'
        ];
    }

    public function messages()
    {
        $message =  [
            'email.required|email' => 'Email required',
            'password.required|min:3' => 'Password required'
        ];


        return $message;
    }
}


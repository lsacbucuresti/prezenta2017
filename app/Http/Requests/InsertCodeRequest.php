<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class InsertCodeRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'title' => 'required',
            'code' => 'required|size:8|unique:codes,code',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Camp obligatoriu',
            'size' => '8 caractere alfa-numerice',
            'unique' => 'acest cod a fost deja folosit'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $username = Input::get('username');
            $password = Input::get('password');
            if (!Auth::once(['username' => $username, 'password' => $password])) {
                $validator->errors()->add('account', 'Contul este invalid');
            }
        });
    }
}

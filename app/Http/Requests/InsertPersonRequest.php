<?php

namespace App\Http\Requests;

use App\Code;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class InsertPersonRequest extends FormRequest
{

    public $code_id;
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
            'name' => 'required',
            'surname' => 'required',
            'code' => 'required|size:8',
        ];
    }

    public function messages()
    {
        return [
          'required' => 'Camp obligatoriu',
          'size' => 'Cod invalid',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $code = Code::select('id','expiration')->where('code','=',Input::get('code'))->first();
            if (!$code) {
                $validator->errors()->add('code', 'Codul este invalid');
            }
            elseif(date('Y-m-d H:i:s') > $code->expiration) {
                $validator->errors()->add('code', 'Codul a expirat');
            }
            else
                $this->code_id = $code->id;
        });
    }
}

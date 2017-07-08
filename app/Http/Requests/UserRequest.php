<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
      $id = request()->segment(2) ?: 0;
        return [
            'type'          => 'required',
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required|min:11',
            'username'      => 'required|unique:users,username,'.$id.',id',
            'password'      => 'required|min:3|max:10'
        ];
    }

    public function messages(){
        return [
            'username.unique' => 'Nome de Usuario já em uso.',
            'username.required' => 'Por favor insira o Nome de Usuario',


            'type.required' => 'Por favor insira o Tipo de usuario',

            'name.required' => 'Por favor insira o Nome do usuario',

            'email.required' => 'Por favor insira o Email',
            'email.email' => 'Insira um email valido',

            'phone.required' => 'Por favor insira o telefone',
            'phone.min' => 'Insira no minimo :min numeros',


            'password.required' => 'Por favor insira uma senha',
            'password.min' => 'Insira no minimo :min caracteres',
            'password.max' => 'Insira no maximo :max caracteres',

        ];
    }
}

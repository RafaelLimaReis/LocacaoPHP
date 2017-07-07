<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AreaRequest extends Request
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
            'name'          => 'required',
            'number'        => 'required|unique:areas,number,'.$id.',id'
        ];
    }

    public function messages(){
        return [
            'name.required'     => 'Nome da area obrigatorio',
            'number.required'   => 'Numero obrigatorio',
            'number.unique'     => 'Numero de localização já cadastrado'
        ];
    }
}

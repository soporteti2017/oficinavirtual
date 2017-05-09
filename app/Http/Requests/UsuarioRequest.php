<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'usuario'       => 'min:4|max:150|required|unique:users',
            'password'    => 'min:4|max:120|required',
            'email'        => 'min:4|max:120|required|unique:users',
            'rut'           => 'min:5|max:9|required|unique:users',
            'nombre'        => 'min:4|max:150|required',
            'tipo_usuario_id'       => 'required'
        ];
    }
}

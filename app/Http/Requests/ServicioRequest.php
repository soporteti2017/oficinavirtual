<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'id'                => 'required|unique:servicios',    
            'descripcion'       => 'min:4|max:150|required|unique:servicios',
            'valor'             => 'min:1|required',
            'unica_vez'         => 'required'
        ];
    }
}

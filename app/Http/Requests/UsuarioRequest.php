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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = array(
            "name"          => "required|min:5|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u",
            "apellidos"     => "required|min:5|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u",
            'password'      => 'required|string|min:6',
            'idrol'         => 'required|integer',
            'estado'        => 'required|integer',

        );
        if($this->request->has('_method')){
            return [
                //'name'=>'required|min:5|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u|unique:subgerencias,subgerencia,'.$this->route('subgerencia').',idsubgerencia'
                "email"      => 'required|string|email|max:255|unique:users,email,'.$this->route('usuario').',id',
                "usuario"    => 'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u|max:255|unique:users,usuario,'.$this->route('usuario').',id',
            ];
        }else{
            return [
                //'subgerencia' => 'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u|unique:subgerencias,subgerencia'
                "email"         => 'required|string|email|max:255|unique:users',
                "usuario"       => 'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u|max:255|unique:users',
            ];
        }
    }
}

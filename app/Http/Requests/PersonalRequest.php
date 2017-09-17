<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
            'nombres' =>'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u',
            'apellido_paterno' => 'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u',
            'apellido_materno' => 'required|regex:/^[a-z A-Z áéíóú ÁÉÍÓÚ]+$/u',
            'dni' => 'required|integer|digits:8',
            'idcargo_personal' => 'required|integer',
            'idsubgerencia_personal' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'idcargo_personal.required' => 'Campo Cargo es requerido',
            'idcargo_personal.integer' => 'Campo Cargo debe ser entero',
            'idsubgerencia_personal.required' => 'Campo Subgerencia es requerido',
            'idsubgerencia_personal.integer' => 'Campo Subgerencia debe ser entero',
        ];
    }
}

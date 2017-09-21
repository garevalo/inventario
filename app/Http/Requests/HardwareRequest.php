<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HardwareRequest extends FormRequest
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
            'marca' => 'required',
            'modelo' => 'required',
             'num_serie' => 'required',
            //'cod_inventario' => 'required',
            'estado' => 'required|integer',
            //'capacidad' => 'required',
            //'interfaz' => 'required',
            'idtipo_hardware' => 'required'
        ];
    }
}

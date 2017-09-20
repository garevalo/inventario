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
        return false;
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
            'cod_inventario' => 'required',
            'estado' => 'required|integer',
            'capacidad' => 'required',
            'interfaz' => 'required',
            'fecha_adquisicion' => 'required|date',
            'idtipo_hardware' => 'required',
            'id_activo_hardware' => 'required'
        ];
    }
}

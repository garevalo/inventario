<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftwareRequest extends FormRequest
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
            'idtipo_software' => 'required|integer',
            'nombre_software' => 'required',
            'arquitectura' => 'required',
            //'service_pack' => 'required',
            'fecha_adquisicion'=> 'required|date_format:d/m/Y',
            'estado'=>'required'
        ];
    }
}

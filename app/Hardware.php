<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable = ['marca','modelo','num_serie','cod_inventario','estado','capacidad','interfaz','fecha_adquisicion','idtipo_hardware','id_activo_hardware','tipo'];
    protected $primaryKey = 'idhardware';
    protected $dates = ['fecha_adquisicion'];

    public function tipohardware()
    {
       return $this->belongsTo('App\TipoHardware', 'idtipo_hardware', 'id_tipo_hardware');
    }
}

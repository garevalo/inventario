<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable = ['marca','modelo','num_serie','cod_inventario','estado','capacidad','interfaz','fecha_adquision','idtipo_hardware','id_activo_hardware'];
    protected $primaryKey = 'idhardware';

    public function tipohardware()
    {
       return $this->belongsTo('App\Hardware', 'idtipo_hardware', 'id_tipo_hardware');
    }
}

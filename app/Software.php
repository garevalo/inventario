<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable=['idtipo_software','arquitectura','service_pack','fecha_adquision','id_activo_software'];
    protected  $primaryKey = 'idsoftware';

    protected $dates = ['fecha_adquision'];

    public function tiposoftware()
    {
        return $this->belongsTo('App\TipoSoftware', 'idtipo_software', 'id_tipo_software');
    }
}

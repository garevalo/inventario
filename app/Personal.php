<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = ['nombres','apellido_paterno','apellido_materno','dni','idcargo_personal','idsubgerencia_personal'];

    public function subgerencia()
    {
        return $this->belongsTo('App\Subgerencia', 'idsubgerencia_personal', 'idsubgerencia');
    }
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'idcargo_personal', 'idcargo');
    }


}

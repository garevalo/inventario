<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = ['fecha_adquisicion','estado'];
    protected $primaryKey = "idactivo";

    protected $dates = ['fecha_adquisicion'];


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = ['idactivo','fecha_adquision','estado'];
    protected $primaryKey = "idactivo";
}

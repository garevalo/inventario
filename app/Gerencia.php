<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    protected $fillable = ['idgerencia','gerencia'];
    protected $primaryKey = 'idgerencia';


    /*public function sede()
    {
        return $this->belongsTo('App\Sede', 'idsede', 'idsede');
    }*/
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    protected $fillable = ['gerencia','idsede'];
    protected $primaryKey = 'idgerencia';


    public function sede()
    {
        return $this->belongsTo('App\Sede', 'idsede', 'idsede');
    }
}

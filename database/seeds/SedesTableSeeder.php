<?php

use App\Sede;
use Illuminate\Database\Seeder;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //for ($i=1; $i<20;$i++){
        Sede::create(['sede'=>'Anexo N°1','direccion'=>'Carabayllo']);
        Sede::create(['sede'=>'Centro Cívico','direccion'=>'Carabayllo']);
        Sede::create(['sede'=>'Palacio','direccion'=>'Carabayllo']);
        Sede::create(['sede'=>'Planta','direccion'=>'Carabayllo']);
        //}
    }
}

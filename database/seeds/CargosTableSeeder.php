<?php

use App\Cargo;
use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ///Cargo::truncate();

        //for ($i=1; $i<20;$i++){
        Cargo::create(['cargo'=>'Alcalde']);
        Cargo::create(['cargo'=>'Gerente']);
        Cargo::create(['cargo'=>'Sub Gerente']);
        Cargo::create(['cargo'=>'Contador']);
        Cargo::create(['cargo'=>'Regidor']);
        //}

    }
}

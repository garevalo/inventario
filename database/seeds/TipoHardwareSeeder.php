<?php

use Illuminate\Database\Seeder;
use App\TipoHardware;

class TipoHardwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoHardware::create(
            ["tipo_hardware"=>"Monitor"]
        );

        TipoHardware::create(
            ["tipo_hardware"=>"CPU"]
        );
        TipoHardware::create(
            ["tipo_hardware"=>"Mouse"]
        );
        TipoHardware::create(
            ["tipo_hardware"=>"Teclado"]
        );
        TipoHardware::create(
            ["tipo_hardware"=>"Memoria"]
        );
        TipoHardware::create(
            ["tipo_hardware"=>"Tarjeta de Videos"]
        );

        TipoHardware::create(
            ["tipo_hardware"=>"Tarjeta de Sonido"]
        );
    }
}

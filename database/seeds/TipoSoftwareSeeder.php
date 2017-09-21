<?php

use Illuminate\Database\Seeder;
use App\TipoSoftware;

class TipoSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoSoftware::create(
            ["tipo_software"=>"Sistema Operativo"]
        );

        TipoSoftware::create(
            ["tipo_software"=>"Antivirus"]
        );

        TipoSoftware::create(
        ["tipo_software"=>"Diseño"]
        );

        TipoSoftware::create(
            ["tipo_software"=>"Office"]
        );

        TipoSoftware::create(
            ["tipo_software"=>"Utilitarios"]
        );

        TipoSoftware::create(
            ["tipo_software"=>"Adobe Premiere"]
        );

    }
}

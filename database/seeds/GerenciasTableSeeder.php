<?php

use Illuminate\Database\Seeder;
use App\Gerencia;

class GerenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gerencia::create(['gerencia'=>'Alcaldía']);
        Gerencia::create(['gerencia'=>'Gerencia de Administración y Finanzas']);
        Gerencia::create(['gerencia'=>'Gerencia de Asuntos Jurídicos']);
        Gerencia::create(['gerencia'=>'Gerencia de Comunicación']);
        Gerencia::create(['gerencia'=>'Gerencia de Desarrollo Humano']);
    }
}

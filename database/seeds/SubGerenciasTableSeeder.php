<?php

use Illuminate\Database\Seeder;
use App\Subgerencia;

class SubGerenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subgerencia::create(['subgerencia'=>'SG de Organizaciones Sociales']);
        Subgerencia::create(['subgerencia'=>'SG de Áreas Verdes']);
        Subgerencia::create(['subgerencia'=>'SG de Complementación Alimentaria']);
        Subgerencia::create(['subgerencia'=>'SG de Promoción Social, Demuna']);
        Subgerencia::create(['subgerencia'=>'SG de Deportes']);
    }
}

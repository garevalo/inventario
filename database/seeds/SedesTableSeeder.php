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

        for ($i=1; $i<20;$i++){
            Sede::create(['cargo'=>str_random(10)]);
        }
    }
}

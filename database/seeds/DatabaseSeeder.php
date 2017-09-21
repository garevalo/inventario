<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(SedesTableSeeder::class);
        $this->call(TipoHardwareSeeder::class);
        $this->call(TipoSoftwareSeeder::class);
    }
}

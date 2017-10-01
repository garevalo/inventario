<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->increments('idhardware');
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('num_serie',50);
            $table->string('cod_inventario',50)->nullable();
            $table->integer('estado');
            $table->string('capacidad',50)->nullable();
            $table->string('interfaz',50)->nullable();
            $table->dateTime('fecha_adquisicion');
            $table->string('tipo',80)->nullable();

            $table->integer('idtipo_hardware')->unsigned();
            $table->foreign('idtipo_hardware')->references('id_tipo_hardware')->on('tipo_hardwares');

            $table->integer('id_activo_hardware')->unique()->unsigned();
            $table->foreign('id_activo_hardware')->references('idactivo')->on('activos')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardwares');
    }
}

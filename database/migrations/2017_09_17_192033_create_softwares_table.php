<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->increments('idsoftware');
            $table->string('arquitectura',50);
            $table->string('service_pack',50);
            $table->dateTime('fecha_adquisicion');

            $table->integer('idtipo_software')->unsigned();
            $table->foreign('idtipo_software')->references('id_tipo_software')->on('tipo_softwares');

            $table->integer('id_activo_software')->unsigned();
            $table->foreign('id_activo_software')->references('idactivo')->on('activos');

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
        Schema::dropIfExists('softwares');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals_activos', function (Blueprint $table) {
            $table->increments('id_personals_activos');

            $table->integer('activos_id')->unsigned();
            $table->foreign('activos_id')->references('idactivo')->on('activos');

            $table->integer('personals_idpersonal')->unsigned();
            $table->foreign('personals_idpersonal')->references('id')->on('personals');

            $table->dateTime('fecha_asignacion');

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
        Schema::dropIfExists('personals_activos');
    }
}

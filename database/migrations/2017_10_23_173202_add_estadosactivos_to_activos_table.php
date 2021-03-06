<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadosactivosToActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activos', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->integer('estado_activo')->nullable()->comment('1 -> activo, 2 -> baja, 3->devuelto');
            $table->string('orden_compra',12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activos', function (Blueprint $table) {
            $table->dropColumn('estado_activo');
            $table->dropColumn('orden_compra');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('apellidos');
            $table->string('usuario');
            $table->string('image');
            $table->integer('estado');
            $table->integer('idrol')->unsigned();
            //$table->foreign('idrol')->references('idrol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('apellidos');
            $table->dropColumn('usuario');
            $table->dropColumn('image');
            $table->dropColumn('idrol');
            $table->dropColumn('estado');
        });
    }
}

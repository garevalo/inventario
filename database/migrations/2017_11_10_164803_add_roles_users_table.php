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

            $table->string('apellidos')->nullable();
            $table->string('usuario')->nullable();
            $table->string('image')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('idrol')->unsigned()->nullable();
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

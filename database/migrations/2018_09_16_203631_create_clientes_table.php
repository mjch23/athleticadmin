<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';              
            $table->increments('id');
            $table->string('razon_social');
            $table->string('cuit');
            $table->string('club');
            $table->string('actividad');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('pais');
            $table->string('dni');
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('telefono');
            $table->string('celular1');
            $table->string('celular2');
            $table->string('email');
            $table->string('observaciones');
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
        Schema::dropIfExists('clientes');
    }
}

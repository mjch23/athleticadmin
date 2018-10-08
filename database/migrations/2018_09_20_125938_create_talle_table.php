<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talle', function (Blueprint $table) {
            $table->engine = 'InnoDB';   
            $table->increments('id_talle');
            $table->string('nombre_talle');
            $table->string('sexo_talle');
            $table->string('edad_talle');
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
        Schema::dropIfExists('talle');
    }
}

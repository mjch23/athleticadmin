<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->engine = 'InnoDB';    
            $table->increments('id_presupuesto');
            $table->unsignedInteger('id_cliente');
            $table->date('fecha_presupuesto');
            $table->boolean('anulada_presupuesto')->default($value=false);
            $table->boolean('aprobada_presupuesto')->default($value=false);
            $table->float('precio_presupuesto',12,2)->nullable($value = true);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuesto');
    }
}

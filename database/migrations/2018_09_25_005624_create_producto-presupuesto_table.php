<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('ProductoPresupuesto', function (Blueprint $table) {
            $table->engine = 'InnoDB';    
            $table->increments('id_pp');
            $table->unsignedInteger('id_presupuesto');
            $table->unsignedInteger('id_producto');
            $table->string('nombre_producto');
            $table->integer('cantidad_pp')->nullable($value = true);
            $table->float('precio_unitario_pp',8,2)->nullable($value = true);
            $table->float('precio_total_pp',8,2)->nullable($value = true);
            $table->timestamps();

            $table->foreign('id_presupuesto')->references('id_presupuesto')->on('presupuesto');
            $table->foreign('id_producto')->references('id_producto')->on('producto');
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductoPresupuesto');        //
    }
}

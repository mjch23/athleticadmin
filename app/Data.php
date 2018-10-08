<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
     protected $table = "productopresupuesto";
     protected $primaryKey = 'id_pp';
     protected $fillable = ['id_presupuesto','id_producto','nombre_actividad','nombre_producto','cantidad_pp','precio_unitario_pp','precio_total_pp'];  //
}

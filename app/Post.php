<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $table = "ProductoPresupuesto";
     protected $primaryKey = 'id_pp';
     protected $fillable = ['id_presupuesto','id_producto','nombre_producto','cantidad_pp','precio_unitario_pp','precio_total_pp'];  //
}

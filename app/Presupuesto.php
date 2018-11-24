<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
     protected $table = "presupuesto";
     protected $primaryKey = 'id_presupuesto';
     protected $fillable = ['fecha_presupuesto','anulada_presupuesto','aprobada_presupuesto','precio_presupuesto'.'id_cliente'];   //
}

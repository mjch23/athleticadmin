<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
     protected $table = "presupuesto";
     protected $primaryKey = 'id_presupuesto';
     protected $fillable = ['id_cliente','fecha_presupuesto','anulada_presupuesto','aprobada_presupuesto','precio_presupuesto'];   //
}

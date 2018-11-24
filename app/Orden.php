<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
     protected $table = "orden";
     protected $primaryKey = 'id_orden';
     protected $fillable = ['id_presupuesto','fecha_inicio_orden','fecha_prom_orden','fecha_cierre_orden','estado_orden','inactivo'];



}
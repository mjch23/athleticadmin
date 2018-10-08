<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
     protected $table = "linea";
     protected $primaryKey = 'id_linea';
     protected $fillable = ['nombre_linea','activo_linea'];   //
}

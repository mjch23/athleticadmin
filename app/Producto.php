<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $table = "producto";
     protected $primaryKey = 'id_producto';
     protected $fillable = ['nombre_producto','activo_producto','confecciona_producto','nombre_actividad','precio_producto'];



}



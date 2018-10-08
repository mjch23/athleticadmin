<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
     protected $table = "prenda";
     protected $primaryKey = 'id_prenda';
     protected $fillable = ['nombre_prenda'];   //
}

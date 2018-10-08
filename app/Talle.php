<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talle extends Model
{
     protected $table = "talle";
     protected $primaryKey = 'id_talle';
     protected $fillable = ['nombre_talle','sexo_talle','edad_talle']; //
}

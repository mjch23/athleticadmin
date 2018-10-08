<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
      protected $fillable = ['razon_social','cuit','club','actividad','direccion','localidad','provincia','pais','dni','apellidos','nombres','telefono','celular1','celular2','email','observaciones'];   //
}

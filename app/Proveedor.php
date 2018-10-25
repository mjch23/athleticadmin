<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	 protected $table = "proveedor";
     protected $primaryKey = 'id_proveedor';
     protected $fillable = ['razon_social','cuit','actividad','direccion','localidad','provincia','pais','dni','apellidos','nombres','telefono','celular1','celular2','email','observaciones'];   //
}

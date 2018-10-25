<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
	 protected $table = "cuentabancaria";
     protected $primaryKey = 'id_cuenta';
     protected $fillable = ['id_proveedor','banco','cbu','alias','observaciones'];   //
}
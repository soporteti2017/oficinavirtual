<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento_ctacte extends Model
{
     protected $table = "movimientos_ctactes";

    protected $fillable = ['descripcion', 'signo'];

    public function cuentas_corrientes(){
    	return $this->hasMany('App\Cuenta_corriente');
    }

}

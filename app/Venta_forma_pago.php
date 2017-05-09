<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_forma_pago extends Model
{
    protected $table = "ventas_formas_pagos";

    protected $fillable = ['nro_documento', 'valor', 'fecha_vencimiento', 'rut', 'venta_id', 'forma_pago_id'];

    public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public function forma_pago(){
    	return $this->belongsTo('App\Forma_pago');
    }

    public static function getvtasfpagos($venta_id){
      return Venta_forma_pago::where('venta_id', '=', $venta_id)
      						->get();
    }
}

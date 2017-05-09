<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    protected $fillable = ['documento', 'fecha', 'nula', 'hora', 'movimiento_venta_id', 'usuario_id', 'contrato_id'];

    public function movimiento_venta(){
    	return $this->belongsTo('App\Movimiento_venta');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function ventas_detalles(){
        return $this->hasMany('App\Venta_detalle');
    }

    public function ventas_formas_pagos(){
        return $this->hasMany('App\Venta_detalle');
    }

    public function cuentas_corrientes(){
    	return $this->hasMany('App\Cuenta_corriente');
    }

    public function correinternos(){
        return $this->hasMany('App\Correinterno');
    }

    public function nulas_fiscales(){
        return $this->hasMany('App\Nula_fiscal');
    }

    public function notas_creditos(){
        return $this->hasMany('App\Nota_credito');
    }


    public static function getventa($ndocumento, $movimiento){
      return Venta::where('documento', '=', $ndocumento)->where('movimiento_venta_id', '=', $movimiento)
                            ->get();
    }

}

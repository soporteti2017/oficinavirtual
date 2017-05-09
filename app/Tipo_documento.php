<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $table = "tipos_documentos";

    protected $fillable = ['tipo_documento'];

    public function movimientos_ventas(){
    	return $this->hasMany('App\Movimiento_venta');
    }

    public function tipo_documento(){
    	return $this->belongsTo('App\Tipo_documento');
    }
}

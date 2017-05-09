<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_detalle extends Model
{
    protected $table = "ventas_detalles";

    protected $fillable = ['producto', 'valor_final', 'descripcion', 'venta_id'];

    public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public static function getvtadet($venta_id){
      return Venta_detalle::where('venta_id', '=', $venta_id)
      						->get();
    }
}

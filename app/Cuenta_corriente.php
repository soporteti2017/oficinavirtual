<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta_corriente extends Model
{
    protected $table = "cuentas_corrientes";

    protected $fillable = ['fecha_documento', 'fecha_vencimiento', 'valor', 'movimiento_ctacte_id', 'venta_id',  'contrato_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public function movimiento_ctacte(){
    	return $this->belongsTo('App\Movimiento_ctacte');
    }

    public static function getcuentas($correlativo){
      return Cuenta_corriente::where('contrato_id', '=', $correlativo)->orderBy('fecha_documento','ASC')
      						->get();
    }

    public static function getcarga($correlativo, $movimiento, $fecha_vencimiento){
      return Cuenta_corriente::where('contrato_id', '=', $correlativo)
                               ->where('movimiento_ctacte_id', '=', $movimiento)
                               ->where('fecha_vencimiento', '=', $fecha_vencimiento)
                                ->get();
    }


    public function scopeSearch($query, $name){
        return $query->where('venta_id', 'LIKE', "%$name%");
    }
}

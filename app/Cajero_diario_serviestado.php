<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero_diario_serviestado extends Model
{
    protected $table = "cajero_diario_serviestado";

    protected $fillable = ['descripcion', 'valor', 'forma_pago_id',  'nro_documento', 'movimiento_venta_id', 'fecha', 'usuario_id', 'documento', 
    						'venta_id', 'contrato_id', 'ndocumento'];


   	public function forma_pago(){
    	return $this->belongsTo('App\Forma_pago');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function movimiento_venta(){
    	return $this->belongsTo('App\Movimiento_venta');
    }

    public static function getcajero_diario_serviestado($fecha, $usuario_id){
        return Cajero_diario_serviestado::where('fecha', '=', $fecha)->where('usuario_id', '=', $usuario_id)
                                        ->where('descripcion', 'not like', '%interese%')->groupBy('venta_id')
      						->get();
    }
}

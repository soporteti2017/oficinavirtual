<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero_diario_otros_bancos_factura extends Model
{
    protected $table = "cajero_diario_otros_bancos_factura";

    protected $fillable = ['descripcion', 'valor', 'forma_pago_id',  'nro_documento', 'movimiento_venta_id', 'fecha', 'fecha_vencimiento',
    						'usuario_id', 'documento', 'venta_id', 'contrato_id'];


   	public function forma_pago(){
    	return $this->belongsTo('App\Forma_pago');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function movimiento_venta(){
    	return $this->belongsTo('App\Movimiento_venta');
    }

    public static function getcajero_diario_otros_bancos_factura($fecha, $usuario_id){
        return cajero_diario_otros_bancos_factura::where('fecha', '=', $fecha)->where('usuario_id', '=', $usuario_id)
                                                   ->where('descripcion', 'not like', '%interese%')->groupBy('venta_id')
      						->get();
    }
}

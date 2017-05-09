<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero_diario extends Model
{
    protected $table = "cajero_diario";

    protected $fillable = ['descripcion', 'valor', 'forma_pago_id', 'nro_Documento', 'movimiento_venta_id', 'fecha_vencimiento', 'documento', 
    						'fecha', 'usuario_id', 'contrato_id'];

   	public function forma_pago(){
    	return $this->belongsTo('App\Forma_pago');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function movimiento_venta(){
    	return $this->belongsTo('App\Movimiento_venta');
    }

    public static function getcajero_diario($fecha, $usuario_id){
        return Cajero_diario::where('fecha', '=', $fecha)->where('usuario_id', '=', $usuario_id)->where('producto' => 530)
                             ->orwhere('producto'=>531)->orwhere('producto'=>1)->orwhere('producto'=>4)->orwhere('producto'=>60)
                             ->orwhere('producto'=>7)->orwhere('producto'=>8)->orwhere('producto'=>901)
      						->get();
    }
}


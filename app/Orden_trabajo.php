<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden_trabajo extends Model
{
    protected $table = "ordenes_trabajos";

    protected $fillable = ['fecha_recepcion', 'nula', 'tipo_ot_id', 'contrato_id', 'reclamo', 'estado_ot_id', 
    						'usuario_id'];

   public function tipo_ot(){
    	return $this->belongsTo('App\Tipo_ot');
    }

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }
    					
   public function estado_ot(){
    	return $this->belongsTo('App\Estado_conexion');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }


    public function fichas(){
        return $this->hasMany('App\Ficha');
    }

    public function ots_cierres(){
        return $this->hasMany('App\Ot_cierre');
    }

    public function ordenes_trabajos_detalles(){
        return $this->hasMany('App\Orden_trabajo_detalle');
    }

    public function ot_digitales(){
        return $this->hasMany('App\Ot_digital');
    }

    public function ots_asignas(){
        return $this->hasMany('App\Ot_asigna');
    }

    public function ots_ingresos(){
      return $this->hasMany('App\Ot_ingreso');
    }

    // public function direccion(){
    // 	return $this->belongsTo('App\Direccion');
    // } 

    public function cmclientes(){
        return $this->hasMany('App\Cmcliente');
    }

    public function cargas_adicionales(){
    	return $this->hasMany('App\Carga_adicional');
    }

    public function ots_cambios_activos(){
    	return $this->hasMany('App\Carga_adicional');
    }

    public function contratos_terminos(){
    	return $this->hasMany('App\Contrato_termino');
    }

    public function ots_retiros(){
    	return $this->hasMany('App\Ot_retiro');
    }

    public function retiros_stbs(){
    	return $this->hasMany('App\Retiro_stb');
    }

    public static function getots($correlativo){
      return Orden_trabajo::where('contrato_id', '=', $correlativo)->orderBy('fecha_recepcion','ASC')
      						->get();
    }

    public static function getot($id){
      return Orden_trabajo::where('id', '=', $id)
      						->get();
    }

    public static function get_ult_ot($id, $tipo_ot){
      return Orden_trabajo::where('contrato_id', '=', $id)->where('tipo_ot_id', '=', $tipo_ot)
      						->get();
    }


}

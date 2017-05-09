<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contratos";

    protected $fillable = ['id', 'correlativo_manual', 'fecha', 'cliente_id', 'id_plan', 'fecha_inicio_pago', 'dia_pago', 
    						'fecha_conexion', 'id_estado_conexion', 'fecha_estado_conexion', 'observacion', 'direccion_id'];

    public function cliente(){
      return $this->belongsTo('App\Cliente');
    }            

   public function estado_conexion(){
    	return $this->belongsTo('App\Estado_conexion');
    }

    public function direccion(){
    	return $this->belongsTo('App\Direccion');
    } 

    public function plan(){
    	return $this->belongsTo('App\Plan');
    } 

    public function ordenes_trabajos(){
      return $this->hasMany('App\Orden_trabajo');
    }

    public function contratospremiums(){
      return $this->hasMany('App\Contratopremium');
    }

    public function contratos_adicionales(){
      return $this->hasMany('App\Contrato_adicional');
    } 

    public function contratos_descuentos(){
      return $this->hasMany('App\Contrato_descuento');
    }	

    public function contratos_inets(){
      return $this->hasMany('App\Contrato_inet');
    }	

    public function solicitudes(){
      return $this->hasMany('App\Solicitud');
    } 		

    public function cuentas_corrientes(){
      return $this->hasMany('App\Cuenta_corriente');
    } 	

    public function pacs(){
      return $this->hasMany('App\Pac');
    } 	

    public function pat(){
      return $this->hasMany('App\Pat');
    } 

    public function crea_230(){
      return $this->hasMany('App\Crea_230');
    }

    public function cargas_adicionales(){
      return $this->hasMany('App\Carga_adicional');
    }

    public function cambios_domicilios(){
      return $this->hasMany('App\Cambio_domicilio');
    }

    public function cliente_factura(){
      return $this->hasMany('App\Cliente_factura');
    }

    public function correinterno_referencia(){
      return $this->hasOne('App\Correinterno_referencia');
    }

   public static function getcontrato($correlativo){
      return Contrato::where('id', '=', $correlativo)
      						->get();
    }
}

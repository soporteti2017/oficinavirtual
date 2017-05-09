<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga_adicional extends Model
{
    protected $table = "cargas_adicionales";

    protected $fillable = ['valor' ,'observacion', 'mes', 'anio', 'contrato_id', 'tipo_carga_id', 'orden_trabajo_id', 'usuario_id'];

   public function ot(){
    	return $this->hasOne('App\Orden_trabajo', 'orden_trabajo_id');
    }


    public function tipo_carga_adicional(){
    	return $this->belongsTo('App\Tipo_carga_adicional', 'tipo_carga_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo', 'orden_trabajo_id');
    }

    public static function getcarga($correlativo, $mes, $anio){
      return Carga_adicional::where('contrato_id', '=', $correlativo)->where('mes', '=', $mes)->where('anio', '=', $anio)
      						->get();
    }
}

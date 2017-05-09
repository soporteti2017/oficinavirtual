<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = "solicitudes";

    protected $fillable = ['fecha', 'solicita', 'observacion', 'usuario_id', 'contrato_id', 'empresa_id', 'tipo_solicitud_id'];

   public function usuario(){
    	return $this->belongsTo('App\User', 'usuario_id');
    }

    public function empresa(){
    	return $this->belongsTo('App\Empresa');
    }

    public function tipo_solicitud(){
    	return $this->belongsTo('App\Tipo_solicitud');
    } 

    public function autoriza_solicitud(){
      return $this->hasOne('App\Autoriza_solicitud');
    }

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    } 

    public static function getsolicitudes($correlativo){
      return Solicitud::where('contrato_id', '=', $correlativo)
      						->get();
    }

    public static function getsolicitud($id){
      return Solicitud::where('id', '=', $id)
      						->get();
    }
}

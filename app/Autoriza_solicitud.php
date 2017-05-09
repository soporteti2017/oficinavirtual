<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoriza_solicitud extends Model
{
    protected $table = "autoriza_solicitudes";

    protected $fillable = ['autoriza' ,'fecha', 'leido', 'valor', 'hora', 'solicitud_id', 'estado_solicitud_id'];

   public function solicitud(){
    	return $this->hasOne('App\Solicitud', 'solicitud_id');
    }

    public function estado_solicitud(){
    	return $this->belongsTo('App\Estado_solicitud');
    }

    public static function getautoriza_solicitudes($id){
      return Autoriza_solicitud::where('solicitud_id', '=', $id)
      						->get();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato_adicional extends Model
{
    protected $table = "contratos_adicionales";

    protected $fillable = ['cantidad', 'contrato_id', 'servicio_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function servicio(){
    	return $this->belongsTo('App\Servicio', 'servicio_id');
    }

    public static function getarriendostb($correlativo){
      return Contrato_adicional::where('contrato_id', '=', $correlativo)->where('servicio_id', '=', 'P06')
      						->get();
    }

    public static function getbocas($correlativo){
      return Contrato_adicional::where('contrato_id', '=', $correlativo)->where('servicio_id', '=', '5')
      						->get();
    }
}

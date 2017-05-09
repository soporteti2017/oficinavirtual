<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratopremium extends Model
{
    protected $table = "contratospremiums";

    protected $fillable = ['contrato_id', 'servicio_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function servicio(){
    	return $this->belongsTo('App\Servicio', 'servicio_id');
    }

    public static function getcontratospremiums($correlativo){
      return Contratopremium::where('contrato_id', '=', $correlativo)
      						->get();
    }

}

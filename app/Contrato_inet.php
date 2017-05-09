<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato_inet extends Model
{
    protected $table = "contratos_inets";

    protected $fillable = ['contrato_id', 'servinet_id'];


    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function servinet(){
    	return $this->belongsTo('App\Servinet');
    }

    public static function getcontratosinets($correlativo){
      return Contrato_inet::where('contrato_id', '=', $correlativo)
      						->get();
    }

    public static function getcontratosinetsplan($correlativo){
      return Contrato_inet::where('contrato_id', '=', $correlativo)->where('servinet_id', 'like', 'BCC%')
      						->get();
    }
}

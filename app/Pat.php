<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pat extends Model
{
    protected $table = "pats";

    protected $fillable = ['fecha', 'n1', 'v1', 'v2', 'vigente', 'contrato_id', 'tarjeta_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function tarjeta(){
    	return $this->belongsTo('App\Tarjeta');
    }

    public static function getpat($correlativo){
      return Pac::where('contrato_id', '=', $correlativo)
      						->get();
    }
}

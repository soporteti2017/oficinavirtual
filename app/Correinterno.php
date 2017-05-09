<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correinterno extends Model
{
    protected $table = "correinternos";

    protected $fillable = ['ndocumento', 'nulo', 'venta_id'];

    public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public function correinterno_referencia(){
    	return $this->hasOne('App\Correinterno_referencia');
    }

     public static function getcorreinterno($venta_id){
      return Correinterno::where('venta_id', '=', $venta_id)
      						->get();
    }

}

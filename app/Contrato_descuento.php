<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato_descuento extends Model
{
    protected $table = "contratos_descuentos";

    protected $fillable = ['descuento', 'contrato_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public static function getdescuento($correlativo){
      return Contrato_descuento::where('contrato_id', '=', $correlativo)
      						->get();
    }
}

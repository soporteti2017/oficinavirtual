<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambio_domicilio extends Model
{
    protected $table = "cambios_domicilios";

    protected $fillable = ['fecha', 'contrato_id', 'direccion'];


    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }


    public static function get_direccion($id){
      return Cambio_domicilio::where('contrato_id', '=', $id)
      						->get();
    }
}

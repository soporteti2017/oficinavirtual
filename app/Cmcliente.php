<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmcliente extends Model
{
    protected $table = "cmclientes";

    protected $fillable = ['fecha', 'bpi', 'email', 'clavewifi', '1erpago', 'contrato_id', 'cmmac_id', 'orden_trabajo_id', 'estado_cm_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function cmmac(){
    	return $this->belongsTo('App\Cmmac', 'cmmac_id');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo', 'orden_trabajo_id');
    }

    public function estado_cm(){
    	return $this->belongsTo('App\Estado_cm', 'estado_cm_id');
    }

    public static function getcmcliente($correlativo){
      return Cmcliente::where('contrato_id', '=', $correlativo)
      						->get();
    }
}

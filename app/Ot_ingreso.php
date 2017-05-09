<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_ingreso extends Model
{
    protected $table = "ots_ingresos";

    protected $fillable = ['fecha', 'hora', 'orden_trabajo_id', 'tecnico_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

    public function usuario(){
    	return $this->belongsTo('App\User', 'tecnico_id');
    }
}

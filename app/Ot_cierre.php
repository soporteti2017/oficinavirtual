<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_cierre extends Model
{
    protected $table = "ots_cierres";

    protected $fillable = ['fecha', 'hora', 'firma', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }
}

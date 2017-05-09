<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "fichas";

    protected $fillable = ['codigo', 'num', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_digital extends Model
{
    protected $table = "ot_digitales";

    protected $fillable = ['cantidad', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }
}

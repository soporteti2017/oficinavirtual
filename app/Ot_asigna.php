<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_asigna extends Model
{
    protected $table = "ots_asignas";

    protected $fillable = ['orden_trabajo_id', 'usuario_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }
}

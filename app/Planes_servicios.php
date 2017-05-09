<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_servicios extends Model
{
    protected $table = "planes_servicios";

    protected $fillable = ['valor', 'plan_id', 'servicio_id'];

    public function servicio(){
    	return $this->belongsTo('App\Servicio', 'servicio_id');
    }

    public function plan(){
    	return $this->belongsTo('App\Plan', 'plan_id');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

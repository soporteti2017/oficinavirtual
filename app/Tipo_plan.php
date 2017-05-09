<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_plan extends Model
{
    protected $table = "tipos_planes";

    protected $fillable = ['descripcion', 'servicio_id'];

    public function servicio(){
    	return $this->belongsTo('App\Servicio');
    }

    public function planes(){
    	return $this->hasMany('App\Plan');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

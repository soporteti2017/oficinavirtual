<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";

    protected $fillable = ['id', 'descripcion', 'valor', 'unica_vez'];

    public function tipos_planes(){
    	return $this->hasMany('App\Tipo_plan');
    }

    public function planes_servicios(){
    	return $this->hasMany('App\Planes_servicios');
    }

    public function ordenes_trabajos_detalles(){
    	return $this->hasMany('App\Orden_trabajo_detalle');
    }

     public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}



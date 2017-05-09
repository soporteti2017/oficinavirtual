<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "planes";

    protected $fillable = ['descripcion', 'fecha_inicio', 'fecha_fin', 'vigente', 'meses', 'tipo_plan_id'];

    public function tipo_plan(){
    	return $this->belongsTo('App\Tipo_plan', 'tipo_plan_id');
    }

    public function planes_servicios(){
    	return $this->hasMany('App\Planes_servicios');
    }

    public function contratos(){
    	return $this->hasMany('App\Contrato');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_solicitud extends Model
{
    protected $table = "tipos_solicitudes";

    protected $fillable = ['descripcion', 'observacion'];

    public function solicitudes(){
    	return $this->hasMany('App\Solicitud');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

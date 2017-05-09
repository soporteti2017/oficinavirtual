<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_ot extends Model
{
    protected $table = "tipos_ots";

    protected $fillable = ['nombre', 'servdist_id', 'revisa'];

    public function servdist(){
    	return $this->belongsTo('App\Servdist');
    }

    public function ordenes_trabajos(){
    	return $this->hasMany('App\Orden_trabajo');
    }

    public function scopeSearch($query, $name){
        return $query->where('nombre', 'LIKE', "%$name%");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_ot extends Model
{
    protected $table = "estados_ots";

    protected $fillable = ['descripcion'];

    public function ordenes_trabajos(){
    	return $this->hasMany('App\Orden_trabajo');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_pago extends Model
{
    protected $table = "tipos_pagos";
    protected $fillable = ['descripcion'];

    public function formas_pagos(){
    	return $this->hasMany('App\Formas_pagos');
    }

    public function scopeSearch($query, $name)
   {
   		return $query->where('descripcion','LIKE', "%$name%");
   }
}

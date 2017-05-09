<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formas_pagos extends Model
{
    protected $table = "formas_pagos";

    protected $fillable = ['descripcion', 'codigo_banco', 'id_tipo_pago'];

    public function tipo_pago(){
    	return $this->belongsTo('App\Tipo_pago', 'id_tipo_pago');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

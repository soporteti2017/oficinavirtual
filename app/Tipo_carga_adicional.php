<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_carga_adicional extends Model
{
    protected $table = "tipos_cargas_adicionales";

    protected $fillable = ['descripcion'];

    public function cargas_adicionales(){
    	return $this->hasMany('App\Carga_adicional');
    }
}

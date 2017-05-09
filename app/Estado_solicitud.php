<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_solicitud extends Model
{
    protected $table = "estados_solicitudes";
    protected $fillable = ['descripcion'];

    public function autoriza_solicitudes(){
    	return $this->hasMany('App\Autoriza_solicitud');
    }
}

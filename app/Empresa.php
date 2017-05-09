<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";

    protected $fillable = ['id', 'rut', 'razon_social', 'bolfolio', 'movbol', 'movfact', 'racorta'];

    public function sucursales(){
      return $this->hasMany('App\Sucursal');
    }

    public function solicitudes(){
      return $this->hasMany('App\Solicitud');
    }
}

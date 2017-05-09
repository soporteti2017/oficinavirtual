<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "sucursales";

    protected $fillable = ['nombre', 'direccion', 'activo', 'formato', 'cpac', 'urlcricket', 'urldns', 'empresa_id'];

    public function pacs(){
    	return $this->hasMany('App\Pac');
    }

    public function com_puertos(){
    	return $this->hasMany('App\Com_puerto');
    }

    public function empresa(){
    	return $this->belongsTo('App\Empresa');
    }
}

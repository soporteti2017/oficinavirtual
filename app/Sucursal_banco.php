<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal_banco extends Model
{
    protected $table = "sucursales_bancos";

    protected $fillable = ['ciudad'];

    public function bancos(){
    	return $this->hasMany('App\Banco');
    }
}

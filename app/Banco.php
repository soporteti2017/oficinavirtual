<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";

    protected $fillable = ['nombre', 'sucursal_banco_id'];

    public function pacs(){
    	return $this->hasMany('App\Pac');
    }

    public function sucursal_banco(){
    	return $this->belongsTo('App\Sucursal_banco');
    }
}

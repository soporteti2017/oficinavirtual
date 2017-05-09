<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servinet extends Model
{
    protected $table = "servinets";

    protected $fillable = ['id', 'descripcion', 'valor', 'costo', 'descuento', 'vigente', 'bajada', 'subida'];

    public function cmmacs(){
    	return $this->hasMany('App\Cmmac');
    }

    public function contratos_inets(){
      return $this->hasMany('App\Contrato_inet');
    }	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correinterno_referencia extends Model
{
    protected $table = "correinternos_referencia";

    protected $fillable = ['correinterno_id', 'contrato_id'];

    public function contrato(){
    	return $this->hasOne('App\Venta', 'contrato_id');
    }

    public function correinterno(){
    	return $this->hasOne('App\Venta', 'correinterno_id');
    }


}

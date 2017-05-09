<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crea_230 extends Model
{
    protected $table = "crea_230";

    protected $fillable = ['mes' ,'anio', 'cable', 'internet', 'premium', 'boca', 'descuento', 'valor_230', 'contrato_id', 'carga_adicional_id'];


    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

}

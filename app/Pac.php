<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pac extends Model
{
    protected $table = "pacs";

    protected $fillable = ['fecha', 'ncuente', 'vigente', 'convenio', 'boleta', 'finalizada', 'mes', 'anio',
    						'aprobado', 'contrato_id', 'banco_id', 'tipo_cuenta_id', 'usuario_id', 'sucursal_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato');
    }

    public function banco(){
    	return $this->belongsTo('App\Banco');
    }

    public function tipo_cuenta(){
    	return $this->belongsTo('App\Tipo_cuenta');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function sucursal(){
    	return $this->belongsTo('App\Sucursal');
    }

    public static function getpac($correlativo){
      return Pac::where('contrato_id', '=', $correlativo)
      						->get();
    }

    
}

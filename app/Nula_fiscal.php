<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nula_fiscal extends Model
{
    protected $table = "nulas_fiscales";

    protected $fillable = ['ndocumento', 'documento', 'venta_id',  'valor', 'numero', 'fecha', 'usuario_id'];


   	public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }


    public static function getnulas_fiscales($fecha, $usuario_id){
        return Nula_fiscal::where('fecha', '=', $fecha)->where('usuario_id', '=', $usuario_id)
      						->get();
    }
}

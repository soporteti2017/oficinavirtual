<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero_numero extends Model
{
    protected $table = "cajeros_numeros";

    protected $fillable = ['usuario_id', 'numero', 'fecha'];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public static function getcierre_cajero($usuario, $fecha){
        return Cajero_numero::where('usuario_id', '=', $usuario)->where('fecha', $fecha)
      						->get();
    }

}

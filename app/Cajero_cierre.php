<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero_cierre extends Model
{
    protected $table = "cajero_cierres";

    protected $fillable = ['numero', 'fecha', 'usuario_id', 'nombre', 'valor'];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public static function getcajero_cierre($fecha){
        return Cajero_cierre::where('fecha', '=', $fecha)
      						->get();
    }
}

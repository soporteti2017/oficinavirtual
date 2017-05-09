<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_credito extends Model
{
    protected $table = "notas_creditos";

    protected $fillable = ['observacion', 'venta_id', 'usuario_id'];


   	public function venta(){
    	return $this->belongsTo('App\Venta');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }


    public static function getnc($venta){
      return Nota_credito::where('venta_id', '=', $venta)
                            ->get();
    }

    public function scopeSearch($query, $name){
        return $query->where('venta_id', 'LIKE', "%$name%");
    }
}

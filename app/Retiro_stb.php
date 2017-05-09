<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro_stb extends Model
{
    protected $table = "retiros_stbs";

    protected $fillable = ['stb', 'fecha', 'procesado', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo', 'orden_trabajo_id');
    }

    public static function getstb($orden_trabajo){
      return Retiro_stb::where('orden_trabajo_id', '=', $orden_trabajo)
      						->get();
    }
}

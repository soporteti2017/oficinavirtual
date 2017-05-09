<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_cambio_activo extends Model
{
    protected $table = "ots_cambios_activos";

    protected $fillable = ['serieantigua', 'serienueva','orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

     public static function getmacs($ot_id){
      return Ot_cambio_activo::where('orden_trabajo_id', '=', $ot_id)
      						->get();
    }

}

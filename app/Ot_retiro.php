<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot_retiro extends Model
{
    protected $table = "ots_retiros";

    protected $fillable = ['mac', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

    public static function getotretiro($ot_id){
      return Ot_retiro::where('orden_trabajo_id', '=', $ot_id)
      						->get();
    }
}

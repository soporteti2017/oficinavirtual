<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_puerto extends Model
{
    protected $table = "com_puertos";

    protected $fillable = ['ip', 'puerto', 'caja', 'sucursal_id'];

    public function sucursal(){
    	return $this->belongsTo('App\Sucursal', 'sucursal_id');
    }

    public static function getcom($caja){
      return Com_puerto::where('caja', '=', $caja)
      						->get();
    }
}

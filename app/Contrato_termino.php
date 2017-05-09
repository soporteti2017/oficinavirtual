<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato_termino extends Model
{
    protected $table = "contratos_terminos";

    protected $fillable = ['fecha', 'mensualidad', 'mes', 'anio', 'motivo', 'nota', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

    public static function getcontratotermino($ot){
      return Contrato_termino::where('orden_trabajo_id', '=', $ot)
      						->get();
    }
}

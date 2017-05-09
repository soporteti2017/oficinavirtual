<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestra_230 extends Model
{
    protected $table = "muestra_230";

    protected $fillable = ['cable', 'internet', 'premium', 'boca', 'carga_adicional_id', 'descuento', 'valor_230', 'descripcion'];

    

    public static function get230($correlativo, $mes, $anio){
      return Muestra_230::where('contrato_id', '=', $correlativo)->where('Mes', '=', $mes)->where('Anio', '=', $anio)
      						->get();
    }
}

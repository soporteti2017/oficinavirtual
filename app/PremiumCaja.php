<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PremiumCaja extends Model
{
    protected $table = "premiumcajas";

    protected $fillable = ['fecha', 'serie', 'contrato_id', 'orden_trabajo_id', 'estado_stb_id'];

    public function contrato(){
    	return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function estado_stb(){
        return $this->belongsTo('App\Estado_stb', 'estado_stb_id');
    }


    public static function getpremium($correlativo){
      return PremiumCaja::where('contrato_id', '=', $correlativo)
      						->get();
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

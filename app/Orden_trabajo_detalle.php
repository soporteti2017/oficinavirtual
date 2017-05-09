<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden_trabajo_detalle extends Model
{
    protected $table = "ordenes_trabajos_detalles";

    protected $fillable = ['cantidad', 'orden_trabajo_id', 'servicio_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Orden_trabajo');
    }

    public function servicio(){
    	return $this->belongsTo('App\Servicio');
    }
}

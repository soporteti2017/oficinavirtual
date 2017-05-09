<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma_pago extends Model
{
    protected $table = "formas_pagos";

    protected $fillable = ['descripcion', 'tipo', 'operacion', 'codbanco'];

    public function ventas_formas_pagos(){
    	return $this->hasMany('App\Venta_forma_pago');
    }

    public function Cajero_diario_efectivo(){
    	return $this->hasMany('App\Cajero_diario_efectivo');
    }

    public function Cajero_diario_efectivo_factura(){
        return $this->hasMany('App\Cajero_diario_efectivo_factura');
    }

    public function Cajero_diario_bancoestado_al_dia(){
        return $this->hasMany('App\Cajero_diario_bancoestado_dia');
    }

    public function Cajero_diario_bancoestado_al_dia_factura(){
        return $this->hasMany('App\Cajero_diario_bancoestado_dia_factura');
    }

    public function Cajero_diario_serviestado(){
        return $this->hasMany('App\Cajero_diario_serviestado');
    }

    public function Cajero_diario_serviestado_factura(){
        return $this->hasMany('App\Cajero_diario_serviestado_factura');
    }

    public function Cajero_diario_otros_bancos(){
        return $this->hasMany('App\Cajero_diario_otros_bancos');
    }

    public function Cajero_diario_otros_bancos_factura(){
        return $this->hasMany('App\Cajero_diario_otros_bancos_factura');
    }

    public function Cajero_diario_pacs(){
        return $this->hasMany('App\Cajero_diario_pac');
    }

    public function Cajero_diario_pacs_facturas(){
        return $this->hasMany('App\Cajero_diario_pac_factura');
    }

    public function Cajero_diario_pats(){
        return $this->hasMany('App\Cajero_diario_pat');
    }

    public function Cajero_diario_facturas_canjes(){
        return $this->hasMany('App\Cajero_factura_canje');
    }

    public function Cajero_diario_unired(){
        return $this->hasMany('App\Cajero_diario_unired');
    }

    public function Cajero_diario_unired_factura(){
        return $this->hasMany('App\Cajero_diario_unired_factura');
    }

    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

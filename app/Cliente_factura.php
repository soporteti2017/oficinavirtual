<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_factura extends Model
{
    protected $table = "clientes_facturas";
    protected $fillable = ['factura', 'contrato_id'];

    public function contrato(){
      return $this->belongsTo('App\Contrato');
    } 
}

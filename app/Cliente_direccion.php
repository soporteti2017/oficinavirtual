<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_direccion extends Model
{
    protected $table = 'clientes_direcciones';
    protected $fillable = [
        'id', 'rut', 'correlativo_manual', 'nombres', 
        'paterno', 'materno', 'calle', 'numero', 
        'depto_casa', 'poblacion', 'telefono1', 'telefono2', 'cliente_id', 
        'comuna', 'descripcion', 'direccion_comp', 'nombre_comp'
    ];

    public function scopeSearch($query, $name){
        return $query->where('id', 'LIKE', "%$name%")->orWhere('rut','LIKE',"%$name%")
              ->orWhere('calle','LIKE',"$name")
                ->orWhere('numero','LIKE',"%$name%")->orWhere('depto_casa','LIKE',"%$name%")
                ->orWhere('poblacion','LIKE',"$name")->orWhere('telefono1','LIKE',"%$name%")
                ->orWhere('telefono2','LIKE',"%$name%")->orWhere('cliente_id','LIKE',"%$name%")
                ->orWhere('descripcion','LIKE',"$name")->orWhere('direccion_comp','LIKE',"$name")
                ->orWhere('nombre_comp','LIKE',"%$name%");
    }
}

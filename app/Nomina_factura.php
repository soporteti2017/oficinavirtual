<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina_factura extends Model
{
    protected $table = "nominas_facturas";
    protected $fillable = ['rut', 'nombres', 'paterno', 'materno', 'direccion_comercial', 'giro', 'id', 'telefono1', 'suna'
                            , 'calle', 'numero' , 'poblacion'];
}

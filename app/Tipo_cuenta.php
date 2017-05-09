<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_cuenta extends Model
{
    protected $table = "tipos_cuentas";

    protected $fillable = ['descripcion'];

    public function pacs(){
    	return $this->hasMany('App\Pac');
    }
}

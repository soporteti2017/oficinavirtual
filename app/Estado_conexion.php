<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_conexion extends Model
{
    protected $table = "estados_conexiones";
    protected $fillable = ['descripcion'];

    public function contratos(){
    	return $this->hasMany('App\Contrato');
    }

    public function scopeSearch($query, $name)
   {
   		return $query->where('descripcion','LIKE', "%$name%");
   }
}

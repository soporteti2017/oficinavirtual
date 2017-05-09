<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direcciones";
    protected $fillable = ['calle_id', 'numero', 'depto_casa', 'block'];

    public function contratos(){
    	return $this->hasMany('App\Contrato');
    }

    public function calle(){
    	return $this->belongsTo('App\Calle');
    } 

    public function scopeSearch($query, $name)
   {
   		return $query->where('numero','LIKE', "%$name%");
   }
}

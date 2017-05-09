<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    protected $table = "calles";
    protected $fillable = ['calle', 'poblacion_id'];

    public function direcciones(){
    	return $this->hasMany('App\Direccion');
    }

    public function poblacion(){
    	return $this->belongsTo('App\Poblacion');
    } 

    public function scopeSearch($query, $name)
   {
   		return $query->where('numero','LIKE', "%$name%");
   }
}

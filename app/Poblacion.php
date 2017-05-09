<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $table = "poblaciones";
    protected $fillable = ['poblacion', 'sector_id'];

    public function calles(){
    	return $this->hasMany('App\Calle');
    }

    public function sector(){
    	return $this->belongsTo('App\Sector');
    } 

    public function scopeSearch($query, $name)
   {
   		return $query->where('numero','LIKE', "%$name%");
   }
}

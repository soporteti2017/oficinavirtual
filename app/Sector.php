<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "sectores";
    protected $fillable = ['sector', 'comuna_id'];

    public function poblaciones(){
    	return $this->hasMany('App\Poblacion');
    }

    public function comuna(){
    	return $this->belongsTo('App\Comuna', 'comuna_id');
    } 


    public function scopeSearch($query, $name)
   {
   		return $query->where('numero','LIKE', "%$name%");
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = "comunas";
    protected $fillable = ['comuna'];

    public function sectores(){
    	return $this->hasMany('App\Sector');
    }


    public function scopeSearch($query, $name)
   {
   		return $query->where('numero','LIKE', "%$name%");
   }
}

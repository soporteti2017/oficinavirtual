<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_stb extends Model
{
    protected $table = "estados_stbs";
    protected $fillable = ['descripcion'];

    public function premiumcajas(){
    	return $this->hasMany('App\PremiumCaja');
    }

    public function scopeSearch($query, $name)
   {
   		return $query->where('descripcion','LIKE', "%$name%");
   }
}

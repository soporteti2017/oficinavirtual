<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servdist extends Model
{
    protected $table = "servdists";
    protected $fillable = ['servicio'];

    public function tipos_ots(){
    	return $this->hasMany('App\Tipo_ot');
    }
 

    public function scopeSearch($query, $name)
   {
   		return $query->where('descripcion','LIKE', "%$name%");
   }
}

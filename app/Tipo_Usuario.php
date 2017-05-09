<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    protected $table = "tipos_usuarios";

    protected $fillable = ['descripcion'];

    public function usuers(){
    	return $this->hasMany('App\Users');
    }
}

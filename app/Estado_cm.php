<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_cm extends Model
{
    protected $table = "estados_cms";

    protected $fillable = ['id', 'descripcion'];

    public function cmclientes(){
    	return $this->hasMany('App\Cmcliente');
    }
}

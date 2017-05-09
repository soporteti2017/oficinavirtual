<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = "tarjetas";

    protected $fillable = ['nombre'];

    public function pats(){
    	return $this->hasMany('App\Pat');
    }
}

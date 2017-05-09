<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmmac extends Model
{
    protected $table = "cmmacs";

    protected $fillable = ['id', 'cm', 'servinet_id', 'marmocm_id'];

    public function cmclientes(){
    	return $this->hasMany('App\Cmcliente');
    }

    public function marmocm(){
    	return $this->belongsTo('App\Marmocm', 'marmocm_id');
    }

    public function servinet(){
    	return $this->belongsTo('App\Servinet', 'servinet_id');
    }

}

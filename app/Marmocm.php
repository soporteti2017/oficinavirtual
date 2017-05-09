<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marmocm extends Model
{
    protected $table = "marmocms";

    protected $fillable = ['id', 'marca', 'modelo', 'tipo', 'docsis', 'url'];

    public function cmmacs(){
    	return $this->hasMany('App\Cmmac');
    }

}

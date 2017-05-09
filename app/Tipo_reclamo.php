<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_reclamo extends Model
{
    protected $table = "tipos_reclamos";

    protected $fillable = ['descripcion'];


    public function scopeSearch($query, $name){
        return $query->where('descripcion', 'LIKE', "%$name%");
    }
}

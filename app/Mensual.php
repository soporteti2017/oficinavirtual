<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensual extends Model
{
    protected $table = "mensual2";

    protected $fillable = ['id', 'valor', 'Mon', 'suma', 'Expr1', 'costopremium', 'costoinet'];

    public static function getmensual($correlativo){
      return Mensual::where('id', '=', $correlativo)
      						->get();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ultima_boleta_fiscal extends Model
{
    protected $table = "ultima_boleta_fiscal";

    protected $fillable = ['ultimaboleta', 'id', 'fecha'];
}

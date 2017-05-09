<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Primera_boleta_fiscal extends Model
{
    protected $table = "primera_boleta_fiscal";

    protected $fillable = ['primeraboleta', 'id', 'fecha'];

}

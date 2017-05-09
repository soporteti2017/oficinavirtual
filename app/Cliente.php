<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $fillable = ['id', 'rut','nombres','paterno','materno','nacionalidad','telefono1','telefono2','email', 'giro'];

    public function contratos(){
      return $this->hasMany('App\Contrato');
    }
    
   public static function getcliente($correlativo){
      foreach ($correlativo as $corre) {
        return Cliente::where('id', '=', $corre->cliente_id)
                  ->get();
      }
      
    } 
   
   public function scopeSearch($query, $name)
   {
   		return $query->where('nombres','LIKE', "%$name%")
   		->orWhere('paterno','LIKE',"%$name%")
   		->orWhere('materno','LIKE',"%$name%")
   		->orWhere('rut','LIKE',"%$name%")
   		->orWhere('email','LIKE',"%$name%");
   }
}

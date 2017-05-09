<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'usuario', 'password', 'rut', 'nombre', 
        'administrador', 'boleta', 'vigente', 'boleta1', 
        'boleta2', 'boleta3', 'root', 'externo', 'caja', 
        'boleta4', 'email', 'tipo_usuario_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ordenes_trabajos(){
      return $this->hasMany('App\Orden_trabajo');
    }

    public function autoriza_solicitudes(){
      return $this->hasMany('App\Autoriza_solicitud');
    }

    public function solicitudes(){
      return $this->hasMany('App\Solicitud');
    }

    public function pacs(){
      return $this->hasMany('App\Pac');
    }

    public function cargas_adicionales(){
      return $this->hasMany('App\Carga_adicional');
    }

    public function ots_asignas(){
      return $this->hasMany('App\Ot_asigna');
    }

    public function ots_ingresos(){
      return $this->hasMany('App\Ot_ingreso');
    }

    public function cajeros_numeros(){
      return $this->hasMany('App\Cajero_numero');
    }

    public function Cajero_diario_efectivo(){
      return $this->hasMany('App\Cajero_diario_efectivo');
    }

    public function Cajero_diario_efectivo_factura(){
      return $this->hasMany('App\Cajero_diario_efectivo_factura');
    }

    public function Cajero_diario_bancoestado_al_dia(){
        return $this->hasMany('App\Cajero_diario_bancoestado_dia');
    }

    public function Cajero_diario_bancoestado_al_dia_factura(){
        return $this->hasMany('App\Cajero_diario_bancoestado_dia_factura');
    }

    public function Cajero_diario_serviestado(){
        return $this->hasMany('App\Cajero_diario_serviestado');
    }

    public function Cajero_diario_serviestado_factura(){
        return $this->hasMany('App\Cajero_diario_serviestado_factura');
    }

    public function Cajero_diario_otros_bancos(){
        return $this->hasMany('App\Cajero_diario_otros_bancos');
    }
    
    public function Cajero_diario_otros_bancos_factura(){
        return $this->hasMany('App\Cajero_diario_otros_bancos_factura');
    }

    public function Cajero_diario_pacs(){
        return $this->hasMany('App\Cajero_diario_pac');
    }

    public function Cajero_diario_pacs_facturas(){
        return $this->hasMany('App\Cajero_diario_pac_factura');
    }

    public function Cajero_diario_pats(){
        return $this->hasMany('App\Cajero_diario_pat');
    }

    public function Cajero_diario_facturas_canjes(){
        return $this->hasMany('App\Cajero_factura_canje');
    }

    public function Cajero_diario_unired(){
        return $this->hasMany('App\Cajero_diario_unired');
    }

    public function Cajero_diario_unired_factura(){
        return $this->hasMany('App\Cajero_diario_unired_factura');
    }

    public function cajeros_cierres(){
        return $this->hasMany('App\Cajero_cierre');
    }

    public function scopeSearch($query, $name){
        return $query->where('usuario', 'LIKE', "%$name%");
    }

    public function nulas_fiscales(){
        return $this->hasMany('App\Nula_fiscal');
    }

    public function notas_creditos(){
        return $this->hasMany('App\Nota_credito');
    }
}

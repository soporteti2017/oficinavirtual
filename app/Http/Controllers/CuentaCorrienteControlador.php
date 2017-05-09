<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Cliente;
use App\Cmcliente;
use App\Contrato_inet;
use App\PremiumCaja;
use App\Contratopremium;
use App\Contrato_adicional;
use App\Contrato_descuento;
use App\Mensual;
use App\Solicitud;
use App\Autoriza_solicitud;
use App\Cuenta_corriente;
use App\Pac;
use App\Pat;
use App\Venta;
use App\Venta_detalle;
use App\Venta_forma_pago;
use App\Correinterno;
use App\Muestra_230;
use App\Carga_adicional;
use App\Orden_trabajo;
use App\Cliente_direccion;
use App\Nomina_factura;
use Illuminate\Support\Facades\Auth;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\CuentaCorrienteRequest;
use Carbon\Carbon;
use App\Cajero_numero;
use App\Cajero_cierre;
use App\Cajero_diario_efectivo;
use App\Cajero_diario_efectivo_factura;
use App\Cajero_diario_bancoestado;
use App\Cajero_diario_bancoestado_dia_factura;
use App\Cajero_diario_serviestado;
use App\Cajero_diario_serviestado_factura;
use App\Cajero_diario_otros_bancos;
use App\Cajero_diario_otros_bancos_factura;
use App\Cajero_diario_pac;
use App\Cajero_diario_pac_factura;
use App\Cajero_diario_pat;
use App\Cajero_diario_factura_canje;
use App\Cajero_diario_unired;
use App\Cajero_diario_unired_factura;
use App\Nula_fiscal;
use App\Primera_boleta_fiscal;
use App\Ultima_boleta_fiscal;
use App\Nota_credito;

class CuentaCorrienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet.cuenta_corriente.saldo')->with('ver', 'saldos');
    }

    public function vermenuventas()
    {
        return view('intranet.cuenta_corriente.Ventas.index')->with('ver', 'ventasindex');
    }

    public function vermenumovimientos()
    {
        return view('intranet.cuenta_corriente.Movimientos.index')->with('ver', 'movimientosindex');
    }

    public function vermenumanejos()
    {
        return view('intranet.cuenta_corriente.Movimientos.Menu.Manejos.index')->with('ver', 'manejosindex');
    }

    public function vermenucaja()
    {
        return view('intranet.cuenta_corriente.Movimientos.Menu.Caja.index')->with('ver', 'cajaindex');
    }

    public function vermenucambiofolio()
    {
        return view('intranet.cuenta_corriente.Movimientos.Manejos.Cambia_folio.index')->with('ver', 'cambiofolioindex');
    }

    public function vercierrecajero()
    {
        return view('intranet.cuenta_corriente.Movimientos.Manejos.Cierre_cajero.index')->with('ver', 'manejosindex');
    }

    public function vermenuboletas()
    {
        return view('intranet.cuenta_corriente.Ventas.index')->with('ver', 'ventasboletas');
    }

    public function vermenufacturas()
    {
        return view('intranet.cuenta_corriente.Ventas.index')->with('ver', 'ventasfacturas');
    }

    public function vermenunc()
    {
        return view('intranet.cuenta_corriente.Ventas.index')->with('ver', 'ventasnc');
    }

    public function vercajaindex()
    {
        return view('intranet.cuenta_corriente.Movimientos.Cajero.index')->with('ver', 'cajaindex');
    }

    public function verindexbusqueda(Request $request)
    {
        $clientes_direcciones = Cliente_direccion::search($request->cliente_direccion)->orderBy('id', 'ASC')->paginate(50);
		return view('intranet.cuenta_corriente.busqueda.index')->with('clientes_direcciones', $clientes_direcciones)->with('ver', 'cuentas');
    }


    public function general(){

        return view('intranet.cuenta_corriente.general')->with('ver', 'general');
    }

    public function crearNC(){

        return view('intranet.cuenta_corriente.Ventas.NC.crear')->with('ver', 'ventasnc');
    }

    public function buscar_cliente()
    {
        return view('intranet.cuenta_corriente.Ventas.Boletas.busca_cliente')->with('ver', 'ventasboletas');
    }

    public function consulta(Request $request){
        $contratos = Contrato::getcontrato($request->id);
        $cliente = Cliente::getcliente($contratos);
        $contratos->each(function($contratos){
            $contratos->estado_conexion;
            $contratos->direccion->calle->poblacion;
        });
        //dd($contratos);
        return view('intranet.cuenta_corriente.vercontrato')->with('ver', 'general')
                                                        ->with('contratos' , $contratos)
                                                        ->with('cliente', $cliente);
    }

    public function consulta_cuenta_corriente(Request $request){
        $contratos = Contrato::getcontrato($request->id);
        $cliente = Cliente::getcliente($contratos);
        $contratos->each(function($contratos){
            $contratos->estado_conexion;
            $contratos->direccion->calle->poblacion;
        });
        //dd($contratos);
        return view('intranet.cuenta_corriente.Ventas.Boletas.ver_deudas')->with('ver', 'ventasboletas')
                                                        ->with('contratos' , $contratos)
                                                        ->with('cliente', $cliente);
    }

    public function verdetalles(Request $request){
        if($request->consulta == 0){
            $compvalor = 0;
            $mensual = Mensual::find($request->contrato_id);
            $cmclientes = Cmcliente::getcmcliente($request->contrato_id);
            $cmclientes->each(function($cmclientes){
            $cmclientes->contrato;
            $cmclientes->cmmac;
            $cmclientes->orden_trabajo;
            $cmclientes->estado_cm;
            });
            if($cmclientes->count() == 0){
                $inet = false;
                $costoinet = 0;
            }
            else{
                $inet = true;
                $compvalor = 1;
                $costoinet = $mensual->costoinet;
            }

            if($inet == true){
                $contratos_inets = Contrato_inet::getcontratosinets($request->contrato_id);
                $contratos_inets->each(function($contratos_inets){
                $contratos_inets->contrato;
                $contratos_inets->servinet;
                });
            }
            else{
                $contratos_inets = "";
            }
           
            $premiumcajas  = PremiumCaja::getpremium($request->contrato_id);
            $premiumcajas->each(function($premiumcajas){
            $premiumcajas->contrato;
            $premiumcajas->estado_stb;
            });
            if($premiumcajas->count() == 0){
                $premiumc = false;
                $costopremium = 0;
            }
            else{
                $premiumc = true;
                $compvalor = 1;
                $costopremium = $mensual->costopremium;
            }
            $contratospremiums = Contratopremium::getcontratospremiums($request->contrato_id);
            $contratospremiums->each(function($contratospremiums){
            $contratospremiums->contrato;
            $contratospremiums->servicio;
            });
            $contratos_adicionales = Contrato_adicional::getarriendostb($request->contrato_id);
            $contratos_adicionales->each(function($contratos_adicionales){
            $contratos_adicionales->contrato;
            $contratos_adicionales->servicio;
            });
            $contratos_descuentos = Contrato_descuento::getdescuento($request->contrato_id);
            $contratos_descuentos->each(function($contratos_descuentos){
            $contratos_descuentos->contrato;
            });
            
                if($compvalor == 1){
                        $tvadi = intval($mensual->valor) - 8900;
                        $tvacc = 8900 + intval($mensual->Mon);
                        $tva = 8900;
                }
                else{
                        $tvadi = 0;
                        $tvacc = intval($mensual->valor) + intval($mensual->Mon);
                        $tva = intval($mensual->valor);
                }

                if($mensual->Mon > 0){
                    $montobocad = $mensual->Mon;
                }
                else{
                    $montobocad = 0;
                }
           
            return view('intranet.cuenta_corriente.vercontratodetalle')->with('ver', 'general')
                                                                        ->with('tvadi', $tvadi)
                                                                        ->with('tvacc', $tvacc)
                                                                        ->with('tva', $tva)
                                                                        ->with('inet', $inet)
                                                                        ->with('montobocad', $montobocad)
                                                                        ->with('compvalor', $compvalor)
                                                                        ->with('cmclientes', $cmclientes)
                                                                        ->with('contratos_inets', $contratos_inets)
                                                                        ->with('costoinet', $costoinet)
                                                                        ->with('contrato_id', $request->contrato_id)
                                                                        ->with('num_contrato', $request->correlativo_manual)
                                                                        ->with('estado_cone', $request->estado_conexion)
                                                                        ->with('fecha_contrato', $request->fecha_contrato)
                                                                        ->with('fecha_estado', $request->fecha_estado)
                                                                        ->with('nombre_abonado', $request->nombre_abonado)
                                                                        ->with('premiumc', $premiumc)
                                                                        ->with('premiumcajas', $premiumcajas)
                                                                        ->with('contratospremiums', $contratospremiums)
                                                                        ->with('costopremium', $costopremium)
                                                                        ->with('contratos_adicionales', $contratos_adicionales)
                                                                        ->with('contratos_descuentos', $contratos_descuentos)
                                                                        ->with('mensual_suma', $mensual->suma);
        }


        if($request->consulta == 2){
          $solicitudes  = Solicitud::getsolicitudes($request->contrato_id);
          $solicitudes->each(function($solicitudes){
            $solicitudes->usuario;
            $solicitudes->empresa;
            $solicitudes->tipo_solicitud;
            $solicitudes->contrato;
            $solicitudes->autoriza_solicitud;
            });
          return view('intranet.usuarios.solicitudes.index')->with('ver', 'general')
                                                            ->with('solicitudes', $solicitudes)
                                                            ; 
        }    

        if($request->consulta == 4){

            $ctas_ctes = Cuenta_corriente::getcuentas($request->contrato_id);
            $ctas_ctes->each(function($ctas_ctes){
            $ctas_ctes->contrato;
            $ctas_ctes->venta;
            $ctas_ctes->movimiento_ctacte;
            });
            $contratos = Contrato::getcontrato($request->contrato_id);
            $clientes = Cliente::getcliente($contratos); 
            $fpago = "En Oficina";
            $pac = Pac::getpac($request->contrato_id);
            if($pac->count() > 0){
                $fpago = "PAC";
            } 
            $pat = PaT::getpat($request->contrato_id);
            if($pat->count() > 0){
                $fpago = "PAT";
            }   
            return view('intranet.cuenta_corriente.ver_cuenta_corriente')->with('ver', 'general')
                                                            ->with('ctas_ctes', $ctas_ctes)
                                                            ->with('contratos' , $contratos)
                                                            ->with('clientes', $clientes)
                                                            ->with('fpago', $fpago)
                                                            ; 
        } 

        // MOSTRAR OT
        if($request->consulta == 6){ 
            $odenes_trabajos = Orden_trabajo::getots($request->contrato_id);
            $odenes_trabajos->each(function($odenes_trabajos){
            $odenes_trabajos->tipo_ot;
            $odenes_trabajos->contrato;
            $odenes_trabajos->estado_ot;
            $odenes_trabajos->usuario;
            $odenes_trabajos->direccion;
            $odenes_trabajos->cmclientes;
            $odenes_trabajos->cargas_adicionales;
            });

            return view('intranet.servicios.OT.index')->with('odenes_trabajos', $odenes_trabajos); 
        }
        // FIN MOSTRAR OT    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ver_cargos_pagos($id){
        $cta_cte = Cuenta_corriente::find($id);
            if($cta_cte->movimiento_ctacte_id == 200){
                return view('intranet.cuenta_corriente.VerCargo.visualiza_200');
            }
            // VER DETALLE DE CARGO MENSUAL
            if($cta_cte->movimiento_ctacte_id == 230){
               $aniovenc = intval(substr($cta_cte->fecha_vencimiento, 0, 4));
               $mesvenc = intval(substr($cta_cte->fecha_vencimiento, 5, 2));
                if($mesvenc == 1){
                    $mes_actual = "Enero"; $mes_cobro = "Febrero";
                }
                else if($mesvenc == 2){
                    $mes_actual = "Febrero"; $mes_cobro = "Marzo";
                }
                else if($mesvenc == 3){
                    $mes_actual = "Marzo"; $mes_cobro = "Abril";
                }
                else if($mesvenc == 4){
                    $mes_actual = "Abril"; $mes_cobro = "Mayo";
                }
                else if($mesvenc == 5){
                    $mes_actual = "Mayo"; $mes_cobro = "Junio";
                }
                else if($mesvenc == 6){
                    $mes_actual = "Junio"; $mes_cobro = "Julio";
                }
                else if($mesvenc == 7){
                    $mes_actual = "Julio"; $mes_cobro = "Agosto";
                }
                else if($mesvenc == 8){ 
                    $mes_actual = "Agosto"; $mes_cobro = "Septiembre";
                }
                else if($mesvenc == 9){
                    $mes_actual = "Septiembre"; $mes_cobro = "Octubre";
                }
                else if($mesvenc == 10){
                    $mes_actual = "Octubre"; $mes_cobro = "Noviembre";
                }
                else if($mesvenc == 11){
                    $mes_actual = "Noviembre"; $mes_cobro = "Diciembre";
                }
                else if($mesvenc == 12){
                    $mes_actual = "Diciembre"; $mes_cobro = "Enero";
                }
                $muestra_230 = Muestra_230::get230($cta_cte->contrato_id, $mesvenc, $aniovenc);
                $muestra_230->each(function($muestra_230){
                    $muestra_230->carga_adicional_id;
                    });
                   
                $cargas_adicionales = Carga_adicional::getcarga($cta_cte->contrato_id, $mesvenc, $aniovenc); 
                $cargas_adicionales->each(function($cargas_adicionales){
                    $cargas_adicionales->tipo_carga_adicional;
                    $cargas_adicionales->usuario;
                    $cargas_adicionales->contrato;
                    $cargas_adicionales->orden_trabajo;
                    });
                        
                return view('intranet.cuenta_corriente.VerCargo.visualiza_230')
                                                            ->with('muestra_230', $muestra_230)
                                                            ->with('cargas_adicionales' , $cargas_adicionales);   
                
            }
            //FIN VER DETALLE DE CARGO MENSUAL

            if(($cta_cte->movimiento_ctacte_id == 530) || ($cta_cte->movimiento_ctacte_id == 531) 
                || ($cta_cte->movimiento_ctacte_id == 500) || ($cta_cte->movimiento_ctacte_id == 904) ){
                $venta = Venta::find($cta_cte->venta_id);
                // VER BOLETA FISCAL
                if(($venta->movimiento_venta_id == 82) || ($venta->movimiento_venta_id == 83) || ($venta->movimiento_venta_id == 84) ){
                    $vtas_detalles = Venta_detalle::getvtadet($venta->id);
                    $vtas_detalles->each(function($vtas_detalles){
                    $vtas_detalles->venta;
                    });
                    $vtas_formas_pagos = Venta_forma_pago::getvtasfpagos($venta->id);
                    $vtas_formas_pagos->each(function($vtas_formas_pagos){
                    $vtas_formas_pagos->venta;
                    $vtas_formas_pagos->forma_pago;
                    });
                    $correinternos = Correinterno::getcorreinterno($venta->id);
                    $correinternos->each(function($correinternos){
                    $correinternos->venta;
                    });
                    if($venta->movimiento_venta_id == 82){
                        $caja = 1;
                    } 
                    if($venta->movimiento_venta_id == 83){
                        $caja = 2;
                    }
                    if($venta->movimiento_venta_id == 84){
                        $caja = 3;
                    }   
                    $pdf = \PDF::loadView('intranet.cuenta_corriente.VerPagos.ver_boleta_fiscal', 
                                            ['venta' => $venta, 'vtas_detalles' => $vtas_detalles, 
                                             'vtas_formas_pagos' => $vtas_formas_pagos, 
                                             'correinternos' => $correinternos, 'caja' => $caja ]);
                    return $pdf->stream('boletafiscal.pdf');
                }    
                // FIN VER BOLETA FISCAL

                // VER FACTURA UNO
                if(($venta->movimiento_venta_id == 85) ){
                    $vtas_detalles = Venta_detalle::getvtadet($venta->id);
                    $vtas_detalles->each(function($vtas_detalles){
                    $vtas_detalles->venta;
                    });
                    $vtas_formas_pagos = Venta_forma_pago::getvtasfpagos($venta->id);
                    $vtas_formas_pagos->each(function($vtas_formas_pagos){
                    $vtas_formas_pagos->venta;
                    $vtas_formas_pagos->forma_pago;
                    });
                   $pdf = \PDF::loadView('intranet.cuenta_corriente.VerPagos.ver_factura_uno', 
                                            ['venta' => $venta, 'vtas_detalles' => $vtas_detalles, 
                                             'vtas_formas_pagos' => $vtas_formas_pagos]);
                    return $pdf->stream('factura_uno.pdf');   
                }
                //FIN VER FACTURA UNO
            }

            // CARGO DE OT
            if($cta_cte->movimiento_ctacte_id == 900){
                dd('Mostrar OT');
            }
            // FIN CARGO OT

            // ABONO DE OT
            if($cta_cte->movimiento_ctacte_id == 901){
               if($cta_cte->venta_id <> 0){
                   $venta = Venta::find($cta_cte->venta_id);
                    $vtas_detalles = Venta_detalle::getvtadet($venta->id);
                    $vtas_detalles->each(function($vtas_detalles){
                    $vtas_detalles->venta;
                    });
                    $vtas_formas_pagos = Venta_forma_pago::getvtasfpagos($venta->id);
                    $vtas_formas_pagos->each(function($vtas_formas_pagos){
                    $vtas_formas_pagos->venta;
                    $vtas_formas_pagos->forma_pago;
                    });
                    $pdf = \PDF::loadView('intranet.cuenta_corriente.VerPagos.ver_boleta_cablecolor', 
                                            ['venta' => $venta, 'vtas_detalles' => $vtas_detalles, 
                                             'vtas_formas_pagos' => $vtas_formas_pagos]);
                    return $pdf->stream('bole_cablecolor.pdf');
               }
               else{
                   dd('MOSTRAR OT ABONO OT');
               }
            }
            // FIN ABONO OT

        // $solicitudes->each(function($solicitudes){
        //     $solicitudes->usuario;
        //     $solicitudes->empresa;
        //     $solicitudes->tipo_solicitud;
        //     $solicitudes->contrato;
        //     $solicitudes->autoriza_solicitud;
        //     });
        // $pdf = \PDF::loadView('intranet.usuarios.solicitudes.versolicitudes', ['solicitudes' => $solicitudes]);
        // return $pdf->stream('solicitud.pdf');

    }

    public function ver_nomina_factura(){

         $clientes_facturas = Nomina_factura::all();
         return view('intranet.cuenta_corriente.Ventas.Facturas.nomina', 
                                            ['clientes_facturas' => $clientes_facturas]);
    
    }

    public function cambia_folio_fiscal(Request $request){
        $user = Auth::user();
        return view('intranet.cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_fiscal')->with('ver', 'cambiofoliofiscal')
                                                                                                            ->with('usuario', $user);
    }

    public function cambia_folio_cobranza(Request $request){
        $user = Auth::user();
        return view('intranet.cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_cobranza')->with('ver', 'cambiofoliofiscal')
                                                                                                            ->with('usuario', $user);
    }


    public function actualiza_folio(CuentaCorrienteRequest $request, $id){
        
    	$usuario = User::find($id);
        $usuario->boleta4 = $request->folionuevo;
        $usuario->save();
        flash('El usuario ' .$usuario->usuario. ' ha cambiado su folio fiscal', 'success');
        return redirect()->route('cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_fiscal');

    }

    public function actualiza_folio_cobranza(CuentaCorrienteRequest $request, $id){
        
    	$usuario = User::find($id);
        $usuario->boleta2 = $request->folionuevo;
        $usuario->save();
        flash('El usuario ' .$usuario->usuario. ' ha cambiado su folio fiscal', 'success');
        return redirect()->route('cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_cobranza');

    }

    public function cierre_cajero(){
        $user = Auth::user();
        $hoy = Carbon::parse('now');
        $anio = $hoy->year;
        $mes = $hoy->month;
        $dia = $hoy->day;
        $fecha_parse = $anio."-".$mes."-".$dia;
        $cierres_cajeros = Cajero_numero::getcierre_cajero($user->id, $fecha_parse);
        if($cierres_cajeros->count() > 0){
            $haycierre = true;
        }
        else{
            $haycierre = false;
            $cierre = Cajero_numero::all();
            $ultimo_id = $cierre->last()->id;
            $numero = $ultimo_id."".($dia+1);
            $nuevo_cierre = new Cajero_numero();
            $nuevo_cierre->usuario_id = $user->id;
            $nuevo_cierre->numero = $numero;
            $nuevo_cierre->fecha = $fecha_parse;
            $nuevo_cierre->save();
        }
        return view('intranet.cuenta_corriente.Movimientos.Manejos.Cierre_cajero.cierre_cajero')->with('ver', 'manejosindex')
                                                                                                ->with('haycierre', $haycierre);

    }


    public function vercarga(){

        return view('intranet.cuenta_corriente.Movimientos.Carga.index')->with('ver', 'movimientosindex');
                                                                                                  
    }

    public function genera_carga_manual(Request $request){
        $contrato = Contrato::find($request->ncliente);
        if($contrato != null){
            $existecliente = true;
            $anio_carga = $request->anio;
            $mes_carga = $request->mensualidad;
            $fecha_pago_contrato_parse = Carbon::parse($contrato->fecha_inicio_pago);
            $anio_pago_contrato = $fecha_pago_contrato_parse->year;
            $mes_pago_contrato = $fecha_pago_contrato_parse->month;
            $dia_pago_contrato = $fecha_pago_contrato_parse->day;
            $carga1 = $anio_carga."-".$mes_carga."-01";
            $carga2 = $anio_carga."-".$mes_carga."-".$contrato->dia_pago;
            $fecha_inicio_pago = Carbon::create($anio_pago_contrato, $mes_pago_contrato, $dia_pago_contrato);
            $fecha_carga = Carbon::create($anio_carga, $mes_carga, $contrato->dia_pago);
            $esmayor = $fecha_inicio_pago->gt($fecha_carga);
            if($esmayor == true){
                $comparafecha = true;
            }
            else{
                $comparafecha = false;
                $existecarga = Cuenta_corriente::getcarga($contrato->id, '230', $carga2);
                if($existecarga->count() == 0){
                    $haycarga = false;
                    $cargo_mensual = Mensual::find($contrato->id);
                    if($cargo_mensual->suma > 0){
                        $haycargo = true;
                        if($request->proporcionales != null){

                            $hoy = Carbon::parse('now');
                            $propor = 30 - ($hoy->day);
                            $carga_proporcional = intval(($cargo_mensual->suma/30)*$propor);
                            $carga_manual = new Cuenta_corriente();
                            $carga_manual->fecha_documento = $carga1;
                            $carga_manual->fecha_vencimiento = $carga2;
                            $carga_manual->valor = $carga_proporcional;
                            $carga_manual->movimiento_ctacte_id = 230;
                            $carga_manual->venta_id = 0;
                            $carga_manual->contrato_id = $request->ncliente;
                            $carga_manual->save();
                        }
                        else{

                            $carga_manual = new Cuenta_corriente();
                            $carga_manual->fecha_documento = $carga1;
                            $carga_manual->fecha_vencimiento = $carga2;
                            $carga_manual->valor = $cargo_mensual->suma;
                            $carga_manual->movimiento_ctacte_id = 230;
                            $carga_manual->venta_id = 0;
                            $carga_manual->contrato_id = $request->ncliente;
                            $carga_manual->save();
                        }
                    }
                    else{
                        $haycargo = false;
                    }
                }
                else{
                    $haycarga = true;
                    $haycargo = false;
                }
                
            }
        }
        else{
            $existecliente = false;
            $comparafecha = false;
            $haycargo = true;
            $haycarga = false;
        }

        
        return view('intranet.cuenta_corriente.Movimientos.Carga.muestra_carga')->with('ver', 'movimientosindex')
                                                                        ->with('comparafecha', $comparafecha)
                                                                        ->with('haycarga', $haycarga)
                                                                        ->with('haycargo', $haycargo)
                                                                        ->with('existecliente', $existecliente);
                                                                                                  
    }


    public function consulta_cierre_cajero(Request $request){
        $cajeros_cierres = Cajero_cierre::getcajero_cierre($request->fecha);
        $cajeros_cierres->each(function($cajeros_cierres){
                    $cajeros_cierres->usuario;
                    });
        return view('intranet.cuenta_corriente.Movimientos.Cajero.ver_cierres')->with('ver', 'cajaindex')
                                                                                ->with('cajeros_cierres', $cajeros_cierres)
                                                                                ;
                                                                                                  
    }

    public function ver_cierre_detalle($id, $cajero, $fecha, $valor, $cajero_id){
        $pagos_efectivo = Cajero_diario_efectivo::getcajero_diario_efectivo($fecha, $cajero_id);
       // dd($pagos_efectivo);
        $pagos_efectivo->each(function($pagos_efectivo){
                    $pagos_efectivo->forma_pago;
                    $pagos_efectivo->usuario;
                    $pagos_efectivo->movimiento_venta;
                    });
        if($pagos_efectivo->count() > 0){
            $pago_efect = true;
        }
        else{
            $pago_efect = false;
            $pagos_efectivo = "";
        }

        $pagos_efectivo_fact = Cajero_diario_efectivo_factura::getcajero_diario_efectivo_factura($fecha, $cajero_id);
        $pagos_efectivo_fact->each(function($pagos_efectivo_fact){
                    $pagos_efectivo_fact->forma_pago;
                    $pagos_efectivo_fact->usuario;
                    $pagos_efectivo_fact->movimiento_venta;
                    });
        if($pagos_efectivo_fact->count() > 0){
            $pago_efect_fact = true;
        }
        else{
            $pago_efect_fact = false;
            $pagos_efectivo_fact = "";
        }

        $pagos_bancoestado = Cajero_diario_bancoestado::getcajero_diario_bancoestado($fecha, $cajero_id);
        $pagos_bancoestado->each(function($pagos_bancoestado){
                    $pagos_bancoestado->forma_pago;
                    $pagos_bancoestado->usuario;
                    $pagos_bancoestado->movimiento_venta;
                    });
        if($pagos_bancoestado->count() > 0){
            $pago_bancoestado = true;
        }
        else{
            $pago_bancoestado = false;
            $pagos_bancoestado = "";
        }

        $pagos_bancoestado_al_dia_factura = Cajero_diario_bancoestado_dia_factura::getcajero_diario_bancoestado_al_dia_factura($fecha, $cajero_id);
        $pagos_bancoestado_al_dia_factura->each(function($pagos_bancoestado_al_dia_factura){
                    $pagos_bancoestado_al_dia_factura->forma_pago;
                    $pagos_bancoestado_al_dia_factura->usuario;
                    $pagos_bancoestado_al_dia_factura->movimiento_venta;
                    });
        if($pagos_bancoestado_al_dia_factura->count() > 0){
            $pago_bancoestado_dia_factura = true;
        }
        else{
            $pago_bancoestado_dia_factura = false;
            $pagos_bancoestado_al_dia_factura = "";
        }

        $pagos_serviestado = Cajero_diario_serviestado::getcajero_diario_serviestado($fecha, $cajero_id);
        $pagos_serviestado->each(function($pagos_serviestado){
                    $pagos_serviestado->forma_pago;
                    $pagos_serviestado->usuario;
                    $pagos_serviestado->movimiento_venta;
                    });
        if($pagos_serviestado->count() > 0){
            $pago_serviestado = true;
        }
        else{
            $pago_serviestado = false;
            $pagos_serviestado = "";
        }

        $pagos_serviestado_factura = Cajero_diario_serviestado_factura::getcajero_diario_serviestado_factura($fecha, $cajero_id);
        $pagos_serviestado_factura->each(function($pagos_serviestado_factura){
                    $pagos_serviestado_factura->forma_pago;
                    $pagos_serviestado_factura->usuario;
                    $pagos_serviestado_factura->movimiento_venta;
                    });
        if($pagos_serviestado_factura->count() > 0){
            $pago_serviestado_fact = true;
        }
        else{
            $pago_serviestado_fact = false;
            $pagos_serviestado_factura = "";
        }

        $pagos_otros_bancos = Cajero_diario_otros_bancos::getcajero_diario_otros_bancos($fecha, $cajero_id);
        $pagos_otros_bancos->each(function($pagos_otros_bancos){
                    $pagos_otros_bancos->forma_pago;
                    $pagos_otros_bancos->usuario;
                    $pagos_otros_bancos->movimiento_venta;
                    });
        if($pagos_otros_bancos->count() > 0){
            $pago_otro_banco = true;
        }
        else{
            $pago_otro_banco = false;
            $pagos_otros_bancos = "";
        }

        $pagos_otros_bancos_factura = Cajero_diario_otros_bancos_factura::getcajero_diario_otros_bancos_factura($fecha, $cajero_id);
        $pagos_otros_bancos_factura->each(function($pagos_otros_bancos_factura){
                    $pagos_otros_bancos_factura->forma_pago;
                    $pagos_otros_bancos_factura->usuario;
                    $pagos_otros_bancos_factura->movimiento_venta;
                    });
        if($pagos_otros_bancos_factura->count() > 0){
            $pago_otro_banco_factura = true;
        }
        else{
            $pago_otro_banco_factura = false;
            $pagos_otros_bancos_factura = "";
        }

        $pagos_pacs = Cajero_diario_pac::getcajero_diario_pacs($fecha, $cajero_id);
        $pagos_pacs->each(function($pagos_pacs){
                    $pagos_pacs->forma_pago;
                    $pagos_pacs->usuario;
                    $pagos_pacs->movimiento_venta;
                    });
        if($pagos_pacs->count() > 0){
            $pago_pac = true;
        }
        else{
            $pago_pac = false;
            $pagos_pacs = "";
        }

        $pagos_pacs_facturas = Cajero_diario_pac_factura::getcajero_diario_pacs_facturas($fecha, $cajero_id);
        $pagos_pacs_facturas->each(function($pagos_pacs_facturas){
                    $pagos_pacs_facturas->forma_pago;
                    $pagos_pacs_facturas->usuario;
                    $pagos_pacs_facturas->movimiento_venta;
                    });
        if($pagos_pacs_facturas->count() > 0){
            $pago_pac_fact = true;
        }
        else{
            $pago_pac_fact = false;
            $pagos_pacs_facturas = "";
        }

        $pagos_pats = Cajero_diario_pat::getcajero_diario_pats($fecha, $cajero_id);
        $pagos_pats->each(function($pagos_pats){
                    $pagos_pats->forma_pago;
                    $pagos_pats->usuario;
                    $pagos_pats->movimiento_venta;
                    });
        if($pagos_pats->count() > 0){
            $pago_pat = true;
        }
        else{
            $pago_pat = false;
            $pagos_pats = "";
        }

        $pagos_facturas_canjes = Cajero_diario_factura_canje::getcajero_diario_facturas_canjes($fecha, $cajero_id);
        $pagos_facturas_canjes->each(function($pagos_facturas_canjes){
                    $pagos_facturas_canjes->forma_pago;
                    $pagos_facturas_canjes->usuario;
                    $pagos_facturas_canjes->movimiento_venta;
                    });
        if($pagos_facturas_canjes->count() > 0){
            $pago_factura_canje = true;
        }
        else{
            $pago_factura_canje = false;
            $pagos_facturas_canjes = "";
        }

        $pagos_unired = Cajero_diario_unired::getcajero_diario_unired($fecha, $cajero_id);
        $pagos_unired->each(function($pagos_unired){
                    $pagos_unired->forma_pago;
                    $pagos_unired->usuario;
                    $pagos_unired->movimiento_venta;
                    });
        if($pagos_unired->count() > 0){
            $pago_unired = true;
        }
        else{
            $pago_unired = false;
            $pagos_unired = "";
        }


        $pagos_unired_factura = Cajero_diario_unired_factura::getcajero_diario_unired_factura($fecha, $cajero_id);
        $pagos_unired_factura->each(function($pagos_unired_factura){
                    $pagos_unired_factura->forma_pago;
                    $pagos_unired_factura->usuario;
                    $pagos_unired_factura->movimiento_venta;
                    });
        if($pagos_unired_factura->count() > 0){
            $pago_unired_fact = true;
        }
        else{
            $pago_unired_fact = false;
            $pagos_unired_factura = "";
        }

        $nulas_fiscales = Nula_fiscal::getnulas_fiscales($fecha, $cajero_id);
        $nulas_fiscales->each(function($nulas_fiscales){
                    $nulas_fiscales->venta;
                    $nulas_fiscales->usuario;
                    });
        if($nulas_fiscales->count() > 0){
            $haynulas = true;
            $bolestas_nulas = $nulas_fiscales;
        }
        else{
            $haynulas = false;
            $bolestas_nulas = "";
        }

        $primera_boleta = Primera_boleta_fiscal::find($id);
        $ultima_boleta = Ultima_boleta_fiscal::find($id);

       return view('intranet.cuenta_corriente.Movimientos.Cajero.ver_cierre_detalle', 
                                            ['id' => $id, 'cajero' => $cajero, 'fecha' => $fecha, 
                                             'valor' => $valor, 'pago_efect' => $pago_efect, 'pagos_efectivo' => $pagos_efectivo,
                                            'pago_efect_fact' => $pago_efect_fact, 'pagos_efectivo_fact' => $pagos_efectivo_fact,
                                            'pago_bancoestado' => $pago_bancoestado, 
                                            'pagos_bancoestado' => $pagos_bancoestado, 
                                            'pago_bancoestado_dia_factura' => $pago_bancoestado_dia_factura,
                                            'pagos_bancoestado_al_dia_factura' => $pagos_bancoestado_al_dia_factura,
                                            'pago_serviestado' => $pago_serviestado, 'pagos_serviestado' => $pagos_serviestado,
                                            'pago_serviestado_fact' => $pago_serviestado_fact, 
                                            'pagos_serviestado_factura' => $pagos_serviestado_factura, 'pago_otro_banco' => $pago_otro_banco,
                                            'pagos_otros_bancos' => $pagos_otros_bancos, 'pago_otro_banco_factura' => $pago_otro_banco_factura,
                                            'pagos_otros_bancos_factura' => $pagos_otros_bancos_factura, 'pago_pac' => $pago_pac,
                                            'pagos_pacs' => $pagos_pacs, 'pago_pac_fact' => $pago_pac_fact, 
                                            'pagos_pacs_facturas' => $pagos_pacs_facturas, 'pago_pat' => $pago_pat,
                                            'pagos_pats' => $pagos_pats ,'pago_factura_canje' => $pago_factura_canje,
                                            'pagos_facturas_canjes' => $pagos_facturas_canjes, 'pago_unired' => $pago_unired,
                                            'pagos_unired' => $pagos_unired, 'pago_unired_fact' => $pago_unired_fact,
                                            'pagos_unired_factura' => $pagos_unired_factura, 'haynulas' => $haynulas,
                                            'boletas_nulas' => $bolestas_nulas, 'primera_boleta' => $primera_boleta,
                                            'ultima_boleta' => $ultima_boleta]);
        //return $pdf->stream('rendicion_cajero.pdf');
    }



    public function solicitanc(Request $request){
        $user = Auth::user();
        $ventas = Venta::getventa($request->ninterno, $request->caja);
        if($ventas->count() > 0){
            $exiteventa = true;
            $correinternos = Correinterno::getcorreinterno($ventas[0]->id);
            if($correinternos->count() > 0){
                $existeboleta = true; 
                $haync = Nota_credito::getnc($correinternos[0]->venta_id);
                if($haync->count() < 1){
                    $existenc = false;
                    $nota_credito = new Nota_credito();
                    $nota_credito->venta_id = $correinternos[0]->venta_id;
                    $nota_credito->usuario_id = $user->id;
                    $nota_credito->save(); 
                    $venta = Venta::find($ventas[0]->id); 
                    $venta->nula = -1;
                    $venta->save();
                    $correinterno = Correinterno::find($correinternos[0]->id);
                    $correinterno->nulo = -1;
                    $correinterno->save();
                }
                else{
                    $existenc = true;
                }
 
            }
            else{
                $existeboleta = false;
                $existenc = true;
            }
            
        }
        else{
            $exiteventa = false;
            $existeboleta = false;
            $existenc = true;
        }

        return view('intranet.cuenta_corriente.Ventas.NC.mostrar_resultado_nc', ['ver' => 'ventasnc', 'exiteventa' => $exiteventa, 
                            'existeboleta' => $existeboleta, 'existenc' => $existenc]);
    }

    public function vernc(Request $request){
        $notas_credito = Nota_credito::search($request->nrointerno)->orderBy('id', 'ASC')->paginate(15);

        $notas_credito->each(function($notas_credito){
                    $notas_credito->venta;
                    $notas_credito->usuario;
                    });

        return view('intranet.cuenta_corriente.Ventas.NC.ver_nc')->with('notas_credito', $notas_credito)->with('ver', 'ventasnc');
    }

}

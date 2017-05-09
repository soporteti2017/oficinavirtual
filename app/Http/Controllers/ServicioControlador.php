<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use Laracasts\Flash\Flash;
use App\Http\Requests\ServicioRequest;
use App\Orden_trabajo;
use App\Contrato_adicional;
use App\PremiumCaja;
use App\Contrato_inet;
use App\Cmcliente;
use App\Contratopremium;
use App\Ot_cambio_activo;
use App\Cambio_domicilio;
use App\Contrato_termino;
use App\Ot_retiro;
use App\Cmmac;
use App\Retiro_stb;

class ServicioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $servicios = Servicio::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        return view('intranet.servicios.index')->with('ver', 'servicios')->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intranet.servicios.create')->with('ver', 'servicios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        $servicio = new Servicio($request->all());
        $servicio->save();
        flash('Servicio ' .$servicio->descripcion. ' agregado correctamente', 'success');
        return redirect()->route('servicios.index');
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
        $servicio = Servicio::find($id);
        return view('intranet.servicios.edit')->with('ver', 'servicios')->with('servicio', $servicio);
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
        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();    
        
        flash('Servicio ' .$servicio->descripcion. ' ha sido editado', 'success');
        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();

        flash('Servicio ' .$servicio->descripcion. ' ha sido borrado', 'danger');
        return redirect()->route('servicios.index');
    }

    public function versolicitudes($id){

        $pdf = \App::make('dompdf.wrapper');
        $orden_trabajo = Orden_trabajo::find($id);
        // DISTINGUIR TIPOS DE OT
        if($orden_trabajo->tipo_ot_id == 1){
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_conexion', ['orden_trabajo' => $orden_trabajo]);
            return $pdf->stream('ot_conexion.pdf');
        }
        if($orden_trabajo->tipo_ot_id == 2){
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_desconexion', ['orden_trabajo' => $orden_trabajo]);
            return $pdf->stream('ot_desconexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 3){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            $contratos_inets = Contrato_inet::getcontratosinets($orden_trabajo->contrato_id);
            
            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }
            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                 $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
            }
            if($contratos_inets->count() > 0){
               $inet = "SI"; 
               $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
               $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);
            }
            else{
                $inet = "NO";
                $contrato_plan = "N/A";
                $cm_cliente = "N/A";
            }


            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_reconexion', ['orden_trabajo' => $orden_trabajo, 
                                    'boc_adic' => $boc_adic, 'stb' => $stb, 'inet' => $inet, 'contrato_plan' => 
                                    $contrato_plan[0], 'cm_cliente' => $cm_cliente[0], 'contratospremiums' => $contratospremiums]);
            return $pdf->stream('ot_reconexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 15){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
            $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);

            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }

            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                 $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
                 $stb_cant = 1;
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
                $stb_cant = 0;
            }

            $split_cant = $boc_adic + $stb_cant;
                if($split_cant > 3)
                    $split = "Spliter Digital 4 Caminos";
                else
                    $split = "Spliter Digital 2 Caminos";    
            
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_instalacion_ba', ['orden_trabajo' => $orden_trabajo, 
                                    'boc_adic' => $boc_adic, 'stb' => $stb, 'cm_cliente' => $cm_cliente[0], 
                                    'contratospremiums' => $contratospremiums, 'split' => $split]);
            return $pdf->stream('ot_instalacion_ba.pdf');
        }   

        if($orden_trabajo->tipo_ot_id == 6){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $contratos_inets = Contrato_inet::getcontratosinets($orden_trabajo->contrato_id);
            
            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }
            if($contratos_inets->count() > 0){
               $inet = "SI"; 
               $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);
               $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
            }
            else{
                $inet = "NO";
                $contrato_plan = "N/A";
                $cm_cliente = "N/A";
            }
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_servicio_cliente', ['orden_trabajo' => $orden_trabajo, 'boc_adic' => $boc_adic,
                                    'inet' => $inet, 'contrato_plan' => $contrato_plan, 'cm_cliente' => $cm_cliente]);
            return $pdf->stream('ot_servicio_cliente.pdf');
        } 

        if($orden_trabajo->tipo_ot_id == 18){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            $contratos_inets = Contrato_inet::getcontratosinets($orden_trabajo->contrato_id);
            $ot_intermitencia = Orden_trabajo::get_ult_ot($orden_trabajo->contrato_id, 16);
            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }
            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                 $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
            }
            if($contratos_inets->count() > 0){
               $inet = "SI"; 
               $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
               $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);
               $mac_cambios = Ot_cambio_activo::getmacs($orden_trabajo->id);
            }
            else{
                $inet = "NO";
                $contrato_plan = "N/A";
                $cm_cliente = "N/A";
                $mac_cambios = "N/A";
            }


            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_cambio_cm', ['orden_trabajo' => $orden_trabajo, 
                                    'boc_adic' => $boc_adic, 'stb' => $stb, 'inet' => $inet, 'contrato_plan' => 
                                    $contrato_plan[0], 'cm_cliente' => $cm_cliente[0], 'contratospremiums' => $contratospremiums,
                                    'ot_intermitencia' => $ot_intermitencia, 'mac_cambios' => $mac_cambios]);
            return $pdf->stream('ot_cambio_cm.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 4){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            $contratos_inets = Contrato_inet::getcontratosinets($orden_trabajo->contrato_id);
            $ot_intermitencia = Orden_trabajo::get_ult_ot($orden_trabajo->contrato_id, 4);
            $cambios_domicilios = Cambio_domicilio::get_direccion($orden_trabajo->contrato_id);

            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }
            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
            }
            if($contratos_inets->count() > 0){
               $inet = "SI"; 
               $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
               $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);
               $mac_cambios = Ot_cambio_activo::getmacs($orden_trabajo->id);
            }
            else{
                $inet = "NO";
                $contrato_plan = "N/A";
                $cm_cliente = "N/A";
                $mac_cambios = "N/A";
            }

            if($cambios_domicilios->count() > 0){
                $cambio_dom = $cambios_domicilios->max()->direccion;
            }
            else{
                $cambio_dom = "";
            }


            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_cambio_domicilio', ['orden_trabajo' => $orden_trabajo, 
                                    'boc_adic' => $boc_adic, 'stb' => $stb, 'inet' => $inet, 'contrato_plan' => 
                                    $contrato_plan[0], 'cm_cliente' => $cm_cliente[0], 'contratospremiums' => $contratospremiums,
                                    'ot_intermitencia' => $ot_intermitencia, 'mac_cambios' => $mac_cambios, 
                                    'domicilio_cambio' => $cambio_dom]);
            return $pdf->stream('ot_cambio_cm.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 7){
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                 $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
            }
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_cambio_plan', ['orden_trabajo' => $orden_trabajo, 'stb' => $stb]);
            return $pdf->stream('ot_cambio_plan.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 12){
            $contratos_terminos = Contrato_termino::getcontratotermino($orden_trabajo->id);
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_termino_contrato', ['orden_trabajo' => $orden_trabajo, 'contratos_terminos' => $contratos_terminos]);
            return $pdf->stream('ot_conexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 14){
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_cambio_mlp', ['orden_trabajo' => $orden_trabajo]);
            return $pdf->stream('ot_conexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 16){
            $ots_retiros = Ot_retiro::getotretiro($orden_trabajo->id);
            $cmmac = Cmmac::find($ots_retiros[0]->mac);
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_retiro_cm', ['orden_trabajo' => $orden_trabajo, 'cmmac' => $cmmac]);
            return $pdf->stream('ot_retiro_cm.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 17){
            $retiros_stbs = Retiro_stb::getstb($orden_trabajo->id);
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_retiro_stb', ['orden_trabajo' => $orden_trabajo, 'stb' => $retiros_stbs[0]->stb]);
            return $pdf->stream('ot_retiro_cm.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 20){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);
            $premiums_cajas = PremiumCaja::getpremium($orden_trabajo->contrato_id);
            $contratos_inets = Contrato_inet::getcontratosinets($orden_trabajo->contrato_id);
            
            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }
            if($premiums_cajas->count() > 0){
                $stb = $premiums_cajas[0]->serie;
                 $contratospremiums = Contratopremium::getcontratospremiums($orden_trabajo->contrato_id);
            }
            else{
                $stb = "NO";
                $contratospremiums = "";
            }
            if($contratos_inets->count() > 0){
               $inet = "SI"; 
               $contrato_plan = Contrato_inet::getcontratosinetsplan($orden_trabajo->contrato_id);
               $cm_cliente = Cmcliente::getcmcliente($orden_trabajo->contrato_id);
               $mac_cambios = Ot_cambio_activo::getmacs($orden_trabajo->id);
            }
            else{
                $inet = "NO";
                $contrato_plan = "N/A";
                $cm_cliente = "N/A";
                $mac_cambios = "";
            }


            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_cambio_tipo_cm', ['orden_trabajo' => $orden_trabajo, 
                                    'boc_adic' => $boc_adic, 'stb' => $stb, 'inet' => $inet, 'contrato_plan' => 
                                    $contrato_plan[0], 'cm_cliente' => $cm_cliente[0], 'contratospremiums' => $contratospremiums,
                                    'mac_cambios' => $mac_cambios]);
            return $pdf->stream('ot_reconexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 23){
            $bocas_adiciones = Contrato_adicional::getbocas($orden_trabajo->contrato_id);

            if($bocas_adiciones->count() > 0){
                $boc_adic = intval($bocas_adiciones[0]->cantidad);
            }
            else{
                $boc_adic = 0;
            }

            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_tv_digital', ['orden_trabajo' => $orden_trabajo, 'boc_adic' => $boc_adic]);
            return $pdf->stream('ot_conexion.pdf');
        }

        if($orden_trabajo->tipo_ot_id == 24){
            $ots_retiros = Ot_retiro::getotretiro($orden_trabajo->id);
            $cmmac = Cmmac::find($ots_retiros[0]->mac);
            $pdf = \PDF::loadView('intranet.servicios.OT.VerOT.ver_ot_termino_contrato_inet', ['orden_trabajo' => $orden_trabajo, 'cmmac' => $cmmac]);
            return $pdf->stream('ot_conexion.pdf');
        }

        // FIN DISTINGUIR TIPOS DE OT
        

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Com_puerto;

class GestionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet.gestion.Fiscal.index')->with('ver', 'indexfiscal');
    }

    public function verfuncionesimpresora()
    {
        return view('intranet.gestion.Fiscal.Funciones.index')->with('ver', 'verfunciones');
    }

    public function vercambiofecha()
    {
        return view('intranet.gestion.Fiscal.Fecha.index')->with('ver', 'vercambiofecha');
    }

    public function verconfboleta()
    {
        return view('intranet.gestion.Fiscal.Boleta.index')->with('ver', 'verconfboleta');
    }

    public function vertipopago()
    {
        return view('intranet.gestion.Fiscal.TipoPago.index')->with('ver', 'vertipopago');
    }

    public function verreportesemitidos()
    {
        return view('intranet.gestion.Fiscal.ReportesEmitidos.index')->with('ver', 'verreportesemitidos');
    }

    public function verjornadafiscalcurso()
    {
        return view('intranet.gestion.Fiscal.JornadaFiscal.index')->with('ver', 'verjornadafiscalcurso');
    }

    public function verreporteelectronico()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.index')->with('ver', 'verreporteelectronico');
    }

    public function verreporteelectronicocierrez()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Cierrez.index')->with('ver', 'verreporteelectronicocierrez');
    }

    public function verreporteelectronicotransacciones()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Transacciones.index')->with('ver', 'verreporteelectronicotransacciones');
    }

    public function veracumuladores()
    {
        return view('intranet.gestion.Fiscal.Acumuladores.index')->with('ver', 'veracumuladores');
    }

    public function avanzarfiscal()
    {
        return view('intranet.gestion.Fiscal.Funciones.avanzar')->with('ver', 'verfunciones');
    }

    public function cortarfiscal()
    {
        return view('intranet.gestion.Fiscal.Funciones.cortar')->with('ver', 'verfunciones');
    }

    public function docnofiscal()
    {
        return view('intranet.gestion.Fiscal.Funciones.docnofiscal')->with('ver', 'verfunciones');
    }

    public function dnfpago()
    {
        return view('intranet.gestion.Fiscal.Funciones.dnfpago')->with('ver', 'verfunciones');
    }

    public function mostraracumuladores()
    {
        return view('intranet.gestion.Fiscal.Acumuladores.acumuladores')->with('ver', 'veracumuladores');
    }

    public function mostrarfiscalcurso()
    {
        return view('intranet.gestion.Fiscal.Acumuladores.fiscal_curso')->with('ver', 'veracumuladores');
    }

    public function mostrarfecha()
    {
        return view('intranet.gestion.Fiscal.Fecha.ver_fecha')->with('ver', 'vercambiofecha');
    }

    public function cambiar_fecha()
    {
        return view('intranet.gestion.Fiscal.Fecha.cambiar_fecha')->with('ver', 'vercambiofecha');
    }

    public function ver_encabezado()
    {
        return view('intranet.gestion.Fiscal.Boleta.ver_encabezado')->with('ver', 'verconfboleta');
    }

    public function ver_pie()
    {
        return view('intranet.gestion.Fiscal.Boleta.ver_pie')->with('ver', 'verconfboleta');
    }

    public function configura_encabezado()
    {
        return view('intranet.gestion.Fiscal.Boleta.configura_encabezado')->with('ver', 'verconfboleta');
    }

    public function configura_pie()
    {
        return view('intranet.gestion.Fiscal.Boleta.configura_pie')->with('ver', 'verconfboleta');
    }

    public function ver_tipo_pago()
    {
        return view('intranet.gestion.Fiscal.TipoPago.ver_tipo_pago')->with('ver', 'vertipopago');
    }

    public function configura_tipo_pago()
    {
        return view('intranet.gestion.Fiscal.TipoPago.configura_tipo_pago')->with('ver', 'vertipopago');
    }

    public function cierre_cajero()
    {
        return view('intranet.gestion.Fiscal.ReportesEmitidos.cierre_cajero')->with('ver', 'verreportesemitidos');
    }

    public function reporte_x()
    {
        return view('intranet.gestion.Fiscal.ReportesEmitidos.reporte_x')->with('ver', 'verreportesemitidos');
    }

    public function reporte_z()
    {
        return view('intranet.gestion.Fiscal.ReportesEmitidos.reporte_z')->with('ver', 'verreportesemitidos');
    }

    public function transacciones_fecha()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_fecha')->with('ver', 'verreporteelectronicotransacciones');
    }

    public function transacciones_rango()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_rango')->with('ver', 'verreporteelectronicotransacciones');
    }

    public function cierrez_fecha()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_fecha')->with('ver', 'verreporteelectronicocierrez');
    }

    public function cierrez_rango()
    {
        return view('intranet.gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_rango')->with('ver', 'verreporteelectronicocierrez');
    }

    public function generaavance(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Funciones.solicita_avance')->with('ver', 'general')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('lineas', $request->lineas);
        
    }

    public function generacorte(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Funciones.solicita_corte')->with('ver', 'general')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function generadocnofiscal(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Funciones.solicita_docnofiscal')->with('ver', 'general')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('texto', $request->texto);
        
    }

    public function generardnfpago(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Funciones.solicita_docnofiscalpago')->with('ver', 'general')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('texto', $request->texto);
        
    }

    public function generaacumuladores(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Acumuladores.solicita_acumuladores')->with('ver', 'veracumuladores')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function generarfiscalcurso(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Acumuladores.solicita_fiscalcurso')->with('ver', 'veracumuladores')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_fecha(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Fecha.solicita_fecha')->with('ver', 'vercambiofecha')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_cambio_fecha(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Fecha.solicita_cambio_fecha')->with('ver', 'vercambiofecha')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('fecha', $request->fecha)
                                                     ->with('hora', $request->hora);
    }

    public function solicita_encabezado(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Boleta.solicita_encabezado')->with('ver', 'verconfboleta')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_pie(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Boleta.solicita_pie')->with('ver', 'verconfboleta')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_conf_encabezado(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Boleta.solicita_conf_encabezado')->with('ver', 'verconfboleta')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('linea1', $request->linea1)
                                                     ->with('linea2', $request->linea2)
                                                     ->with('linea3', $request->linea3)
                                                     ->with('linea4', $request->linea4)
                                                     ->with('linea5', $request->linea5)
                                                     ->with('linea6', $request->linea6)
                                                     ->with('linea7', $request->linea7)
                                                     ->with('linea8', $request->linea8)
                                                     ->with('linea9', $request->linea9)
                                                     ->with('linea10', $request->linea10)
                                                     ;
        
    }

    public function solicita_conf_pie(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.Boleta.solicita_conf_pie')->with('ver', 'verconfboleta')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('linea1', $request->linea1)
                                                     ->with('linea2', $request->linea2)
                                                     ->with('linea3', $request->linea3)
                                                     ->with('linea4', $request->linea4)
                                                     ->with('linea5', $request->linea5)
                                                     ->with('linea6', $request->linea6)
                                                     ->with('linea7', $request->linea7)
                                                     ->with('linea8', $request->linea8)
                                                     ->with('linea9', $request->linea9)
                                                     ->with('linea10', $request->linea10)
                                                     ;
        
    }

    public function solicita_tipo_pago(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.TipoPago.solicita_tipo_pago')->with('ver', 'vertipopago')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_conf_tipo_pago(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.TipoPago.solicita_conf_tipo_pago')->with('ver', 'verconfboleta')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('linea1', $request->linea1)
                                                     ->with('linea2', $request->linea2)
                                                     ->with('linea3', $request->linea3)
                                                     ->with('linea4', $request->linea4)
                                                     ->with('linea5', $request->linea5)
                                                     ->with('linea6', $request->linea6)
                                                     ->with('linea7', $request->linea7)
                                                     ->with('linea8', $request->linea8)
                                                     ->with('linea9', $request->linea9)
                                                     ->with('linea10', $request->linea10)
                                                     ->with('linea11', $request->linea11)
                                                     ->with('linea12', $request->linea12)
                                                     ->with('linea13', $request->linea13)
                                                     ->with('linea14', $request->linea14)
                                                     ->with('linea15', $request->linea15)
                                                     ->with('linea16', $request->linea16)
                                                     ->with('linea17', $request->linea17)
                                                     ->with('linea18', $request->linea18)
                                                     ->with('linea19', $request->linea19)
                                                     ->with('linea20', $request->linea20)
                                                     ;
        
    }

    public function solicita_cierre_cajero(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReportesEmitidos.solicita_cierre_cajero')->with('ver', 'verreportesemitidos')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_reporte_x(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReportesEmitidos.solicita_reporte_x')->with('ver', 'verreportesemitidos')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_reporte_z(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReportesEmitidos.solicita_reporte_z')->with('ver', 'verreportesemitidos')
                                                     ->with('com_puertos', $com_puertos[0]->puerto);
        
    }

    public function solicita_transacciones_fecha(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReporteElectronico.Transacciones.solicita_transacciones_fecha')->with('ver', 'verreportesemitidos')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('tipo_informe', $request->tipo_informe)
                                                     ->with('fecha_inicial', $request->fecha_inicial)
                                                     ->with('fecha_final', $request->fecha_final);
        
    }

    public function solicita_transacciones_rango(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReporteElectronico.Transacciones.solicita_transacciones_rango')->with('ver', 'verreportesemitidos')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('tipo_informe', $request->tipo_informe)
                                                     ->with('rango_inicial', $request->rango_inicial)
                                                     ->with('rango_final', $request->rango_final);
        
    }

    public function solicita_cierrez_fecha(Request $request){
        $com_puertos = Com_puerto::getcom($request->caja);
        return view('intranet.gestion.Fiscal.ReporteElectronico.Cierrez.solicita_cierrez_fecha')->with('ver', 'verreporteelectronicocierrez')
                                                     ->with('com_puertos', $com_puertos[0]->puerto)
                                                     ->with('tipo_informe', $request->tipo_informe)
                                                     ->with('fecha_inicial', $request->fecha_inicial)
                                                     ->with('fecha_final', $request->fecha_final);
        
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
}

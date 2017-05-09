@extends('layouts.app')

@section('titulo', 'Rendición de Cajero')

@section('content')

<?php
  $totefectivo = 0;
  $totefectivofact = 0;
  $totbancoestadodia = 0;
  $totbancoestadofecha = 0;
  $totbancoestadodiafact = 0;
  $totserviestado = 0;
  $totserviestadofact = 0;
  $tototrobancodia = 0;
  $tototrobancofecha = 0;
  $tototrobancofactura = 0;
  $totopac = 0;
  $totpacfactura = 0;
  $totpat = 0;
  $totfactcanje = 0;
  $totunired = 0;
  $totuniredfact = 0;
  $totalcaja = 0;
  $totnula = 0;
  $cuentaboletas = 0;
  $cuentanulas = 0;
?>

<table class="table table-striped" width="100%">
  <thead>
    <tr class="info">
      <th colspan="1"><strong>{{ $id }}</strong></th>
      <th colspan="3"><strong>INFORME DE RENDICION DE CAJERO</strong></th>
    </tr>
    <tr class="info">
      <th colspan="2">CAJERO:<strong>{{ $cajero }}</strong></th>
      <th colspan="2">FECHA:<strong>{{ $fecha }}</strong></th>
    </tr>
    <tr class="info">
      <th colspan="4">SUCURSAL:<strong> Ovalle</strong></th>
    </tr>
  </thead>
</table>

<br>

  @if($pago_efect == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="2">Forma de Pago</th>
          <th colspan="4"><strong>Efectivo</strong></th>
        </tr>
        <tr class="info">
          <th width="12%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="15%" align="center"><strong>T Doc</strong></th>
          <th width="12%" align="center"><strong>Cliente</strong></th>
          <th width="30%" align="center"><strong>Descripción</strong></th>
          <th width="19%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_efectivo as $pago_efectivo)
        <tbody>
          <tr>
            <th align="center">{{ $pago_efectivo->documento }}</th>
            <th align="center">{{ $pago_efectivo->ndocumento }}</th>
            <th align="center">{{ $pago_efectivo->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_efectivo->contrato_id }}</th>
            <th align="center">{{ $pago_efectivo->descripcion }}</th>
            <th align="center">{{ $pago_efectivo->valor }}</th>
          </tr>
        </tbody>
        <?php 
          $totefectivo = $totefectivo + $pago_efectivo->valor; 
          $cuentaboletas++;
        ?>
      @endforeach
      <tr class="success">
        <td colspan="6" align="center"><strong><h4>Total Forma de Pago Efectivo $ {{ $totefectivo }}</h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_efect_fact == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="1">Forma de Pago</th>
          <th colspan="4"><strong>Efectivo Factura</strong></th>
        </tr>
        <tr class="info">
          <th width="12%" align="center"><strong>Nro Doc</strong></th>
          <th width="25%" align="center"><strong>T Doc</strong></th>
          <th width="12%" align="center"><strong>Cliente</strong></th>
          <th width="32%" align="center"><strong>Descripción</strong></th>
          <th width="19%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_efectivo_fact as $pago_efectivo_fact)
        <tbody>
          <tr >
            <th align="center">{{ $pago_efectivo_fact->documento }}</th>
            <th align="center">{{ $pago_efectivo_fact->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_efectivo_fact->contrato_id }}</th>
            <th align="center">{{ $pago_efectivo_fact->descripcion }}</th>
            <th align="center">{{ $pago_efectivo_fact->valor }}</th>
          </tr>
        </tbody>
        <?php $totefectivofact = $totefectivofact + $pago_efectivo_fact->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="5" align="center"><strong><h4>Total Forma de Pago Efectivo Factura $ {{ $totefectivofact }} </h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_bancoestado == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
          <tr class="info">
            <th colspan="2">Forma de Pago</th>
            <th colspan="6"><strong>Cheques Banco Estado al día</strong></th>
          </tr>
          <tr class="info">
            <th width="10%" align="center"><strong>Nro Doc</strong></th>
            <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
            <th width="12%" align="center"><strong>T Doc</strong></th>
            <th width="10%" align="center"><strong>Cliente</strong></th>
            <th width="26%" align="center"><strong>Descripción</strong></th>
            <th width="10%" align="center"><strong>Doc</strong></th>
            <th width="12%" align="center"><strong>Tipo</strong></th>
            <th width="10%" align="center"><strong>Valor</strong></th>
          </tr>
        </thead>
      @foreach($pagos_bancoestado as $pago_bancoestado)
        @if($pago_bancoestado->fecha == $pago_bancoestado->fecha_vencimiento)
          <tbody>
            <tr>
              <th align="center">{{ $pago_bancoestado->documento }}</th>
              <th align="center">{{ $pago_bancoestado->ndocumento }}</th>
              <th align="center">{{ $pago_bancoestado->movimiento_venta->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->contrato_id }}</th>
              <th align="center">{{ $pago_bancoestado->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->nro_documento }}</th>
              <th align="center">{{ $pago_bancoestado->forma_pago->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->valor }}</th>
            </tr>
          </tbody>
          <?php 
            $totbancoestadodia = $totbancoestadodia + $pago_bancoestado->valor; 
            $cuentaboletas++;
          ?>
        @endif
      @endforeach
      <tr class="success"> 
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago Efectivo $ {{ $totbancoestadodia }} </h4></strong></td>
      </tr>
    </table>

    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="4">Forma de Pago</th>
          <th colspan="4"><strong>Cheques Banco Estado a fecha</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_bancoestado as $pago_bancoestado)
        @if($pago_bancoestado->fecha != $pago_bancoestado->fecha_vencimiento)
          <tbody>
            <tr>
              <th align="center">{{ $pago_bancoestado->documento }}</th>
              <th align="center">{{ $pago_bancoestado->ndocumento }}</th>
              <th align="center">{{ $pago_bancoestado->movimiento_venta->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->contrato_id }}</th>
              <th align="center">{{ $pago_bancoestado->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->nro_documento }}</th>
              <th align="center">{{ $pago_bancoestado->forma_pago->descripcion }}</th>
              <th align="center">{{ $pago_bancoestado->valor }}</th>
            </tr>
          </tbody>
          <?php 
            $totbancoestadofecha = $totbancoestadofecha + $pago_bancoestado->valor; 
            $cuentaboletas++;
          ?>
        @endif
      @endforeach
      <tr class="success">
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago Efectivo $ {{ $totbancoestadofecha }} </h4></strong></td>
      </tr>
    </table>

  @endif

  @if($pago_bancoestado_dia_factura == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Banco Estado al día Factura</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_bancoestado_al_dia_factura as $pago_bancoestado_al_dia_factura)
        <tbody>
          <tr>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->documento }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->contrato_id }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->descripcion }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->nro_documento }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_bancoestado_al_dia_factura->valor }}</th>
          </tr>
        </tbody>
        <?php $totbancoestadodiafact = $totbancoestadodiafact + $pago_bancoestado_al_dia_factura->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Cheques Banco Estado al día $ {{ $totbancoestadodiafact }} </h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_serviestado == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="4">Forma de Pago</th>
          <th colspan="4"><strong>ServiEstado</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_serviestado as $pago_serviestado)
        <tbody>
          <tr>
            <th align="center">{{ $pago_serviestado->documento }}</th>
            <th align="center">{{ $pago_serviestado->ndocumento }}</th>
            <th align="center">{{ $pago_serviestado->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_serviestado->contrato_id }}</th>
            <th align="center">{{ $pago_serviestado->descripcion }}</th>
            <th align="center">{{ $pago_serviestado->nro_documento }}</th>
            <th align="center">{{ $pago_serviestado->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_serviestado->valor }}</th>
          </tr>
        </tbody>
        <?php 
          $totserviestado = $totserviestado + $pago_serviestado->valor; 
          $cuentaboletas++;
        ?>
      @endforeach
      <tr class="success">
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago ServiEstado $ {{ $totserviestado }} </h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_serviestado_fact == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>ServiEstado Factura</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_serviestado_factura as $pago_serviestado_factura)
        <tbody>
          <tr>
            <th align="center">{{ $pago_serviestado_factura->documento }}</th>
            <th align="center">{{ $pago_serviestado_factura->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_serviestado_factura->contrato_id }}</th>
            <th align="center">{{ $pago_serviestado_factura->descripcion }}</th>
            <th align="center">{{ $pago_serviestado_factura->nro_documento }}</th>
            <th align="center">{{ $pago_serviestado_factura->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_serviestado_factura->valor }}</th>
          </tr>
        </tbody>
        <?php $totserviestadofact = $totserviestadofact + $pago_serviestado_factura->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago ServiEstado $ {{ $totserviestadofact }} </h4></strong></td>
      </tr>
    </table>
  @endif


   @if($pago_otro_banco == true)   
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Otros Bancos al día</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_otros_bancos as $pago_otros_bancos)
        @if($pago_otros_bancos->fecha == $pago_otros_bancos->fecha_vencimiento)
          <tbody>
            <tr>
              <th align="center">{{ $pago_otros_bancos->documento }}</th>
              <th align="center">{{ $pago_otros_bancos->movimiento_venta->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->contrato_id }}</th>
              <th align="center">{{ $pago_otros_bancos->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->nro_documento }}</th>
              <th align="center">{{ $pago_otros_bancos->forma_pago->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->valor }}</th>
            </tr>
          </tbody>
          <?php 
            $tototrobancodia = $tototrobancodia + $pago_otros_bancos->valor; 
            $cuentaboletas++;
          ?>
        @endif
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago Otros Bancos al día $ {{ $tototrobancodia }} </h4></strong></td>
      </tr>
    </table>

    <br>

    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Otros Bancos a fecha</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_otros_bancos as $pago_otros_bancos)
        @if($pago_otros_bancos->fecha != $pago_otros_bancos->fecha_vencimiento)
          <tbody>
            <tr>
              <th align="center">{{ $pago_otros_bancos->documento }}</th>
              <th align="center">{{ $pago_otros_bancos->movimiento_venta->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->contrato_id }}</th>
              <th align="center">{{ $pago_otros_bancos->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->nro_documento }}</th>
              <th align="center">{{ $pago_otros_bancos->forma_pago->descripcion }}</th>
              <th align="center">{{ $pago_otros_bancos->valor }}</th>
            </tr>
          </tbody>
          <?php 
            $tototrobancofecha = $tototrobancofecha + $pago_otros_bancos->valor; 
            $cuentaboletas++;
          ?>
        @endif
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago Otros Bancos a fecha $ {{ $tototrobancofecha }} </h4></strong></td>
      </tr>
    </table>

  @endif


  @if($pago_otro_banco_factura == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Otros Cheques al día Factura</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Banco</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_otros_bancos_factura as $pago_otros_bancos_factura)
        <tbody>
          <tr>
            <th align="center">{{ $pago_otros_bancos_factura->documento }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->contrato_id }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->descripcion }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->nro_documento }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_otros_bancos_factura->valor }}</th>
          </tr>
        </tbody>
        <?php $tototrobancofactura = $tototrobancofactura + $pago_otros_bancos_factura->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago Otros Cheques Factura $ {{ $tototrobancofactura }}</h4></strong></td>
      </tr>
    </table>
  @endif


   @if($pago_pac == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="5"><strong>PAC</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Cod Aut</strong></th>
          <th width="12%" align="center"><strong>Vencimiento</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_pacs as $pago_pacs)
        <tbody>
          <tr>
            <th align="center">{{ $pago_pacs->documento }}</th>
            <th align="center">{{ $pago_pacs->ndocumento }}</th>
            <th align="center">{{ $pago_pacs->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_pacs->contrato_id }}</th>
            <th align="center">{{ $pago_pacs->descripcion }}</th>
            <th align="center">{{ $pago_pacs->nro_documento }}</th>
            <th align="center">{{ $pago_pacs->fecha_vencimiento }}</th>
            <th align="center">{{ $pago_pacs->valor }}</th>
          </tr>
        </tbody>
        <?php 
          $totopac = $totopac + $pago_pacs->valor; 
          $cuentaboletas++;
        ?>
      @endforeach
      <tr class="success">
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago PAC $ {{ $totopac }}</h4> </strong></td>
      </tr>
    </table>
  @endif

  @if($pago_pac_fact == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>PAC FACTURA</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Cod Aut</strong></th>
          <th width="12%" align="center"><strong>Vencimiento</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_pacs_facturas as $pago_pac_factura)
        <tbody>
          <tr>
            <th align="center">{{ $pago_pac_factura->documento }}</th>
            <th align="center">{{ $pago_pac_factura->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_pac_factura->contrato_id }}</th>
            <th align="center">{{ $pago_pac_factura->descripcion }}</th>
            <th align="center">{{ $pago_pac_factura->nro_documento }}</th>
            <th align="center">{{ $pago_pac_factura->fecha_vencimiento }}</th>
            <th align="center">{{ $pago_pac_factura->valor }}</th>
          </tr>
        </tbody>
        <?php $totpacfactura = $totpacfactura + $pago_pac_factura->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago PAC FACTURA $ {{ $totpacfactura }} </h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_pat == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="5"><strong>PAT</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Cod Aut</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_pats as $pago_pat)
        <tbody>
          <tr>
            <th align="center">{{ $pago_pat->documento }}</th>
            <th align="center">{{ $pago_pat->ndocumento }}</th>
            <th align="center">{{ $pago_pat->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_pat->contrato_id }}</th>
            <th align="center">{{ $pago_pat->descripcion }}</th>
            <th align="center">{{ $pago_pat->nro_documento }}</th>
            <th align="center">{{ $pago_pat->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_pat->valor }}</th>
          </tr>
        </tbody>
        <?php 
          $totpat = $totpat + $pago_pat->valor; 
          $cuentaboletas++;
        ?>
      @endforeach
      <tr class="success">
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago PAC $ {{ $totpat }}</h4></strong></td>
      </tr>
    </table>
  @endif

   @if($pago_factura_canje == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Facturas de Canje</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Cod Aut</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_facturas_canjes as $pago_factura_canje)
        <tbody>
          <tr>
            <th align="center">{{ $pago_factura_canje->documento }}</th>
            <th align="center">{{ $pago_factura_canje->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_factura_canje->contrato_id }}</th>
            <th align="center">{{ $pago_factura_canje->descripcion }}</th>
            <th align="center">{{ $pago_factura_canje->nro_documento }}</th>
            <th align="center">{{ $pago_factura_canje->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_factura_canje->valor }}</th>
          </tr>
        </tbody>
        <?php $totfactcanje = $totfactcanje + $pago_factura_canje->valor ?>
      @endforeach
      <tr class="success">
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago Factura de Canje $ {{ $totfactcanje }}</h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_unired == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="4">Forma de Pago</th>
          <th colspan="4"><strong>Unired</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="10%" align="center"><strong>Nro Fiscal</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_unired as $pago_unired)
        <tbody>
          <tr>
            <th align="center">{{ $pago_unired->documento }}</th>
            <th align="center">{{ $pago_unired->ndocumento }}</th>
            <th align="center">{{ $pago_unired->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_unired->contrato_id }}</th>
            <th align="center">{{ $pago_unired->descripcion }}</th>
            <th align="center">{{ $pago_unired->nro_documento }}</th>
            <th align="center">{{ $pago_unired->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_unired->valor }}</th>
          </tr>
        </tbody>
        <?php 
          $totunired = $totunired + $pago_unired->valor;
          $cuentaboletas++;
        ?>
      @endforeach
      <tr class="success">
        <td colspan="8" align="center"><strong><h4>Total Forma de Pago Unired $ {{ $totunired }}</h4></strong></td>
      </tr>
    </table>
  @endif


  @if($pago_unired_fact == true)
    <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="info">
          <th colspan="3">Forma de Pago</th>
          <th colspan="4"><strong>Unired Factura</strong></th>
        </tr>
        <tr class="info">
          <th width="10%" align="center"><strong>Nro Doc</strong></th>
          <th width="12%" align="center"><strong>T Doc</strong></th>
          <th width="10%" align="center"><strong>Cliente</strong></th>
          <th width="26%" align="center"><strong>Descripción</strong></th>
          <th width="10%" align="center"><strong>Doc</strong></th>
          <th width="12%" align="center"><strong>Tipo</strong></th>
          <th width="10%" align="center"><strong>Valor</strong></th>
        </tr>
      </thead>
      @foreach($pagos_unired_factura as $pago_unired_factura)
        <tbody>
          <tr>
            <th align="center">{{ $pago_unired_factura->documento }}</th>
            <th align="center">{{ $pago_unired_factura->movimiento_venta->descripcion }}</th>
            <th align="center">{{ $pago_unired_factura->contrato_id }}</th>
            <th align="center">{{ $pago_unired_factura->descripcion }}</th>
            <th align="center">{{ $pago_unired_factura->nro_documento }}</th>
            <th align="center">{{ $pago_unired_factura->forma_pago->descripcion }}</th>
            <th align="center">{{ $pago_unired_factura->valor }}</th>
          </tr>
         </tbody> 
        <?php $totuniredfact = $totuniredfact + $pago_unired_factura->valor ?>
      @endforeach
      <tr class="success"> 
        <td colspan="7" align="center"><strong><h4>Total Forma de Pago Unired $ {{ $totuniredfact }}</h4></strong></td>
      </tr>
    </table>
  @endif

  <?php 

  $totalcaja = $totefectivo + $totefectivofact+$totbancoestadodia+$totbancoestadofecha+$totbancoestadodiafact+$totserviestado+$totserviestadofact+$tototrobancodia+$tototrobancofecha+$tototrobancofactura+$totopac+$totpacfactura+$totpat+$totfactcanje+$totunired+$totuniredfact;
  $totfact = $totefectivofact+$totbancoestadodiafact+$totserviestadofact+$tototrobancofactura+$totuniredfact+$totfactcanje;
  $monto_boletas = $totalcaja - $totfact;
  $arqueo = $totalcaja - $totfactcanje;

  $salto_boleta = (($ultima_boleta->ultimaboleta - $primera_boleta->primeraboleta) +1 );
  if($salto_boleta == $cuentaboletas){
    $salto = "NO";
  }
  else{
    $salto = "SI";
  }

  ?>

  @if($haynulas == true)
      @foreach($boletas_nulas as $boleta_nula)
        <?php 
          $totnula = $totnula + $boleta_nula->valor;
          $cuentanulas++; 
        ?>
      @endforeach
    @endif

   <br>
    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="success">
          <td colspan="8" align="center">
            <strong><h4>TOTAL CAJA ${{ $totalcaja }}</h4></strong>
          </td>
        </tr>
      </thead>
    </table>

    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO BOLETAS ${{ $monto_boletas }}</h5></strong>
          </td>
          <td colspan="4">
            <strong><h5>MONTO ARQUERO ${{ $arqueo }}</h5></strong>
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO FACTURAS ${{ $totfact }}</h5></strong>
          </td>
          <td colspan="4">
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO N:C ${{ $totnula }}</h5></strong>
          </td>
          <td colspan="4">
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO BOLETAS - N:C ${{ ($monto_boletas - $totnula) }}</h5></strong>
          </td>
          <td colspan="4">
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO EFECTIVO ${{ ($totefectivo + $totefectivofact) }}</h5></strong>
          </td>
          <td colspan="4">
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>MONTO CHEQUE ${{ ($totbancoestadodia+$totbancoestadofecha+$totserviestado+$tototrobancodia+$tototrobancofecha+$totopac+$totpat+$totunired) }}</h5></strong>
          </td>
          <td colspan="4">
          </td>
        </tr>
      </thead>
    </table>

    <table class="table table-bordered" width="100%">
      <thead>
        <tr class="success">
          <td colspan="4">
            <strong><h5>CANT BOLETAS VENTAS: {{ ($cuentaboletas - $cuentanulas ) }}</h5></strong>
          </td>
          <td colspan="2">      
              <strong><h5>DESDE {{ $primera_boleta->primeraboleta }} </h5></strong>
          </td>
          <td colspan="2">      
              <strong><h5>HASTA {{ $ultima_boleta->ultimaboleta }} </h5></strong>
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>CANT N.C: {{ ($cuentanulas ) }}</h5></strong>
          </td>
          <td colspan="2">  
            <strong><h5>SALTO DE BOLETA </h5></strong>    
          </td>
          <td colspan="2">  
            <strong><h5> {{ $salto }}  </h5></strong>    
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <strong><h5>CANT BOLETAS EMITIDAS: {{ ($cuentaboletas ) }}</h5></strong>
          </td>
          <td colspan="4">      
          </td>
        </tr>
      </thead>
    </table>

    @if($haynulas == true)
        <br>
        <table class="table table-bordered" width="100%">
          <thead>
            <tr class="info">
              <td colspan="4">
                <strong><h4>NOTAS DE CREDITO</h4></strong>
              </td>
            </tr>
            <tr class="info">
              <td colspan="1">
                <strong><h5>NRO FISCAL</h5></strong>
              </td>
              <td colspan="1">
                <strong><h5>FECHA</h5></strong>
              </td>
              <td colspan="1">
                <strong><h5>NRO NUBOX</h5></strong>
              </td>
              <td colspan="1">
                <strong><h5>MONTO</h5></strong>
              </td>
            </tr>
          </thead>
          @foreach($boletas_nulas as $boleta_nula)
            <tbody>
              <tr class="succes">
                <td> <strong> {{ $boleta_nula->ndocumento }}</strong> </td>
                <td> <strong> {{ $boleta_nula->fecha }}</strong> </td>
                <td> <strong> </strong> </td>
                <td> <strong> {{ $boleta_nula->valor }}</strong> </td>
              </tr>
            </tbody>
          @endforeach
      </table>
    @endif


    <br>
    <table class="table" width="100%">
            <tr>
              <td align="center">
                 ___________________________
              </td>
              <td align="center">
                 ___________________________
              </td>
            </tr>
            <tr>
              <td align="center">
                <strong><h4>CAJERO</h4></strong>
              </td>
              <td align="center">
                <strong><h4>TESORERIA</h4></strong>
              </td>
            </tr>
    </table>

@endsection
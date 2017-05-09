<div class="row">
<?php
    $valorneto = 0;
    $iva = 0;
    $total = 0;
?>

    @foreach($vtas_formas_pagos as $vta_fpago)
          
            <?php $valorneto = round(intval($vta_fpago->valor) / 1.19); ?>
            <?php $iva = round($valorneto * 0.19); ?>
            <?php $total = $valorneto + $iva;    ?>
            
    @endforeach


		 <div class="col-md-10">	

		 	<div class="panel panel-default">

		        <div class="panel-body">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="70%">
                            <img src="Imagenes/encabezadofact.jpg" width="495" height="150" />  
                            </td>
                            <td width="30%" align="center"><p><strong> COPIA FACTURA</strong></p>
                            <p><strong>RUT 77.123.870-k</strong></p>
                            <p><strong>FACTURA ELECTRONICA</strong></p>
                            <p><strong>N° {{ $venta->documento }}</strong></p>
                            </td>
                        </tr>	
                        <tr>
                            
                        </tr>
                    </table>

                    <table width="100%" border="2" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><strong>Señor(es)</strong></td>
                            <td>{{ $venta->contrato->cliente->nombres. " ".$venta->contrato->cliente->paterno. " ".$venta->contrato->cliente->materno }}</td>
                            <td><strong>RUT</strong></td>
                            <td>{{ $venta->contrato->cliente->rut }}</td>
                        </tr>
                        <tr>
                            <td><strong>Giro</strong></td>
                            <td>{{ $venta->contrato->cliente->giro }}</td>
                            <td><strong>Fecha Emisión</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Dirección</strong></td>
                            <td>{{ $venta->contrato->direccion->calle->calle. " ".$venta->contrato->direccion->numero. ", "
      							  		.$venta->contrato->direccion->calle->poblacion->poblacion }}
                            </td>
                            <td><strong>Comuna</strong></td>
                            <td>{{ $venta->contrato->direccion->calle->poblacion->sector->comuna->comuna }}</td>
                        </tr>
                        <tr>
                            <td><strong>Contacto</strong></td>
                            <td>FONO {{ $venta->contrato->cliente->telefono1 }}, CLIENTE {{ $venta->contrato_id  }}</td>
                            <td><strong>Vendedor</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Fecha Vencimiento</strong></td>
                            <td colspan="3">
                                {{ $venta->fecha }}
                            </td>
                        </tr>
                    </table>
                        <br />

                    <table width="100%" border="2" cellpadding="0" cellspacing="0">
                        <tr>
                            <th colspan="6" scope="col">DETALLE</th>
                        </tr>
                        <tr>
                            <td align="center"><strong><em>Código</em></strong></td>
                            <td align="center"><strong><em>Descripción</em></strong></td>
                            <td align="center"><strong><em>Cantidad</em></strong></td>
                            <td align="center"><strong><em>Precio Unitario</em></strong></td>
                            <td align="center"><strong><em>Ind</em></strong></td>
                            <td align="center"><strong><em>Total</em></strong></td>
                        </tr>
                            <?php
                            $subt = 0;
                            ?>
                             @foreach($vtas_detalles as $vta_detalle)
                                <?php $subt = $subt + $vta_detalle->valor_final ?>
                                 <tr>
                                    <td>1</td>
                                    <td>{{ $vta_detalle->descripcion }}</td>
                                    <td>1</td>
                                    <td align="right">
                                        {{ $valorneto }}
                                    </td>
                                    <td>AF</td>
                                    <td align="right">
                                         {{ $valorneto }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"><br />
                                    <br /><br /><br /><br /><br /><br /><br />&nbsp;
                                    </td>
                                </tr>
                             @endforeach
                            
                       
                 </table>

                 <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="200">
                        </td>
                        <td width="625" align="center">
                            <table width="55%" height="207" border="1" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th colspan="2" scope="col">TOTALES</th>
                                    </tr>
                                <tr>
                                    <td width="146" align="center" valign="bottom"><em>Monto Neto</em></td>
                                    <td width="130" align="right">{{ $valorneto }}</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="bottom"><em>19% IVA</em></td>
                                    <td align="right">{{ $iva }}</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="bottom"><em>Total</em></td>
                                    <td align="right">{{ $total }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>	
                </table>   

                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="200">
                        </td>
                        <td width="440" align="center">
                            <table width="100%" height="207" border="1" cellpadding="0" cellspacing="0">
                                <tr>
                                    <img src="Imagenes/pie.jpg" width="350" height="220" />
                                </tr>
                            </table>

                        </td>
                    </tr>	
                </table>       

                </div>
            </div>
         </div>
</div>                
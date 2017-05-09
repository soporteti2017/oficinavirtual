<div class="row">
		 <div class="col-md-10">	

		 	<div class="panel panel-default">

		        <div class="panel-body">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="70%">
                            <img src="Imagenes/CCLtda.jpg" width="495" height="150" />  
                            </td>
                            @if($venta->movimiento_venta_id == 91)
                                <td width="30%" align="center"><p><strong> DATOS FACTURA</strong></p>
                                <p><strong>N° {{ $venta->documento }}</strong></p>
                                <p><strong>FECHA {{ $venta->fecha }}</strong></p>
                                </td>
                            @else
                                <td width="30%" align="center"><p><strong> DUPLICADO BOLETA</strong></p>
                                <p><strong>N° {{ $venta->documento }}</strong></p>
                                <p><strong>FECHA {{ $venta->fecha }}</strong></p>
                                </td>
                            @endif
                        </tr>	
                        <tr>
                            
                        </tr>
                    </table>
                    @if($venta->nula == 0)
                        <table width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <td><strong>Señor(es)</strong></td>
                                <td colspan="2">{{ $venta->contrato->cliente->nombres. " ".$venta->contrato->cliente->paterno. " ".$venta->contrato->cliente->materno }}</td>
                                <td><strong>RUT</strong></td>
                                <td colspan="2">{{ $venta->contrato->cliente->rut }}</td>
                            </tr>
                            <tr>
                                <td><strong>Dirección</strong></td>
                                <td colspan="2">{{ $venta->contrato->direccion->calle->calle. " ".$venta->contrato->direccion->numero }}
                                </td>
                                <td><strong>Villa/Pob.</strong></td>
                                <td colspan="2">{{ $venta->contrato->direccion->calle->poblacion->poblacion }}</td>
                            </tr>
                            <tr>
                                <td><strong>Ciudad</strong></td>
                                <td>{{ $venta->contrato->direccion->calle->poblacion->sector->comuna->comuna }}
                                </td>
                                <td><strong>Contrato</strong></td>
                                <td align="center">{{ $venta->contrato->correlativo_manual }}</td>
                                <td><strong>Abonado</strong></td>
                                <td align="center">{{ $venta->contrato_id }}</td>
                            </tr>
                        </table> 
                        <br>

                        <table width="100%" border="2" cellpadding="0" cellspacing="0">
                        <tr>
                            <th colspan="8" scope="col">CONCETPO</th>
                        </tr>
                        <tr>
                            <td align="center" colspan="2"><strong><em>LINEA</em></strong></td>
                            <td align="center" colspan="2"><strong><em>PRODUCTO</em></strong></td>
                            <td align="center" colspan="2"><strong><em>DESCRIPCIÓN</em></strong></td>
                            <td align="center" colspan="2"><strong><em>TOTAL</em></strong></td>
                        </tr>
                             <?php $cont=1 ?>
                             @foreach($vtas_detalles as $vta_detalle)
                                 <tr>
                                    <td colspan="2">{{ $cont }}</td>
                                    <td colspan="2">{{ $vta_detalle->producto }}</td>
                                    <td colspan="2">{{ $vta_detalle->descripcion }}</td>
                                    <td align="right" colspan="2">
                                         {{ $vta_detalle->valor_final }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8"><br />
                                    <br /><br /><br /><br /><br /><br /><br />&nbsp;
                                    </td>
                                </tr>
                                 <?php $cont++ ?>
                             @endforeach
                            
                       
                         </table>
                        <table width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="6">
                                        <strong>
                                            <em>
                                                <?php $total = 0; ?>
                                                @foreach($vtas_formas_pagos as $vta_fpago)
                                                    {{ $vta_fpago->forma_pago->descripcion. 
                                                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
                                                    .$vta_fpago->valor }}
                                                    <?php $total = $total + $vta_fpago->valor ?>
                                                @endforeach
                                            </em>
                                        </strong>
                                 </td>    
                            </tr>
                        </table>   

                        <table width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr>
                                <td><strong>CAJERO</strong></td>
                                <td>{{ $venta->usuario->nombre }}</td>
                                <td><strong>HORA</strong></td>
                                <td>{{ $venta->hora }}</td>
                                <td><strong>TOTAL</strong></td>
                                <td align="center">{{ $total }}</td>
                            </tr>
                        </table>
                    @else
                        <br>
                        <h3> Boleta Nula </h3>    
                    @endif

                </div>
            </div>
         </div>
</div>                
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ordene de trabajo</title>
    <style type="text/css" media="all">
        td {
        border:hidden;
        }

        table {
        border: 1px solid #000000;
        border-spacing:  0px;
        }
    </style>
</head>
<body>
<div class="row">
		 <div class="col-md-10">	
		 	<div class="panel panel-default">

		        <div class="panel-body">

                    <center><h3> ORDEN DE TRABAJO {{ $orden_trabajo->id }}</h3></center> 
		        	<hr>

                    <table width="100%" border="0">
                        <tr>
                            <td><strong>Número OT:</strong></td>
                            <td width="32%">{{ $orden_trabajo->id }}</td>
                            <td width="23%"><strong>Servicio:</strong></td>
                            <td width="23%">{{ $orden_trabajo->tipo_ot->servdist->servicio }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo OT:</strong></td>
                            <td width="32%">{{ $orden_trabajo->tipo_ot->nombre }}</td>
                            <td width="23%"><strong>Fecha Apertura:</strong></td>
                            <td width="23%">{{ $orden_trabajo->fecha_recepcion }}</td>
                        </tr>
                        <tr>
                            <td><strong>Recepcionista:</strong></td>
                            <td>{{ $orden_trabajo->usuario->nombre }}</td>
                            <td><strong>Fecha Cierre:</strong></td>
                            <td>
                                @if($orden_trabajo->ots_cierres->count() > 0)
                                    {{ $orden_trabajo->ots_cierres[0]->fecha }}
                                @endif
                            </td>
                        </tr>
                    </table>


                    <table width="100%" border="0">
                        <tr>
                            <td colspan="6" align="center">
                                <strong>
                                    <h4>
                                        DATOS DEL CLIENTE {{ $orden_trabajo->contrato_id. " // Ficha " }}
                                         @if($orden_trabajo->fichas->count() > 0)
                                            {{ $orden_trabajo->fichas[0]->id }} 
                                         @endif
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><strong>Nombre:</strong></td>
                            <td width="45%">
                                {{ $orden_trabajo->contrato->cliente->nombres. " " .$orden_trabajo->contrato->cliente->paterno. " ".$orden_trabajo->contrato->cliente->materno }}
                            </td>
                            <td width="15%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td width="16%"><strong>Dirección:</strong></td>
                            <td width="20%">{{ $orden_trabajo->contrato->direccion->calle->calle }}</td>
                            <td width="16%"><strong>Número:</strong></td>
                            <td width="16%">{{ $orden_trabajo->contrato->direccion->numero }}</td>
                            <td width="16%"><strong>Depto:</strong></td>
                            <td width="16%">{{ $orden_trabajo->contrato->direccion->depto_casa }}</td>
                        </tr>
                        <tr>
                            <td width="16%"><strong>Sector:</strong></td>
                            <td width="16%">{{ $orden_trabajo->contrato->direccion->calle->poblacion->poblacion }}</td>
                            <td width="16%"><strong>Comuna:</strong></td>
                            <td width="16%">{{ $orden_trabajo->contrato->direccion->calle->poblacion->sector->comuna->comuna }}</td>
                            <td width="16%"><strong>Fono:</strong></td>
                            <td width="16%">{{ $orden_trabajo->contrato->cliente->telefono1 }}</td>
                        </tr>
                    </table>
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="4" align="center">
                                <strong>
                                    <h4>
                                       SERVICIOS ADICIONALES CONTRATADOS 
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Bocas adicionales:</strong></td>
                            <td width="30%">{{ $boc_adic }}</td>
                            <td width="25%"><strong>Servicio Premium:</strong></td>
                            <td width="30%">{{ $stb }}</td>
                        </tr>
                    </table>
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="4" align="center">
                                <strong>
                                    <h4>
                                       SERVICIOS 
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="60%"><strong>DESCRIPCIÓN</strong></td>
                            <td width="20%" align="center"><strong>CANTIDAD</strong></td>
                            <td width="20%" align="center"><strong>VALOR</strong></td>
                        </tr>
                            <tr>
                                @if($orden_trabajo->ordenes_trabajos_detalles->count() > 0)
                                    <td width="60%">{{ $orden_trabajo->ordenes_trabajos_detalles[0]->servicio->descripcion }}</td>
                                    <td width="20%" align="center">{{ $orden_trabajo->ordenes_trabajos_detalles[0]->cantidad }}</td>
                                    <td width="20%" align="center">{{ $orden_trabajo->ordenes_trabajos_detalles[0]->servicio->valor }}</td>
                                @endif
                            </tr>
                    </table>
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="4" align="center">
                                <strong>
                                    <h4>
                                       CHECKLIST {{ $cm_cliente->cmmac->cm. " / " .$cm_cliente->cmmac->marmocm->modelo. " ".$cm_cliente->cmmac->marmocm->marca }}
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <strong>
                                    <h4>
                                       OFICINA 
                                    </h4>
                                </strong>
                            </td>
                            <td colspan="2" align="center">
                                <strong>
                                    <h4>
                                       DOMICILIO 
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                Power Test
                            </td>
                            <td colspan="2" align="center">
                                Power Test
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                WWW Test
                            </td>
                            <td colspan="2" align="center">
                                WWW Test
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                Wifi Test
                            </td>
                            <td colspan="2" align="center">
                                Clave Wifi: {{ $cm_cliente->clavewifi }}
                            </td>
                        </tr>
                    </table>
                    
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="4" align="center">
                                <strong>
                                    <h4>
                                       DETALLE DE EQUIPAMIENTO EN ARRIENDO 
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="70%"><strong>DESCRIPCIÓN</strong></td>
                            <td width="10%" align="center"><strong>CANTIDAD</strong></td>
                            <td width="20%" align="center"><strong>SERIE</strong></td>
                        </tr>
                            <tr>
                                <td width="70%">
                                    {{ "Cable Modem, Transformador 12 V/220V, " .$split }}
                                </td>
                                <td width="10%" align="center">1</td>
                                <td width="20%" align="center">{{ $cm_cliente->cmmac_id }}</td>
                            </tr>
                    </table>

                    <table width="100%" border="0">
                        <tr>
                            <td colspan="6" align="center">
                                <strong>
                                    <h4>
                                        EJECUCION Y RECEPCION DEL TRABAJO
                                    </h4>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><strong>Técnico:</strong></td>
                            <td width="65%">
                                 @if($orden_trabajo->ots_ingresos->count() > 0)
                                    {{ $orden_trabajo->ots_ingresos[0]->usuario->nombre }}
                                 @endif
                            </td>
                            <td width="50%"><strong>Nula:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->nula == 0)
                                    {{ "NO" }}
                                @else
                                    {{ "SI" }}    
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><strong>Fecha:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_ingresos->count() > 0)
                                    {{ $orden_trabajo->ots_ingresos[0]->fecha }}
                                @endif
                            </td>
                            <td width="50%"><strong>Hora Entrega:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_ingresos->count() > 0)
                                    {{ $orden_trabajo->ots_ingresos[0]->hora }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><strong>Fecha Término:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_cierres->count() > 0)
                                    {{ $orden_trabajo->ots_cierres[0]->fecha }}
                                @endif
                            </td>
                            <td width="50%"><strong>Hora Término:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_cierres->count() > 0)
                                    {{ $orden_trabajo->ots_cierres[0]->hora }}
                                @endif
                            </td>
                        </tr>
                        <br>
                        <table width="100%" border="0">
                            <tr>
                                <td width="20%" align="center">
                                    <strong>
                                        <h4>
                                            OBSERVACION:
                                        </h4>
                                    </strong>
                                </td>
                                <td width="80%" align="center">
                                    ______________________________________________________________
                            
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="center">
                                </td>
                                <td width="80%" align="center">
                                    _______________________________________________________________
                                </td>
                            </tr>
                        </table>
                    </table>
                    <table width="100%" border="0">
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>     
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>    
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>
                        <tr>
                            <td width="35%"><strong>FIRMA:</strong></td>
                            <td width="65%" align="center">____________________</td>
                        </tr>
                        <tr>
                            <td width="35%"></td>
                            <td width="65%"></td>
                        </tr>
                        <tr>
                            <td width="35%"><strong></strong></td>
                            <td width="65%" align="center">FIRMA Y RUT CLIENTE</td>
                        </tr>
                    </table>

                </div>
            </div>
         </div>
</div>

</body>
</html>
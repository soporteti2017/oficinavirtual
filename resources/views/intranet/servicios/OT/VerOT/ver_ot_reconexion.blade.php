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

                    <center><h2> ORDEN DE TRABAJO {{ $orden_trabajo->id }}</h2></center> 
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
                    <br>

                    <table width="100%" border="0">
                        <tr>
                            <td colspan="6" align="center">
                                <strong>
                                    <h3>
                                        DATOS DEL CLIENTE {{ $orden_trabajo->contrato_id. " // Ficha " }} 
                                        @if($orden_trabajo->fichas->count() > 0)
                                            {{ $orden_trabajo->fichas[0]->id }} 
                                        @endif
                                    </h3>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><strong>Nombre:</strong></td>
                            <td width="35%">
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

                    <br>

                    <table width="100%" border="0">
                        <tr>
                            <td colspan="6" align="center">
                                <strong>
                                    <h3>
                                       SERVICIOS CONTRATADOS 
                                    </h3>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Tipo plan de Cable:</strong></td>
                            <td width="30%">{{ $orden_trabajo->contrato->plan->descripcion }}</td>
                            <td width="25%"><strong>Bocas adicionales:</strong></td>
                            <td width="30%">{{ $boc_adic }}</td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Serv. Premium (serie):</strong></td>
                            <td width="30%">{{ $stb }}</td>
                            @if($inet == "SI")
                                <td width="25%"><strong>Serv. B.A (CM/PLAN):</strong></td>
                                <td width="30%">{{ $cm_cliente->cmmac->cm. " / " .$contrato_plan->servinet_id }}</td>
                            @else
                                <td width="25%"><strong>Serv. B.A (CM/PLAN):</strong></td>
                                <td width="30%">{{ $inet }}</td>
                            @endif
                        </tr>
                    </table>

                    
                    @if($stb <> "NO")
                        <br>
                        <table width="100%" border="0">
                            <tr>
                                <td colspan="6" align="center">
                                    <strong>
                                        <h3>
                                        CANALES PREMIUM CONTRATADOS
                                        </h3>
                                    </strong>
                                </td>
                            </tr>
                            @foreach($contratospremiums as $contratopremium)
                            <tr>
                                <td width="100%">
                                    <ul class="list-group">
                                        <li class="list-group-item"> {{ $contratopremium->servicio->descripcion }}</li>
                                    </ul>      
                                </td>  
                            </tr>
                            @endforeach
                        </table>
                    @endif

                    <br>
                    <table width="100%" border="0">
                            <tr>
                                <td align="center">
                                    <strong>
                                        <h3>
                                        TRABAJO A REALIZAR
                                        </h3>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td width="100%">
                                       <strong>
                                            @if($orden_trabajo->ordenes_trabajos_detalles->count() > 0)
                                                {{  $orden_trabajo->ordenes_trabajos_detalles[0]->servicio->descripcion }} 
                                            @endif
                                        </strong>
                                </td>  
                            </tr>
                    </table>
                    
                    <br>

                    <table width="100%" border="0">
                        <tr>
                            <td colspan="6" align="center">
                                <strong>
                                    <h3>
                                        EJECUCION Y RECEPCION DEL TRABAJO
                                    </h3>
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

                    <br>
                    <table width="100%" border="0">
                        <tr>
                            <td><strong>Última Descon.:</strong></td>
                            <td width="32%"></td>
                            <td width="23%"><strong>Realizada por:</strong></td>
                            <td width="23%"></td>
                        </tr>
                    </table>

                </div>
            </div>
         </div>
</div>

</body>
</html>
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
        }
    </style>
</head>
<body>
<div class="row">
		 <div class="col-md-10">	
		 	<div class="panel panel-default">

		        <div class="panel-body">

                    <center><h1> ORDEN DE TRABAJO {{ $orden_trabajo->id }}</h1></center> 
		        	<hr><br>

                    <table width="100%" border="0">
                        <tr>
                            <td width="22%"><strong>Número OT:</strong></td>
                            <td colspan="3">{{ $orden_trabajo->id }}</td>
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
                            <td colspan="4"><strong><h3>DATOS DEL CLIENTE</h3></strong</td>
                        </tr>
                        <tr>
                            <td width="15%"><strong>Nombre:</strong></td>
                            <td width="35%">
                                {{ $orden_trabajo->contrato->cliente->nombres. " " .$orden_trabajo->contrato->cliente->paterno. " ".$orden_trabajo->contrato->cliente->materno }}
                            </td>
                            <td width="15%"><strong>Cliente:</strong></td>
                            <td width="25%">{{ $orden_trabajo->contrato_id }}</td>
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
                            <td width="16%"><strong>Ficha:</strong></td>
                            <td width="16%">{{ $orden_trabajo->fichas[0]->id }}</td>
                        </tr>
                    </table>

                    <strong><h3>SERVICIOS</h3></strong>
                    <table width="100%" border="0">
                        <tr>
                            <td width="40%"><strong>DESCRIPCIÓN</strong></td>
                            <td width="20%" align="center"><strong>MAC</strong></td>
                            <td width="20%" align="center"><strong>PLAN</strong></td>
                            <td width="20%" align="center"><strong>CM</strong></td>
                        </tr>
                        @foreach($orden_trabajo->ordenes_trabajos_detalles as $orden_trabajo_detalle)
                            <tr>
                                <td width="40%">{{ $orden_trabajo_detalle->servicio->descripcion }}</td>
                                <td width="20%" align="center">{{ $cmmac->id }}</td>
                                <td width="20%" align="center">{{ $cmmac->servinet_id }}</td>
                                <td width="20%" align="center">{{ $cmmac->cm }}</td>
                            </tr>
                        @endforeach
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
                            <td width="25%"><strong>Técnico:</strong></td>
                            <td width="40%">
                                @if($orden_trabajo->ots_ingresos->count() > 0)
                                    {{ $orden_trabajo->ots_ingresos[0]->usuario->nombre }}
                                @endif
                            </td>
                            <td width="15%"><strong>Fecha:</strong></td>
                            <td width="20%">
                                @if($orden_trabajo->ots_ingresos->count() > 0)
                                    {{ $orden_trabajo->ots_ingresos[0]->fecha. " " .$orden_trabajo->ots_ingresos[0]->hora }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><strong>Nombre:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_asignas->count() > 0)
                                    {{ $orden_trabajo->ots_asignas[0]->usuario->nombre }}
                                @endif    
                            </td>
                            <td width="50%"><strong>Cierre:</strong></td>
                            <td width="50%">
                                @if($orden_trabajo->ots_cierres->count() > 0)
                                    {{ $orden_trabajo->ots_cierres[0]->fecha. " ".$orden_trabajo->ots_cierres[0]->hora }}
                                @endif</td>
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
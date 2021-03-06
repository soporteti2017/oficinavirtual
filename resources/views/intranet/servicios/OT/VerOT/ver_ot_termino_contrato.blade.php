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
                            <td width="16%">
                                @if($orden_trabajo->fichas->count() > 0)
                                    {{ $orden_trabajo->fichas[0]->id }}
                                @endif
                            </td>
                        </tr>
                    </table>

                    <strong><h3>SERVICIOS</h3></strong>
                    <table width="100%" border="0">
                        <tr>
                            <td width="60%"><strong>DESCRIPCIÓN</strong></td>
                            <td width="20%" align="center"><strong>CANTIDAD</strong></td>
                            <td width="20%" align="center"><strong>VALOR</strong></td>
                        </tr>
                        @foreach($orden_trabajo->ordenes_trabajos_detalles as $orden_trabajo_detalle)
                            <tr>
                                <td width="60%">{{ $orden_trabajo_detalle->servicio->descripcion }}</td>
                                <td width="20%" align="center">{{ $orden_trabajo_detalle->cantidad }}</td>
                                <td width="20%" align="center">{{ $orden_trabajo_detalle->servicio->valor }}</td>
                            </tr>
                        @endforeach
                    </table>

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
                                       <strong>Desconectar el primer día de {{ $contratos_terminos[0]->mes }} del {{ $contratos_terminos[0]->anio }} </strong>
                                </td>  
                            </tr>
                    </table>

                    <strong><h3>ASIGNACIÓN</h3></strong>
                    <table width="100%" border="0">
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
                    </table>

                    <strong><h3>EJECUCIÓN DEL TRABAJO</h3></strong>

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
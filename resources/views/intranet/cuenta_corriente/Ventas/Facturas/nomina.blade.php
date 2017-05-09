@extends('layouts.app')

@section('titulo', 'Rendición de Cajero')

@section('content')
<div class="row">
		 <div class="col-md-12">	
		 	<div class="panel panel-default">

		        <div class="panel-body">

                    <center><h1> NOMINA DE FACTURACION</h1></center> 
		        	<hr><br>

                            <table class="table table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>CLTE</th>
                                        <th>RUT</th>
                                        <th>CLIENTE</th>
                                        <th>DIRECCION</th>
                                        <th>DIRECCION DEL CONTRATO</th>
                                        <th>FONO</th>
                                        <th>GIRO</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                @foreach($clientes_facturas as $cliente_factura)
                                    <tbody>
                                        <tr>
                                            <td>{{ $cliente_factura->id }}</td>
                                            <td>{{ $cliente_factura->rut }}</td>
                                            <td>{{ $cliente_factura->nombres. " " .$cliente_factura->paterno. " " .$cliente_factura->materno }}</td>
                                            <td>{{ $cliente_factura->direccion_comercial }}</td>
                                            <td>{{ $cliente_factura->calle. " " .$cliente_factura->numero. " " .$cliente_factura->poblacion }}</td>
                                            <td>{{ $cliente_factura->telefono1 }}</td>
                                            <td>{{ $cliente_factura->giro }}</td>
                                            <td>{{ $cliente_factura->suma }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                        </table>
                </div>
            </div>
         </div>
</div>

@endsection
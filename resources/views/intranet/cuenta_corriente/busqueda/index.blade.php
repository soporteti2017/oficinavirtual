@extends('layouts.app')

@section('titulo', 'Búsquedas')

@section('content')

	<div class="row">

	    <div class="col-md-2">
	        <div class="panel panel-default">

		        <div class="panel-body">
		        	<div class="panel panel-default" id="sidebar" >
			            <div class="panel-heading" style="background-color:#207ce5;color:#fff;" data-target="#test">@yield('titulo')  | OficinaVirtual</div> 
			            	<div class="panel-body" id="test">
			            		@include('intranet/template/partials/nav-vertical')
			            	</div>	
			        </div>		
			    </div>    
		    </div>
		</div>
		 <div class="col-md-10">	

            {{-- BUSCADOR --}}
                                {!! Form::open(['route' => 'cuenta_corriente.busqueda', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
                                    <div class="input-group">
                                        {!! Form::text('cliente_direccion', null, ['class' => 'form-control', 'placeholder' => 'Buscar clientes...', 'aria-describedby' => 'search'])  !!}
                                        <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
                                        <span></span>
                                    </div>
                                {!! Form::close() !!}
                                <hr>
		                    {{-- FIN BUSCADOR --}}

                            <br>

		 	<div class="panel panel-default">
                <div class="panel panel-primary">
				  <div class="panel-heading"><strong>Búsqueda de clientes</strong> </div>
				  <div class="panel-body">
                        
                        <div class="table-responsive">
						  <table class="table table-striped">
						    <thead>
						    	<th> ID </th>
						    	<th> RUT </th>
						    	<th> NOMBRE </th>
                                <th> PATERNO </th>
                                <th> MATERNO </th>
						    	<th> CALLE </th>
						    	<th> NUMERO </th>
						    	<th> DEPTO/CASA </th>
                                <th> POBLACION </th>
                                <th> TELEFONO1 </th>
                                <th> TELEFONO2 </th>
                                <th> ESTADO CONEXION </th>
						    </thead>
						    <tbody>
						    	@foreach($clientes_direcciones as $cliente_direccion)
						    		<tr>
							    		<td> {{ $cliente_direccion->id }} </td>
							    		<td> {{ $cliente_direccion->rut }} </td>
							    		<td> {{ $cliente_direccion->nombres }} </td>
                                        <td> {{ $cliente_direccion->paterno }} </td>
                                        <td> {{ $cliente_direccion->materno }} </td>
							    		<td> {{ $cliente_direccion->calle }} </td>
                                        <td> {{ $cliente_direccion->numero }} </td>
                                        <td> {{ $cliente_direccion->depto_casa }} </td>
                                        <td> {{ $cliente_direccion->poblacion }} </td>
                                        <td> {{ $cliente_direccion->telefono1 }} </td>
                                        <td> {{ $cliente_direccion->telefono2 }} </td>
                                        <td> {{ $cliente_direccion->descripcion }} </td>
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
					  <br>
					  <center>
					  {{ $clientes_direcciones->render() }}
					  </center>

                  </div>
            </div>
		 		
		    </div>    	
    	</div>
	</div>

@endsection
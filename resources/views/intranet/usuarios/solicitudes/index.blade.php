@extends('layouts.app')

@section('titulo', 'Excepciones')

@section('content')

	<div class="row">

		 <div class="col-md-12">	

		 	<div class="panel panel-default">

		 		
		        		{{-- BUSCADOR --}}
		        			{!! Form::open(['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Buscar solicitud...', 'aria-describedby' => 'search'])  !!}
		        					 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
		        					<span></span>
		        				</div>
		        			{!! Form::close() !!}
		        			<hr>
		        		{{-- FIN BUSCADOR --}}

		        <div class="panel-body">
		        		<div class="table-responsive">
						  <table class="table table-striped">
						    <thead>
						    	<th> CODIGO </th>
						    	<th> FECHA </th>
						    	<th> USUARIO </th>
						    	<th> DETERMINA </th>
						    	<th> CLIENTE </th>
						    	<th> TIPO </th>
						    	<th> AUTORIZADO </th>
						    	<th> ESTADO </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($solicitudes as $solicitud)
						    		<tr>
							    		<td> {{ $solicitud->id }} </td>
							    		<td> {{ $solicitud->fecha }} </td>
							    		<td> {{ $solicitud->usuario->nombre }} </td>
							    		<td> {{ $solicitud->autoriza_solicitud->autoriza }} </td>
							    		<td> {{ $solicitud->contrato->cliente->nombres ." ".$solicitud->contrato->cliente->paterno." "
							    				.$solicitud->contrato->cliente->materno }} </td>
							    		<td> {{ $solicitud->tipo_solicitud->descripcion }} </td>
							    		<td> 
							    			@if($solicitud->autoriza_solicitud->leido == true)
							    				{{ "SI" }}
							    			@else
							    				{{ "NO" }}
							    			@endif 
							    		</td>
							    		<td> {{ $solicitud->autoriza_solicitud->estado_solicitud->descripcion }} </td>
							    		<td>
							    			<a href="{{ route('usuarios.solicitudes.versolicitudes', $solicitud->id) }}" class="btn btn-warning" target="_blank"> 
												<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
											 </a>
							    		</td>
							    	</tr>
							    @endforeach			
						    </tbody>
						  </table>
						</div>

					<br>
					  <center>
					 {{--  {{ $usuarios->render() }} --}}
					  </center>	
				</div>
			</div>	
		</div>
	</div>	
@endsection							    	
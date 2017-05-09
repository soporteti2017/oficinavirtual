@extends('layouts.app')

@section('titulo', 'Excepciones')

@section('content')

	<div class="row">

		 <div class="col-md-12">	

		 	<div class="panel panel-default">

		 		
		        		{{-- BUSCADOR --}}
		        			{!! Form::open(['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Buscar OT...', 'aria-describedby' => 'search'])  !!}
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
						    	<th> NUMERO OT </th>
						    	<th> FECHA CREACION </th>
						    	<th> TIPO OT </th>
						    	<th> CLIENTE </th>
						    	<th> NULA </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($odenes_trabajos as $ot)
						    		<tr>
							    		<td> {{ $ot->id }} </td>
							    		<td> {{ $ot->fecha_recepcion }} </td>
							    		<td> {{ $ot->tipo_ot->nombre }} </td>
							    		<td> {{ $ot->contrato_id }} </td>
							    		<td> 
							    			@if($ot->nula == 0)
							    				{{ "NO" }}
							    			@else
							    				{{ "SI" }}
							    			@endif 
							    		</td>
							    		<td>
							    			<a href="{{ route('servicios.OT.versolicitudes', $ot->id) }}" class="btn btn-warning" target="_blank"> 
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
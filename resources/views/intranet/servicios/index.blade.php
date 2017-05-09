@extends('layouts.app')

@section('titulo', 'Servicios')

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

		 	<div class="panel panel-default">

		 		
		        		{{-- BUSCADOR --}}
		        			{!! Form::open(['route' => 'servicios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar servicios...', 'aria-describedby' => 'search'])  !!}
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
						    	<th> ID </th>
						    	<th> DESCRIPCION </th>
						    	<th> VALOR $</th>
						    	<th> UNICA VEZ </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($servicios as $servicio)
						    		<tr>
						    			<td> {{ $servicio->id }} </td>
							    		<td> {{ $servicio->descripcion }} </td>
							    		<td> {{ $servicio->valor }} </td>
							    		<td> 
							    			@if($servicio->unica_vez == 1)
							    				<span class="label label-primary">SI</span>
							    			@else
							    				<span class="label label-success">NO</span>	
							    			@endif
							    		</td>
							    		<td>
							    			<a href="{{ route('servicios.destroy', $servicio->id) }}" onclick="return confirm('¿Seguro de desea eliminarlo?')" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  </a>
							    			<a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>  </a>
							    		</td>	
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
						  <center>
						  	<a href="{{ route('servicios.create') }}" class="btn btn-success"> Agregar Nuevo Servicio </a> <br>
						  </center>	
					  <br>
					  <center>
					  {{ $servicios->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
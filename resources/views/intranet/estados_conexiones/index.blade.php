@extends('layouts.app')

@section('titulo', 'Estados de conexiones')

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
		        			{!! Form::open(['route' => 'estados_conexiones.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar estados...', 'aria-describedby' => 'search'])  !!}
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
						    	<th> DESCRIPCION </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($estados_conexiones as $estado_conexion)
						    		<tr>
							    		<td> {{ $estado_conexion->descripcion }} </td>
							    		<td>
							    			<a href="{{ route('estados_conexiones.destroy', $estado_conexion->id) }}" onclick="return confirm('¿Seguro de desea eliminarlo?')" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  </a>
							    			<a href="{{ route('estados_conexiones.edit', $estado_conexion->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>  </a>
							    		</td>	
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
						  <center>
						  	<a href="{{ route('estados_conexiones.create') }}" class="btn btn-success"> Agregar Nuevo Estado </a> <br>
						  </center>	
					  <br>
					  <center>
					  {{ $estados_conexiones->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
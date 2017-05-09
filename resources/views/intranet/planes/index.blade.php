@extends('layouts.app')

@section('titulo', 'Planes')

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
		        			{!! Form::open(['route' => 'planes.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar planes...', 'aria-describedby' => 'search'])  !!}
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
						    	<th> FECHA INICIO </th>
						    	<th> FECHA FIN </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($planes as $plan)
						    		<tr>
							    		<td> {{ $plan->descripcion }} </td>
							    		<td> {{ $plan->fecha_inicio }} </td>
							    		<td> {{ $plan->fecha_fin }} </td>
							    		<td> {{ $plan->tipo_plan->descripcion }} </td>
							    		<td>
							    			<a href="{{ route('planes.destroy', $plan->id) }}" onclick="return confirm('¿Seguro de desea eliminarlo?')" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  </a>
							    			<a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>  </a>
							    		</td>	
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
						  <center>
						  	<a href="{{ route('planes.create') }}" class="btn btn-success"> Agregar Nuevo Plan </a> <br>
						  </center>	
					  <br>
					  <center>
					  {{ $planes->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
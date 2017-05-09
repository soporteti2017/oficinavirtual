@extends('layouts.app')

@section('titulo', 'Tipos de pagos')

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
		        			{!! Form::open(['route' => 'tipos_pagos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar tipos de pagos...', 'aria-describedby' => 'search'])  !!}
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
						    	@foreach($tipos_pagos as $tipo_pago)
						    		<tr>
							    		<td> {{ $tipo_pago->descripcion }} </td>
							    		<td>
							    			<a href="{{ route('tipos_pagos.destroy', $tipo_pago->id) }}" onclick="return confirm('¿Seguro de desea eliminarlo?')" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  </a>
							    			<a href="{{ route('tipos_pagos.edit', $tipo_pago->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>  </a>
							    		</td>	
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
						  <center>
						  	<a href="{{ route('tipos_pagos.create') }}" class="btn btn-success"> Agregar Nuevo Tipo de pago </a> <br>
						  </center>	
					  <br>
					  <center>
					  {{ $tipos_pagos->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
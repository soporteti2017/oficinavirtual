@extends('layouts.app')

@section('titulo', 'Estados de conexión')

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
			  <div class="panel-heading">
			    <h3 class="panel-title"><strong><h3>Editar Estado de conexión  {!! $estado_conexion->descripcion !!}</h3></strong>
			  </div>
			  <div class="panel-body">
			    	
			  		{!! Form::open(['route' => ['estados_conexiones.update', $estado_conexion], 'method' => 'PUT'])  !!}
			
						<div class="form-group">
							{!! Form::label('descripcion', 'descripcion') !!}
							{!! Form::text('descripcion', $estado_conexion->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción de servicio', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Editar', ['class' => 'btn btn-primary large']); !!}
						</div>

					{!! Form::close() !!}

			  </div>
			</div>
		</div>	
	</div>	
@endsection
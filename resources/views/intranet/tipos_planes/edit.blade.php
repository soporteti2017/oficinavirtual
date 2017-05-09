@extends('layouts.app')

@section('titulo', 'Usuarios')

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
			    <h3 class="panel-title"><strong><h3>Editar Tipos de Planes {!! $tipo_plan->descripcion !!}</h3></strong>
			  </div>
			  <div class="panel-body">
			    	
			  		{!! Form::open(['route' => ['tipos_planes.update', $tipo_plan], 'method' => 'PUT'])  !!}
						<div class="form-group">
							{!! Form::label('descripcion', 'Descripción') !!}
							{!! Form::text('descripcion', $tipo_plan->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese Descripción de serv.', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('servicio_id', 'Servicio Asociado') !!}
							{!! Form::select('servicio_id', $servicios, $tipo_plan->servicio->id, ['class' => 'form-control', 
							'placeholder' => 'Seleccione una opción', 'required']) !!}
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
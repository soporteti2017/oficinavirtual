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
			    <h3 class="panel-title"><strong><h3>Editar Planes {!! $plan->descripcion !!}</h3></strong>
			  </div>
			  <div class="panel-body">
			    	
			  		{!! Form::open(['route' => ['planes.update', $plan], 'method' => 'PUT'])  !!}
						<div class="form-group">
							{!! Form::label('descripcion', 'Nombre Plan') !!}
							{!! Form::text('descripcion', $plan->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese Descripción de plan.', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
							{!! Form::date('fecha_inicio', $plan->fecha_inicio, ['class' => 'form-control', 'required']); !!}
						</div>

						<div class="form-group">
							{!! Form::label('fecha_fin', 'Fecha fin') !!}
							{!! Form::date('fecha_fin', $plan->fecha_fin, ['class' => 'form-control', 'required']); !!}
						</div>

						<div class="form-group">
							{!! Form::label('meses', 'Meses sin costo') !!}
							{!! Form::text('meses', $plan->meses, ['class' => 'form-control', 'placeholder' => 'Eje: 1', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('id_tipo_plan', 'Tipo de plan') !!}
							{!! Form::select('id_tipo_plan', $tipos_planes, $plan->tipo_plan->id, ['class' => 'form-control', 
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
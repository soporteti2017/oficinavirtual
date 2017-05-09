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
		 		<div class="panel-heading">
			    	<h3 class="panel-title"><strong><h3>Crear Planes</h3></strong>
			  	</div>
		        <div class="panel-body">
		        	@if(count($errors) > 0)
			  			<div class="alert alert-danger" role="alert">
			  				<ul>
				  				@foreach($errors->all() as $errores)
				  					<li> {{ $errores }}</li>
				  				@endforeach
			  				</ul>
			  			</div>	
			  		@endif


			  		{!! Form::open(['route' => 'planes.store', 'method' => 'POST'])  !!}
			
						<div class="form-group">
							{!! Form::label('descripcion', 'Nombre Plan') !!}
							{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Descripción de plan.', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
							{!! Form::date('fecha_inicio', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']); !!}
						</div>

						<div class="form-group">
							{!! Form::label('fecha_fin', 'Fecha fin') !!}
							{!! Form::date('fecha_fin', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']); !!}
						</div>

						<div class="form-group">
							{!! Form::label('meses', 'Meses sin costo') !!}
							{!! Form::text('meses', null, ['class' => 'form-control', 'placeholder' => 'Eje: 1', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('tipo_plan_id', 'Tipo de plan') !!}
							{!! Form::select('tipo_plan_id', $tipos_planes, null, ['class' => 'form-control', 
							'placeholder' => 'Seleccione una opción', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Ingresar', ['class' => 'btn btn-primary large']); !!}
						</div>

					{!! Form::close() !!}
		        </div>
		    </div>
		</div>        	

@endsection


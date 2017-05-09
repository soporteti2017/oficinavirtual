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
			  <div class="panel-heading">
			    <h3 class="panel-title"><strong><h3>Editar servicio  {!! $servicio->descripcion !!}</h3></strong>
			  </div>
			  <div class="panel-body">
			    	
			  		{!! Form::open(['route' => ['servicios.update', $servicio], 'method' => 'PUT'])  !!}
						
			  			<div class="form-group">
							{!! Form::label('id', 'Identificador') !!}
							{!! Form::text('id', $servicio->id, ['class' => 'form-control', 'placeholder' => 'Identificados...', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('descripcion', 'descripcion') !!}
							{!! Form::text('descripcion', $servicio->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción de servicio', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('valor', 'Valor') !!}
							{!! Form::text('valor', $servicio->valor, ['class' => 'form-control', 'placeholder' => 'Eje: 10000', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('unica_vez', '¿Sólo un cargo?') !!}
							{!! Form::select('unica_vez',['' => 'Seleccione', '0' => 'No', '1' => 'Si' ], $servicio->unica_vez, ['class' => 'form-control']) !!}
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
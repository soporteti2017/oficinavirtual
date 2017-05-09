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
			    <h3 class="panel-title"><strong><h3>Editar usuario {!! $usuarios->nombre !!}</h3></strong>
			  </div>
			  <div class="panel-body">
			    	
			  		{!! Form::open(['route' => ['usuarios.update', $usuarios], 'method' => 'PUT'])  !!}
			
						<div class="form-group">
							{!! Form::label('usuario', 'Usuario') !!}
							{!! Form::text('usuario', $usuarios->usuario, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('rut', 'Rut') !!}
							{!! Form::text('rut', $usuarios->rut, ['class' => 'form-control', 'placeholder' => 'Eje: 111111111', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('nombre', 'Nombre') !!}
							{!! Form::text('nombre', $usuarios->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('correo', 'Correo electrónico') !!}
							{!! Form::email('email', $usuarios->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@cablecolor.cl', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('externo', 'Tipo usuario') !!}
							{!! Form::select('externo',['' => 'Seleccione', '0' => 'Oficina', '1' => 'Externo' ], $usuarios->externo, ['class' => 'form-control']) !!}
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
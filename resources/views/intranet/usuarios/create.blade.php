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
			    	<h3 class="panel-title"><strong><h3>Crear usuarios</h3></strong>
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


			  		{!! Form::open(['route' => 'usuarios.store', 'method' => 'POST'])  !!}
			
						<div class="form-group">
							{!! Form::label('usuario', 'Usuario') !!}
							{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('password', 'Password') !!}
							{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario', 'required']) !!}
						</div>	

						<div class="form-group">
							{!! Form::label('rut', 'Rut') !!}
							{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Eje: 111111111', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('nombre', 'Nombre') !!}
							{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('email', 'Correo electrónico') !!}
							{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@cablecolor.cl', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('tipo_usuario_id', 'Tipo de usuario') !!}
							{!! Form::select('tipo_usuario_id', $tipos_usuarios, null, ['class' => 'form-control', 
							'placeholder' => 'Seleccione una opción', 'required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('externo', 'Tipo usuario') !!}
							{!! Form::select('externo',['' => 'Seleccione', '0' => 'Oficina', '1' => 'Externo' ], null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Ingresar', ['class' => 'btn btn-primary large']); !!}
						</div>

					{!! Form::close() !!}
		        </div>
		    </div>
		</div>        	

@endsection


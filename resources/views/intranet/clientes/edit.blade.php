@extends('layouts.app')

@section('titulo', 'Clientes')

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
			    	<h3 class="panel-title"><strong><h3>Crear Clientes</h3></strong>
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

{!! Form::open(['route' => ['clientes.update', $cliente], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

<div class="form-group">

	{!! Form::label('nombres','Nombres',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('nombres',$cliente->nombres, ['class' => 'form-control', 'placeholder'=>'Nombres','required' ]) !!}
	</div>

	{!! Form::label('rut','Rut',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('rut',$cliente->rut, ['class' => 'form-control', 'placeholder'=>'11.111.111-1','required' ]) !!}
	</div>

	

</div>

<div class="form-group">

	{!! Form::label('paterno','Apellido paterno',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('paterno',$cliente->paterno, ['class' => 'form-control', 'placeholder' => 'Apellido paterno','required' ]) !!}
	</div>

	{!! Form::label('materno','Apellido materno',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('materno',$cliente->materno, ['class' => 'form-control', 'placeholder' => 'Apellido materno','required' ]) !!}
	</div>

</div>


<div class="form-group">

	{!! Form::label('nacionalidad','Nacionalidad',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('nacionalidad',$cliente->nacionalidad, ['class' => 'form-control', 'placeholder' => 'Chileno','required' ]) !!}
	</div>

	{!! Form::label('telefono1','Telefono 1',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('telefono1',$cliente->telefono1, ['class' => 'form-control', 'placeholder' => '9xxxxxxxx','required' ]) !!}
	</div>

</div>

<div class="form-group">

	{!! Form::label('telefono2','Telefono 2',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::text('telefono2',$cliente->telefono2, ['class' => 'form-control', 'placeholder' => '532xxxxxx']) !!}
	</div>

	{!! Form::label('email','E-mail',['class' => 'col-lg-2 control-label']) !!}
	<div class="col-lg-3">
	{!! Form::email('email',$cliente->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com']) !!}
	</div>

</div>


<br>

<div class="col-lg-1"></div>
<div class="form-group">	

	{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
	
</div>

{!! Form::close() !!}

 </div>
		    </div>
		</div> 

@endsection
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
		 		<div class="panel-heading">
			    	<h3 class="panel-title"><strong><h3>Crear Tipos de pagos</h3></strong>
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


			  		{!! Form::open(['route' => 'tipos_pagos.store', 'method' => 'POST'])  !!}
			
						<div class="form-group">
							{!! Form::label('descripcion', 'Descripción') !!}
							{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Descripción...', 'required']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Ingresar', ['class' => 'btn btn-primary large']); !!}
						</div>

					{!! Form::close() !!}
		        </div>
		    </div>
		</div>        	

@endsection


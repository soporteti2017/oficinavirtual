@extends('layouts.app')

@section('titulo', 'Cuenta')

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

		 		<div class="panel panel-primary">
				  <div class="panel-heading"><strong>Ingrese número de cliente:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'cuenta_corriente.consulta_cuenta_corriente', 'method' => 'POST'])  !!}
						<div class="col-md-12">
							<div class="form-group">
								{!! Form::label('id', 'Cliente') !!}
								{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número de cliente', 'required']) !!}
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								{!! Form::submit('Ingresar', ['class' => 'btn btn-primary large']); !!}
							</div>
						</div>
					{!! Form::close() !!}	


				  </div>
				</div>
		     	
    	</div>
	</div>

@endsection
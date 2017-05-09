@extends('layouts.app')

@section('titulo', 'Carga Manual')

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

                <div class="panel panel-primary">
				  <div class="panel-heading"><strong>Carga Manual:</strong> </div>
				  <div class="panel-body">
				    
                        <div class="row">
                          
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           @if($comparafecha == true)

							                    <div class="alert alert-danger">
												  <strong>Eroor!</strong> El cliente tiene una fecha de pago posterior al mes seleccionado.
												</div>

										   @elseif($haycarga == true)

										   		<div class="alert alert-danger">
												  <strong>Eroor!</strong> El cliente ya tiene cargado el mes seleccionado.
												</div>

											@elseif($haycargo == false)

												<div class="alert alert-danger">
												  <strong>Eroor!</strong> El cliente tiene valor de mensualidad igual a 0.
												</div>

											@elseif($existecliente == false)

												<div class="alert alert-danger">
												  <strong>Eroor!</strong> El cliente ingresado no existe.
												</div>

										   @else
										   		<div class="alert alert-success">
												  <strong>Realizado!</strong> Carga realizada correctamente.
												</div>
                                           @endif
                                        </div>
                                    </div>

                        </div>


				  </div>
				</div>
		 		
		    </div>    	
    	</div>
	</div> 


@endsection
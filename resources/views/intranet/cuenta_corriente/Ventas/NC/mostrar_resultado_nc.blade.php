@extends('layouts.app')

@section('titulo', 'NC')

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
				  <div class="panel-heading"><strong>Notas de crédito</strong> </div>
				  <div class="panel-body">
				    
                        <div class="row">
                          
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           @if($existeboleta == false)

							                     <div class="alert alert-danger">
												  <strong>Error!</strong> Nro boleta fiscal ingresado no existe en los registros.
												</div>
											@elseif($exiteventa == false)

							                     <div class="alert alert-danger">
												  <strong>Error!</strong> Nro interno ingresado no existe en los registros.
												</div>
											@elseif($existenc == true)

							                     <div class="alert alert-danger">
												  <strong>Error!</strong> Ya se ha generado una NC para esa boleta.
												</div>
										    @else
										   		<div class="alert alert-success">
												  <strong>Realizado!</strong> NC generada correctamente.
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
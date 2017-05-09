@extends('layouts.app')

@section('titulo', 'Cuenta Corriente')

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

		        <div class="panel-body">
		        		
						    	@foreach($contratos as $contrato)
						    		@if($contrato->id == "")
						    			
						    		@else
						    			@foreach($cliente as $cli)

						    			<div class="panel panel-primary">
											  <div class="panel-heading"><strong>Datos de cliente</strong> </div>
											  <div class="panel-body">

											  	<div class="panel panel-primary">
													  <div class="panel-heading"><strong>Datos Personales</strong> </div>
													  <div class="panel-body">
													  	<div class="row">
														  <div class="col-md-6">
														  		<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	N° Cliente:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $contrato->id }}" disabled>
																    </div>
																  </div>
																</form>  		  	 
														  </div>
														  <div class="col-md-6">
														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	Contrato:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $contrato->correlativo_manual }}" disabled>
																    </div>
																  </div>
															</form> 
														  </div>
														</div>

														<div class="row">
														  <div class="col-md-12">

														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-1 control-label">
																    	Rut:
																    </label>
																    <div class="col-sm-10">
																      <input type="text" class="form-control" value=" {{ $cli->rut }}" disabled>
																    </div>
																  </div>
															</form> 

														  </div>
														</div>

														<div class="row">
														  <div class="col-md-12">

														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-1 control-label">
																    	Nombre:
																    </label>
																    <div class="col-sm-10">
																      <input type="text" class="form-control" value=" {{ $cli->nombres. " " .$cli->paterno. " ".$cli->materno }}" disabled>
																    </div>
																  </div>
															</form> 

														  </div>
														</div>

														<div class="row">
														  <div class="col-md-12">

														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-1 control-label">
																    	Dirección:
																    </label>
																    <div class="col-sm-10">
																      <input type="text" class="form-control" value=" {{ $contrato->direccion->calle->calle. " ".$contrato->direccion->numero. ", ".$contrato->direccion->calle->poblacion->poblacion }}" disabled>
																    </div>
																  </div>
															</form> 

														  </div>
														</div>

													  </div>
											  	</div>
									  	</div>
									  	@endforeach

						    		@endif
						    		
						    	@endforeach

									
						    
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
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


														<div class="row">
														  <div class="col-md-6">
														  		<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	Estado:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $contrato->estado_conexion->descripcion }}" disabled>
																    </div>
																  </div>
																</form>  		  	 
														  </div>
														  <div class="col-md-6">
														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	F. Pago:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $contrato->correlativo_abonado }}" disabled>
																    </div>
																  </div>
															</form> 
														  </div>
														</div>
													  	

													  	<div class="row">
														  <div class="col-md-6">
														  		<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	Teléfono:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $cli->telefono1 }}" disabled>
																    </div>
																  </div>
																</form>  		  	 
														  </div>
														  <div class="col-md-6">
														  	<form class="form-horizontal">
																  <div class="form-group">
																    <label for="inputEmail3" class="col-sm-2 control-label">
																    	Móvil:
																    </label>
																    <div class="col-sm-8">
																      <input type="text" class="form-control" value=" {{ $cli->telefono2 }}" disabled>
																    </div>
																  </div>
															</form> 
														  </div>
														</div>

													  </div>
											  	</div>
											  	<div class="panel panel-primary">
													  <div class="panel-heading"><strong>Opciones</strong> </div>
													  <div class="panel-body">
															
															{!! Form::open(['route' => 'cuenta_corriente.verdetalles', 'method' => 'POST', 'target' => '_blank'])  !!}

															<div class="form-group">
																{!! Form::label('consulta', 'Consulta') !!}
																{!! Form::select('consulta',['' => 'Seleccione', '0' => 'Contratos', '1' => 'Cupón de Pago', '2' => 'Excepciones', 
																'3' => 'Plano Dirección', '4' => 'Cuenta Corriente', '5' => 'Pagos', '6' => 'Ordenes de trabajo', 
																'7' => 'Ticket BA', '8' => 'Historial de activos', '9' => 'Generar OT', '10' => 'Solicita Reconexión' ],
																 null, ['class' => 'form-control']) !!}
																{!! Form::hidden('contrato_id', $contrato->id) !!}
																{!! Form::hidden('nombre_abonado', $cli->nombres. " " .$cli->paterno. " ".$cli->materno) !!}
																{!! Form::hidden('correlativo_manual', $contrato->correlativo_manual) !!}
																{!! Form::hidden('estado_conexion', $contrato->estado_conexion->descripcion) !!}
																{!! Form::hidden('fecha_contrato', $contrato->fecha) !!}
																{!! Form::hidden('fecha_estado', $contrato->fecha_estado_conexion) !!}
																
															</div>

															<div class="row">
	    														<div class="col-md-5">
	    														</div>
	    														<div class="col-md-5">	

																	<div class="form-group">
																		{!! Form::submit('Consultar', ['class' => 'btn btn-primary large']); !!}
																	</div>
																</div>
																<div class="col-md-2">
	    														</div>		

															{!! Form::close() !!}

													  	

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
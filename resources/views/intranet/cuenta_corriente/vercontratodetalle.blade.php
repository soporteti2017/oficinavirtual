@extends('layouts.app')

@section('titulo', 'Clientes')

@section('content')

	<div class="row">


		 <div class="col-md-12">	

		 	<div class="panel panel-default">

		        <div class="panel-body">
		        		
		        		<div class="panel panel-primary">
							<div class="panel-heading"><strong>Contrato cliente: {{ $nombre_abonado }}</strong> </div>
								<div class="panel-body">

									<div>
										  <!-- Nav tabs -->
										  <ul class="nav nav-tabs" role="tablist">
										    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">Datos Contrato</a></li>
										    <li role="presentation"><a href="#tv" aria-controls="tv" role="tab" data-toggle="tab">Servicio Televisión</a></li>
										    @if($premiumc == true)
										    <li role="presentation"><a href="#premium" aria-controls="premium" role="tab" data-toggle="tab">Servicio Premium</a></li>
										    @endif
										    @if($inet == true)
										    <li role="presentation"><a href="#inet" aria-controls="inet" role="tab" data-toggle="tab">Servicio Banda Ancha</a></li>
										    @endif
										  </ul>

										  <!-- Tab panes -->
										  <div class="tab-content">
										    <div role="tabpanel" class="tab-pane active" id="general">
										    	<br>
										    	<div class="panel panel-primary">
													<div class="panel-heading"><strong>Datos Generales</strong> </div>
														<div class="panel-body">

															<div class="row">
															  <div class="col-md-6">
															  		<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-2 control-label">
																	    	N° Cliente:
																	    </label>
																	    <div class="col-sm-8">
																	      <input type="text" class="form-control" value=" {{ $contrato_id }}" disabled>
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
																	    	Contrato:
																	    </label>
																	    <div class="col-sm-8">
																	      <input type="text" class="form-control" value=" {{ $num_contrato }}" disabled>
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
																	    	Fecha Contrato:
																	    </label>
																	    <div class="col-sm-8">
																	      <input type="text" class="form-control" value=" {{ $fecha_contrato }}" disabled>
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
																	      <input type="text" class="form-control" value=" {{ $estado_cone }}" disabled>
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
																	      <input type="text" class="form-control" value=" {{ $fecha_estado }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>
														</div>
												
												</div>

												<br>
										    	<div class="panel panel-primary">
													<div class="panel-heading"><strong>Tarifas</strong> </div>
														<div class="panel-body">

															<div class="row">  
															  <div class="col-md-6">
															  	<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-5 control-label">
																	    	Acceso Televisión Cable Color:
																	    </label>
																	    <div class="col-sm-7">
																	      <input type="text" class="form-control" value="${{ $tvacc }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>
															@if($compvalor == 1)

															<div class="row">  
															  <div class="col-md-6">
															  	<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-5 control-label">
																	    	Acceso Servicios Cable Color:
																	    </label>
																	    <div class="col-sm-7">
																	      <input type="text" class="form-control" value="${{ $tvadi }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>

															@endif

															@if($premiumc == true)

															<div class="row">  
															  <div class="col-md-6">
															  	<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-5 control-label">
																	    	Acceso Premium Cable Color:
																	    </label>
																	    <div class="col-sm-7">
																	      <input type="text" class="form-control" value="${{ $costopremium }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>

															@endif

															@if($inet == true)

															<div class="row">  
															  <div class="col-md-6">
															  	<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-5 control-label">
																	    	Acceso Banda Ancha Cable Color:
																	    </label>
																	    <div class="col-sm-7">
																	      <input type="text" class="form-control" value="${{ $costoinet }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>

															@endif

															<div class="row">  
															  <div class="col-md-6">
															  	<form class="form-horizontal">
																	  <div class="form-group">
																	    <label for="inputEmail3" class="col-sm-6 control-label">
																	    	Total Servicios Cable Color:
																	    </label>
																	    <div class="col-sm-6">
																	      <input type="text" class="form-control" value="${{ $mensual_suma }}" disabled>
																	    </div>
																	  </div>
																</form> 
															  </div>
															</div>



														</div>
												</div>			

										    </div>


										    <div role="tabpanel" class="tab-pane" id="tv">
										    	<br>
										    	<div class="panel panel-primary">
													<div class="panel-heading"><strong>Detalle de televisión</strong> </div>
														<div class="panel-body">
															<div class="row">
																<div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Servicios TV Cable Color:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value="${{ $tva  }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div>
															@if($montobocad > 0)
																<div class="row">
																<div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Puntos Adicionales:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value="${{ $montobocad  }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
																</div>
															@endif
															<div class="row">
																<div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Total televisión:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value="${{ $tvacc  }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
																</div>
														</div>
													</div>			

										    </div>


										    <div role="tabpanel" class="tab-pane" id="premium">
										    	<br>
										    	@foreach($premiumcajas as $premiumcaja)
										    		<div class="panel panel-primary">
													<div class="panel-heading"><strong>Instalación Decodificador</strong> </div>
														<div class="panel-body">
															<div class="row">
																<div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Numero decodificador:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value=" {{ $premiumcaja->serie }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div>	
															<div class="row"> 
																 <div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Fecha Instalación:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value=" {{ $premiumcaja->fecha }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div>	
															<div class="row"> 
																 <div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	OT:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value=" {{ $premiumcaja->orden_trabajo_id  }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div> 
															<div class="row"> 
																 <div class="col-md-6">
																  	<form class="form-horizontal">
																		  <div class="form-group">
																		    <label for="inputEmail3" class="col-sm-4 control-label">
																		    	Estado Decofificador:
																		    </label>
																		    <div class="col-sm-5">
																		      <input type="text" class="form-control" value=" {{ $premiumcaja->estado_stb->descripcion }}" disabled>
																		    </div>
																		  </div>
																	</form> 
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div>
														</div>
													</div>		
													<br>
													<div class="panel panel-primary">
													<div class="panel-heading"><strong>Señales y tarifas</strong> </div>
														<div class="panel-body">
															<div class="row">
																<div class="col-md-6">
																	@foreach($contratospremiums as $contratopremium)
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	{{ $contratopremium->servicio->descripcion }}:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $contratopremium->servicio->valor }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	@endforeach
																	@foreach($contratos_adicionales as $contrato_adicional)
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	{{ $contrato_adicional->servicio->descripcion }}:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $contrato_adicional->servicio->valor }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	@endforeach
																	@foreach($contratos_descuentos as $contrato_descuento)
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Descuento Comercial:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $contrato_descuento->descuento }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	@endforeach
																	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Total Servicios Premium:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $costopremium }}" disabled>
																			    </div>
																			  </div>
																		</form>
																 </div>
																 <div class="col-md-6">
																 </div>	
															</div>

														</div>
													</div>
													@endforeach
													</div>				
										    	

										 
										    <div role="tabpanel" class="tab-pane" id="inet">
										    	<br>
										    	@foreach($cmclientes as $cmcliente)
										    	<div class="row">
													<div class="col-md-6">
											    		<div class="panel panel-primary">
														<div class="panel-heading"><strong>Instalación Cable Modem</strong> </div>
															<div class="panel-body">
																<div class="row">
																	<div class="col-md-6">
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Numero CM:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->cmmac->cm }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>
																</div>	 
																<div class="row">	 
																	 <div class="col-md-6">
																	 	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	MAC:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->cmmac_id }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>	
																</div>	
																<div class="row">	 
																	 <div class="col-md-6">
																	 	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Fecha Instalación:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->fecha }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>	
																</div> 
																<div class="row">	 
																	 <div class="col-md-6">
																	 	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Orden de trabajo:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->orden_trabajo_id }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>	
																</div>
																<div class="row">	 
																	 <div class="col-md-6">
																	 	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Estado CM:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->estado_cm->descripcion }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>	
																</div>
															</div>
														</div>
													</div>

													<div class="col-md-6">
											    		<div class="panel panel-primary">
														<div class="panel-heading"><strong>Detalles Cable Modem</strong> </div>
															<div class="panel-body">
																<div class="row">
																	<div class="col-md-6">
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Marca:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->cmmac->marmocm->marca }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>
																</div>
																<div class="row">
																	<div class="col-md-6">
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Modelo:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->cmmac->marmocm->modelo }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>
																</div>
																<div class="row">
																	<div class="col-md-6">
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Docsis:
																			    </label>
																			    <div class="col-sm-8">
																			      <input type="text" class="form-control" value=" {{ $cmcliente->cmmac->marmocm->docsis }}" disabled>
																			    </div>
																			  </div>
																		</form> 
																	 </div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-md-12">
													
											    		<div class="panel panel-primary">
														<div class="panel-heading"><strong>Planes y tarifas</strong> </div>
															<div class="panel-body">
																<div class="row">
																	<div class="col-md-6">
																		@foreach($contratos_inets as $contrato_inet)
																	  	<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	{{ $contrato_inet->servinet->descripcion }}:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $contrato_inet->servinet->valor }}" disabled>
																			    </div>
																			   
																			  </div>
																		</form> 
																		@endforeach
																		<form class="form-horizontal">
																			  <div class="form-group">
																			    <label for="inputEmail3" class="col-sm-4 control-label">
																			    	Total Banda Ancha:
																			    </label>
																			    <div class="col-sm-5">
																			      <input type="text" class="form-control" value=" ${{ $costoinet }}" disabled>
																			    </div>
																			  </div>
																		</form>
																	 </div>
																</div>
															</div>
														</div>
													</div>						

												</div>		
												@endforeach			
										    </div>
										  </div>

									</div>

								</div>
								<br>
								<div class="row"> 
									<div class="col-md-4">
									</div> 
									<div class="col-md-4">
										<form class="form-horizontal">
											{!! Form::open(['route' => 'clientes.contratopdf', 'method' => 'POST', 'target' => '_blank'])  !!}

															<div class="form-group">
															
																{!! Form::hidden('id', '2') !!}

																
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
										</form>
									</div>
									<div class="col-md-4">
									</div> 
								</div>
								<br>
						</div>			
						    
						     
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
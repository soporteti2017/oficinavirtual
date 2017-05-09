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
						<div class="panel-heading"><strong>CREAR NOTA DE CREDITO</strong> </div>
							<div class="panel-body">

								{!! Form::open(['route' => 'cuenta_corriente.Ventas.NC.solicitanc', 'method' => 'POST'])  !!}

									<div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('nboleta', 'Nro de Boleta: ') !!}
                                            {!! Form::text('nboleta', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'nboleta']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('ninterno', 'Nro interno: ') !!}
                                            {!! Form::text('ninterno', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'nboleta']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
				                        <div class="form-group">
											{!! Form::label('caja', 'Caja: ') !!}
											{!! Form::select('caja',['' => 'Seleccione', '82' => 'Caja 1', '83' => 'Caja 2', '84' => 'Caja 3' ], null, ['class' => 'form-control']) !!}
										</div>
									</div>

									<div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('monto', 'Total de Boleta: ') !!}
                                            {!! Form::text('monto', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'monto']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
				                        <div class="form-group">
											{!! Form::label('motivo', 'Motivo: ') !!}
											{!! Form::select('motivo',['' => 'Seleccione', '1' => 'Término de contrato', '2' => 'Error de digitación', '3' => 'Falla sistema' ], null, ['class' => 'form-control']) !!}
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											{!! Form::submit('Solicitar', ['class' => 'btn btn-primary large']); !!}
										</div>
									</div>
								{!! Form::close() !!}	

							</div>
					</div>
		 			
		    </div>    	
    	</div>
	</div>

@endsection
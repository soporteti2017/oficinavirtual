@extends('layouts.app')

@section('titulo', 'Rep elect.')

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
				  <div class="panel-heading"><strong>Reportes transacciones por Fecha:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.ReporteElectronico.Transacciones.solicita_transacciones_fecha', 'method' => 'POST'])  !!}
					  	<div class="row">
						  	<div class="col-md-12">
								<div class="form-group">
									{!! Form::label('caja', 'Caja: ') !!}
									{!! Form::select('caja',['' => 'Seleccione', '1' => 'Caja 1', '2' => 'Caja 2' ], null, ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									{!! Form::label('tipo_informe', 'Tipo Informe: ') !!}
									{!! Form::select('tipo_informe',['' => 'Seleccione', 'F' => 'Por Fecha', 'M' => 'Por mes', 'D' => 'Por día' ]
													, null, ['class' => 'form-control']) !!}
								</div>
							</div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_inicial', 'Fecha Inicial (DDMMAA): ') !!}
                                        {!! Form::text('fecha_inicial', null, ['class' => 'form-control', 'required', 
                                                        'id' => 'fecha_inicial']) !!}
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_final', 'Fecha Final (DDMMAA): ') !!}
                                        {!! Form::text('fecha_final', null, ['class' => 'form-control', 'required', 
                                                        'id' => 'fecha_final']) !!}
                                    </div>
                            </div>
							
							<div class="col-md-12">
								<div class="form-group">
									{!! Form::submit('Solicitar', ['class' => 'btn btn-primary large']); !!}
								</div>
							</div>
						</div>
					{!! Form::close() !!}	


				  </div>
				</div>
		 		
		    </div>    	
    	</div>
	</div> 


@endsection
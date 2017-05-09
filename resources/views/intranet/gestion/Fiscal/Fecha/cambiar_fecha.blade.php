@extends('layouts.app')

@section('titulo', 'Conf. Fecha')

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
				  <div class="panel-heading"><strong>Configurar Fecha y Hora Impresora Fiscal:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Fecha.solicita_cambio_fecha', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('caja', 'Caja: ') !!}
                                    {!! Form::select('caja',['' => 'Seleccione', '1' => 'Caja 1', '2' => 'Caja 2' ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group" id="fecha_hora">
                                        {!! Form::label('fecha', 'Fecha (DDMMAA): ') !!}
                                        {!! Form::text('fecha', null, ['class' => 'form-control', 'required', 
                                                        'id' => 'fecha']) !!}
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group" id="fecha_hora">
                                        {!! Form::label('hora', 'Hora (HHMMSS): ') !!}
                                        {!! Form::text('hora', null, ['class' => 'form-control', 'required', 
                                                        'id' => 'hora']) !!}
                                    </div>
                            </div> 
                
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::submit('Cambiar Fecha/Hora', ['class' => 'btn btn-primary large']); !!}
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
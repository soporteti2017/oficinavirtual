@extends('layouts.app')

@section('titulo', 'Folio Cobranza')

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
				  <div class="panel-heading"><strong>Cambio Folio Cobranza:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => ['cuenta_corriente.actualiza_folio_cobranza', $usuario->id], 'method' => 'PUT'])  !!}
                        <div class="row">
                            
                                <div class="col-md-12">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('folioactual', 'Folio Actual: ') !!}
                                            {!! Form::text('folioactual', $usuario->boleta2, ['class' => 'form-control', 'required', 
                                                            'id' => 'folioactual', 'disabled' => 'true']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('folionuevo', 'Folio Nuevo: ') !!}
                                            {!! Form::text('folionuevo', null, ['class' => 'form-control',  
                                                            'id' => 'folionuevo']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('Cambiar', ['class' => 'btn btn-primary large']); !!}
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
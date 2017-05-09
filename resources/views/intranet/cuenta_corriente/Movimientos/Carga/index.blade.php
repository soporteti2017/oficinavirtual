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
				    
				  	{!! Form::open(['route' => ['cuenta_corriente.genera_carga_manual'], 'method' => 'POST'])  !!}
                        <div class="row">
                            
                                <div class="col-md-12">
                                        <div class="form-group" id="carga">
                                            {!! Form::label('ncliente', 'N° de cliente: ') !!}
                                            {!! Form::text('ncliente', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'ncliente']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="carga">
                                            {!! Form::label('mensualidad', 'Mensualidad: ') !!}
											{!! Form::select('mensualidad',['' => 'Seleccione', '1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre' ], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="carga">
                                            {!! Form::label('anio', 'Año a cargar: ') !!}
											{!! Form::select('anio',['' => 'Seleccione', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                    </div>

                                    <div class="col-md-4">
                                    	<div class="checkbox">
										    <label>
										      <input type="checkbox" name="proporcionales" id="proporcionales"> <strong>Proporcionales</strong>
										    </label>
										</div>
									</div>

									<div class="col-md-2">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('Crea Carga', ['class' => 'btn btn-primary large btn-lg btn-block']); !!}
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
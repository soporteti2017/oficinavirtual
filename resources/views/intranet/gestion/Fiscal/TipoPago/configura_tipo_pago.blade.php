@extends('layouts.app')

@section('titulo', 'Conf. Tipo Pago')

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
				  <div class="panel-heading"><strong>Configurar Tipo de Pago:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.TipoPago.solicita_conf_tipo_pago', 'method' => 'POST'])  !!}
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('caja', 'Caja: ') !!}
                                        {!! Form::select('caja',['' => 'Seleccione', '1' => 'Caja 1', '2' => 'Caja 2' ], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea1', 'Línea 1: ') !!}
                                            {!! Form::text('linea1', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea1']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea2', 'Línea 2: ') !!}
                                            {!! Form::text('linea2', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea2']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea3', 'Línea 3: ') !!}
                                            {!! Form::text('linea3', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea3']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea4', 'Línea 4: ') !!}
                                            {!! Form::text('linea4', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea4']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea5', 'Línea 5: ') !!}
                                            {!! Form::text('linea5', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea5']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea6', 'Línea 6: ') !!}
                                            {!! Form::text('linea6', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea6']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea7', 'Línea 7: ') !!}
                                            {!! Form::text('linea7', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea7']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea8', 'Línea 8: ') !!}
                                            {!! Form::text('linea8', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea8']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea9', 'Línea 9: ') !!}
                                            {!! Form::text('linea9', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea9']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea10', 'Línea 10: ') !!}
                                            {!! Form::text('linea10', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea10']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea11', 'Línea 11: ') !!}
                                            {!! Form::text('linea11', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea11']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea12', 'Línea 12: ') !!}
                                            {!! Form::text('linea12', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea12']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea13', 'Línea 13: ') !!}
                                            {!! Form::text('linea13', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea13']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea14', 'Línea 14: ') !!}
                                            {!! Form::text('linea14', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea14']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea15', 'Línea 15: ') !!}
                                            {!! Form::text('linea15', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea15']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea16', 'Línea 16: ') !!}
                                            {!! Form::text('linea16', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea16']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea17', 'Línea 17: ') !!}
                                            {!! Form::text('linea17', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea17']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea18', 'Línea 18: ') !!}
                                            {!! Form::text('linea18', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea18']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea19', 'Línea 19: ') !!}
                                            {!! Form::text('linea19', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea19']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" id="encabezado">
                                            {!! Form::label('linea20', 'Línea 20: ') !!}
                                            {!! Form::text('linea20', null, ['class' => 'form-control', 'required', 
                                                            'id' => 'linea20']) !!}
                                        </div>
                                    </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::submit('Configurar', ['class' => 'btn btn-primary large']); !!}
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
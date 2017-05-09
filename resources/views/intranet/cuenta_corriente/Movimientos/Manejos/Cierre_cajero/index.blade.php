@extends('layouts.app')

@section('titulo', 'Cierre Cajero')

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
				  <div class="panel-heading"><strong>Realizar Cierre Cajero:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => ['cuenta_corriente.Movimientos.Manejos.Cierre_cajero.cierre_cajero'], 'method' => 'GET'])  !!}
                        <div class="row">
                          
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('Realizar Cierre Cajero', ['class' => 'btn btn-primary large btn-lg btn-block']); !!}
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
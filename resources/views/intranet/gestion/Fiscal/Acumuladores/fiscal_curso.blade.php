@extends('layouts.app')

@section('titulo', 'Fiscal en curso')

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
				  <div class="panel-heading"><strong>Jornada Fiscal en curso:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Acumuladores.generarfiscalcurso', 'method' => 'POST'])  !!}

                        <div class="form-group">
							{!! Form::label('caja', 'Caja: ') !!}
							{!! Form::select('caja',['' => 'Seleccione', '1' => 'Caja 1', '2' => 'Caja 2' ], null, ['class' => 'form-control']) !!}
						</div>
			
						<div class="form-group">
							{!! Form::submit('Solicitar', ['class' => 'btn btn-primary large']); !!}
						</div>
					{!! Form::close() !!}	


				  </div>
				</div>
		 		
		    </div>    	
    	</div>
	</div> 


@endsection
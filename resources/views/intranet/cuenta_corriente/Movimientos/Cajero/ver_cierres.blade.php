@extends('layouts.app')

@section('titulo', 'Ver Cierres')

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
				  <div class="panel-heading"><strong>Ver cierres de cajero</strong> </div>
				  <div class="panel-body">
                        
                        <div class="table-responsive">
						  <table class="table table-striped">
						    <thead>
						    	<th> CAJERO </th>
						    	<th> FECHA </th>
						    	<th> TOTAL </th>
                                <th> IDENTIFICADOR </th>
                                <th> CIERRE DE CAJERO </th>
						    	<th> CIERRE Z </th>
						    </thead>
						    <tbody>
						    	@foreach($cajeros_cierres as $cajero_cierre)
						    		<tr>
							    		<td> {{ $cajero_cierre->usuario->nombre }} </td>
							    		<td> {{ $cajero_cierre->fecha }} </td>
							    		<td> {{ $cajero_cierre->valor }} </td>
                                        <td> <a href="{{ route('cuenta_corriente.Movimientos.Cajero.ver_cierre_detalle', [$cajero_cierre->numero, $cajero_cierre->usuario->nombre, $cajero_cierre->fecha, $cajero_cierre->valor, $cajero_cierre->usuario_id ]) }}" target="_blank">{{ $cajero_cierre->numero }} </a> </td>
                                        <td>  </td>
							    		<td>  </td>
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>

                  </div>
            </div>
		 		
		    </div>    	
    	</div>
	</div>

@endsection
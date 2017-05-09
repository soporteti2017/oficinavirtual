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

		 		
		        		{{-- BUSCADOR --}}
		        			{!! Form::open(['route' => 'cuenta_corriente.Ventas.NC.vernc', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('nrointerno', null, ['class' => 'form-control', 'placeholder' => 'Buscar boleta...', 'aria-describedby' => 'search'])  !!}
		        					 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
		        					<span></span>
		        				</div>
		        			{!! Form::close() !!}
		        			<hr>
		        		{{-- FIN BUSCADOR --}}

		        <div class="panel-body">
		        		<div class="table-responsive">
						  <table class="table table-striped">
						    <thead>
						    	<th> NRO FISCAL </th>
						    	<th> NRO INTERNO </th>
						    	<th> CAJA </th>
						    	<th> MONTO </th>
						    	<th> USUARIO </th>
						    	<th> FECHA </th>
						    </thead>
						    <tbody>
						    	@foreach($notas_credito as $nota_credito)
						    		<tr>
							    		<td> {{ $nota_credito->venta->correinternos[0]->ndocumento }} </td>
							    		<td> {{ $nota_credito->venta->documento }} </td>
							    		@if($nota_credito->venta->movimiento_venta_id == 82)
							    			<td> 1 </td>
							    		@elseif($nota_credito->venta->movimiento_venta_id == 83)
							    			<td> 2 </td>
							    		@elseif($nota_credito->venta->movimiento_venta_id == 84)
							    			<td> 3 </td>	
							    		@endif
							    		<td> {{ $nota_credito->monto }} </td>
							    		<td> {{ $nota_credito->usuario->nombre }} </td>
							    		<td> {{ $nota_credito->created_at }} </td>
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
					  <br>
					  <center>
					  {{ $notas_credito->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection
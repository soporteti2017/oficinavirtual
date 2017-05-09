@extends('layouts.app')

@section('titulo', 'Cuenta Corriente')

@section('content')

	<div class="row">

		 <div class="col-md-12">	

		 	<div class="panel panel-default">


		        <div class="panel-body">
		        		@foreach($contratos as $contrato) 
		        		<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title"><center><h3>DETALLE CUENTA CORRIENTE CLIENTE: {{ $contrato->id }}</h3></center></h3>
						  </div>
						  <div class="panel-body">
						  	@foreach($clientes as $cliente)
							   <h3> <span class="label label-success">NOMBRE: {{ $cliente->nombres. " ".$cliente->paterno." ".$cliente->materno }} </span></h3>
							   <h3> <span class="label label-success">RUT: {{ $cliente->rut }} </span></h3>
							   <h3> <span class="label label-success">Forma de pago: {{ $fpago }} </span></h3>
							@endforeach 
							<br>
							<div class="table-responsive">
							  <table class="table table-striped">
							    <thead>
							    	<th> DOCUMENTO </th>
							    	<th> FECHA </th>
							    	<th> DESCRIPCION </th>
							    	<th> VALOR </th>
							    	<th> SALDO </th>
							    	<th> VER </th>
							    </thead>
							    <tbody>
							    	<?php $saldo = 0; ?>
								@foreach($ctas_ctes as $cta_cte)
									<tr>
										<td> {{ $cta_cte->venta->documento }} </td>
										<td> {{ $cta_cte->fecha_documento }} </td>
										<td> {{ $cta_cte->movimiento_ctacte->descripcion }} </td>
										<td> {{ $cta_cte->valor }} </td>
										<td> {{ $saldo = $saldo + ($cta_cte->valor * ($cta_cte->movimiento_ctacte->signo) * -1) }} </td>
										<td>
							    			<a href="{{ route('cuenta_corriente.VerPagos.verpagos', $cta_cte->id) }}" class="btn btn-warning" target="_blank"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  </a>
							    		</td>
									</tr>	
								@endforeach	
									<tr>
										<td colspan="4" align="center"> <strong><h4>Deuda Capital</h4></strong> </td>
										<td colspan="1"> <strong><h4>${{ $saldo }}</h4></strong> </td>
									</tr>	
							    </tbody>
							  </table>
							</div>

						  </div>
						</div>
						@endforeach
				</div>
			</div>	
		</div>
	</div>	
@endsection							    	
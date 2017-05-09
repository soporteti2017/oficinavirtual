@extends('layouts.app')

@section('titulo', 'Detalle Carga')

@section('content')

	<div class="row">

		 <div class="col-md-12">	

		 	<div class="panel panel-default">


		        <div class="panel-body">
		        		@foreach($muestra_230 as $m_230) 
		        		<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title"><center><h3>DETALLE CARGA CORRIENTE CLIENTE: {{ $m_230->contrato_id }}</h3></center></h3>
						  </div>
						  <div class="panel-body">
							<div class="table-responsive">
							  <table class="table table-striped">
							    <thead>
							    	<th> {{ $m_230->descripcion }} </th>
							    	<th> INTERNET </th>
							    	<th> TV PREMIUM </th>
							    	<th> BOCAS ADICIONALES </th>
							    	<th> CARGOS ADICIONALES </th>
							    	<th> DESCUENTOS </th>
									<th> TOTAL </th>
							    </thead>
							    <tbody>
									<tr>
										<td> {{ $m_230->cable }} </td>
										<td> {{ $m_230->internet }} </td>
										<td> {{ $m_230->premium }} </td>
										<td> {{ $m_230->boca }} </td>
										<td> {{ $m_230->carga_adicional }} </td>
										<td> {{ $m_230->descuento }}</td>
										<td> {{ $m_230->valor_230 }}</td>
									</tr>		
							    </tbody>
							  </table>
							</div>

						  </div>
						</div>
						

						@if($m_230->carga_adicional > 0)
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title"><center><h3>DETALLE CARGAS ADICIONALES: </h3></center></h3>
						  </div>
						  <div class="panel-body">
							<div class="table-responsive">
							  <table class="table table-striped">
							    <thead>
							    	<th> ORDEN TRABAJO </th>
							    	<th> OBSERVACION </th>
									<th> USUARIO </th>
							    	<th> VALOR </th>
							    </thead>
							    <tbody>
									@foreach($cargas_adicionales as $carga_adicional)
										@if($carga_adicional->tipo_carga_adicional->descripcion == "Cargo")
										<tr>
											<td> {{ $carga_adicional->orden_trabajo_id }}</td>
											<td> {{ $carga_adicional->observacion }}</td>
											<td> {{ $carga_adicional->usuario->nombre }}</td>
											<td> {{ $carga_adicional->valor }}</td>
										</tr>
										@endif		
									@endforeach
							    </tbody>
							  </table>
							</div>

						  </div>
						</div>
					@endif


					@if($m_230->descuento > 0)
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title"><center><h3>DETALLE DESCUENTOS: </h3></center></h3>
						  </div>
						  <div class="panel-body">
							<div class="table-responsive">
							  <table class="table table-striped">
							    <thead>
							    	<th> EXCEPCIÓN </th>
							    	<th> OBSERVACION </th>
									<th> USUARIO </th>
							    	<th> VALOR </th>
							    </thead>
							    <tbody>
									@foreach($cargas_adicionales as $carga_adicional)
										@if($carga_adicional->tipo_carga_adicional->descripcion == "Descuento")
										<tr>
											<td>
												<a href="{{ route('usuarios.solicitudes.versolicitudes', $carga_adicional->orden_trabajo_id) }}" class="btn btn-warning"
												 target="_blank"> 
													{{ $carga_adicional->orden_trabajo_id }}
												</a>	
											</td>
											<td> {{ $carga_adicional->observacion }}</td>
											<td> {{ $carga_adicional->usuario->nombre }}</td>
											<td> {{ $carga_adicional->valor }}</td>
										</tr>
										@endif		
									@endforeach
							    </tbody>
							  </table>
							</div>

						  </div>
						</div>
					@endif

				@endforeach		
				</div>
			</div>	
		</div>
	</div>	
@endsection							    	
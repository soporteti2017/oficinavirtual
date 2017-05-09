
	<div class="row">

		 <div class="col-md-10">	

		 	<div class="panel panel-default">

		        <div class="panel-body">
		        		<img src="Imagenes/logo.png" height="80" width="80">
		        		@foreach($solicitudes as $solicitud)
		        		<center><h1> Excepción {{ $solicitud->id }}</h1></center> 
		        		<hr>
		        		<table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
						  <tr>
						    <td><strong><h3> CLIENTE: </h3></strong></td>
						    <td> {{ $solicitud->contrato_id }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> TIPO DE SOLICITUD: </h3></strong></td>
						    <td align="left">{{ $solicitud->tipo_solicitud->descripcion }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> SOLICITA: </h3></strong></td>
						    <td>{{ $solicitud->solicita }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> OBSERVACIÓN: </h3></strong></td>
						    <td>{{ $solicitud->observacion }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> SOLICITÓ: </h3></strong></td>
						    <td>{{ $solicitud->usuario->nombre }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> FECHA SOLICITUD: </h3></strong></td>
						    <td>{{ $solicitud->fecha }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> DETERMINÓ: </h3></strong></td>
						    <td>{{ $solicitud->autoriza_solicitud->autoriza }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> VALOR DESCUENTO: </h3></strong></td>
						    <td>{{ $solicitud->autoriza_solicitud->valor }}</td>
						  </tr>
						  <tr>
						    <td><strong><h3> EMPRESA: </h3></strong></td>
						    <td>{{ $solicitud->empresa->razon_social }}</td>
						  </tr>
						  <tr>
						    <td></td>
						    <td></td>
						  </tr>
						  <tr>
						    <td></td>
						    <td align="center"><img src="Imagenes/Firma.jpg" height="80" width="80"></td>
						  </tr>
						</table>

		        		@endforeach
				</div>
			</div>	
		</div>
	</div>	
					    	
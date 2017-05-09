

	<div class="row">

		 <div class="col-md-10">	

		 	<div class="panel panel-default">

		        <div class="panel-body">
		        		<img src="Imagenes/logo.png" height="50" width="50">
		        		<center><h3> Copia Boleta Fiscal {{ $venta->documento }}</h3></center> 
		        		<hr>
		        		<?php $subt = 0 ?>
		        		<table width="0" border="0" cellpadding="0" cellspacing="0">
							  <tr>
							    <td height="0" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
							      <h5 align="justify" >COPIA DE BOLETA</h5>
							      <h5 align="justify">COMERCIALIZADORA Y SERVICIOS UNO LTDA.</h5>
							      <h5 align="justify">CM: INDEPENDENCIA 458, OVALLE</h5>
							      <h5 align="justify">SUC: INDEPENDENCIA 458, OVALLE</h5>
							      <h5 align="justify">RUT Nro.: 77.123.870-K</h5>
							      <h5 align="justify">GIRO: COMPRA VTA. , ART. TELECOMUNICACIONES SERV.</h5>
							      <h5 align="justify">Boleta autorizada por el SII</h5>
							      <h5 align="justify">Res. SII Nro. 75 del 19 de junio del 2007</h5>
							      <h5 align="justify">Nro. Fiscal 177123870-73705</h5>
							      <h5 align="justify">Num Cliente: {{ $venta->contrato_id  }}</h5>
							      <h5 align="justify">Cliente: 
							      	{{ $venta->contrato->cliente->nombres. " ".$venta->contrato->cliente->paterno. " ".$venta->contrato->cliente->materno }}
							      </h5>
							      <h5 align="justify">Rut: {{ $venta->contrato->cliente->rut }} </h5>
      							  <h5 align="justify">Dir: 
      							  	{{ $venta->contrato->direccion->calle->calle. " ".$venta->contrato->direccion->numero. ", "
      							  		.$venta->contrato->direccion->calle->poblacion->poblacion }}
      							  </h5>
      							  <h5 align="justify">Nro. interno boleta : {{ $venta->documento }} </h5>
      							  @foreach($correinternos as $correinterno)
	  							  <h5 align="justify">Nro. Caja: {{ $caja }} &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  												Nro. Boleta: {{ $correinterno->ndocumento }}
	  							  </h5>
	  							  @endforeach
	  							  <h5 align="justify">Fecha: {{ $venta->fecha }} &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
	  												 Hora: {{ $venta->hora }}
	  							  </h5>	
							     </h5> 
							   </tr> 
							   
							   @foreach($vtas_detalles as $vta_detalle)

							   		<tr>
									  <td width="0" height="0" bordercolor="#FFFFFF">1,0000 X {{ $vta_detalle->valor_final }}</td>
									 </tr>
									 <tr>
									    <td width="0" height="0" bordercolor="#FFFFFF">{{ $vta_detalle->descripcion }}</td>
									    <td width="0" height="0" bordercolor="#FFFFFF">{{ $vta_detalle->valor_final }}</td>
									  </tr>
									  <?php $subt = $subt + $vta_detalle->valor_final ?>
							   @endforeach

							  <tr>
							    <td width="0" height="0" bordercolor="#FFFFFF">Subtotal</td>
							    <td width="0" height="0" bordercolor="#FFFFFF">{{ $subt }}</td>
							  </tr>
							  <tr>
							    <td width="0" height="0" bordercolor="#FFFFFF">TOTAL</td>
							    <td width="0" height="0" bordercolor="#FFFFFF">{{ $subt }}</td>
							  </tr>

							  @foreach($vtas_formas_pagos as $vta_fpago)

							   		<tr>
									   <td width="0" height="0" bordercolor="#FFFFFF">{{ $vta_fpago->forma_pago->descripcion }}</td>
    								   <td width="0" height="0" bordercolor="#FFFFFF">{{ $vta_fpago->valor }}</td>
									</tr>
							  @endforeach		 

							  <tr>
							    <td height="0" colspan="2" bordercolor="#FFFFFF">Atendido por: {{ $venta->usuario->nombre }}</td>
							  </tr>
							  <tr>
							    <td width="0" height="0" bordercolor="#FFFFFF">V: 4.02 Orion</td>
								<td width="0" height="0" bordercolor="#FFFFFF">Nro. de SERIE: P4WF009349</td>
							  </tr>

						</table>	     

				</div>
			</div>	
		</div>
	</div>	
					    	
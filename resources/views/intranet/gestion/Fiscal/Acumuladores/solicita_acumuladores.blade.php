@extends('layouts.app')

@section('titulo', 'Doc no Fiscal')

@section('content')
<html>
<head>
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
function solicita_avance()
{   

    
    com = "<?php echo $com_puertos; ?>";

   
    var consulta = $.ajax({
            type:'GET',
            url:'http://192.168.1.80/ServidorImpresion/Gestion/acumuladores.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
             if(jsonp.total_acumulado!==undefined){$('#acumuladores #total_acumuladores').val(jsonp.total_acumulado);}
             if(jsonp.total_nc!==undefined){$('#acumuladores #total_nc').val(jsonp.total_nc);}
             if(jsonp.total_pago_cuota!==undefined){$('#acumuladores #total_pago_cuota').val(jsonp.total_pago_cuota);}
             if(jsonp.total_recep_dinero!==undefined){$('#acumuladores #total_recep_dinero').val(jsonp.total_recep_dinero);}
             if(jsonp.ultimo_cierre_z!==undefined){$('#acumuladores #ultimo_cierre_z').val(jsonp.ultimo_cierre_z);}
             if(jsonp.ultima_intervencion!==undefined){$('#acumuladores #ultima_intervencion').val(jsonp.ultima_intervencion);}
             if(jsonp.ultima_boleta!==undefined){$('#acumuladores #ultima_boleta').val(jsonp.ultima_boleta);}
             if(jsonp.ultimo_cierre_cajero!==undefined){$('#acumuladores #ultimo_cierre_cajero').val(jsonp.ultimo_cierre_cajero);}
             if(jsonp.ultima_auditoria!==undefined){$('#acumuladores #ultima_auditoria').val(jsonp.ultima_auditoria);}
             if(jsonp.ultimo_doc_nofiscal!==undefined){$('#acumuladores #ultimo_doc_nofiscal').val(jsonp.ultimo_doc_nofiscal);}
             if(jsonp.ultimo_doc_nofiscal_homologado!==undefined){$('#acumuladores #ultimo_doc_nofiscal_homologado').val(jsonp.ultimo_doc_nofiscal_homologado);}
             if(jsonp.ultima_nc!==undefined){$('#acumuladores #ultima_nc').val(jsonp.ultima_nc);}
            return true; 
        }
         });
    
}   
</script>     
</head>

<body onload="solicita_avance()">

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
				  <div class="panel-heading"><strong>Acumuladores Impresora Fiscal:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Funciones.generadocnofiscal', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Total Acumulado: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_acumuladores', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Total Nota Crédito: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_nc', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Total Pago cuota: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_pago_cuota', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Total Recepción dinero: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_recep_dinero', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Último cierre z: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_cierre_z', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última intervención: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultima_intervencion', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última boleta: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultima_boleta', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última Cierre Cajero: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_cierre_cajero', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última auditoría: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultima_auditoria', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última Doc No Fiscal: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_doc_nofiscal', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última Doc No Fiscal Homologado: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_doc_nofiscal_homologado', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="acumuladores">
                                    {!! Form::label('texto', 'Última Nota de crédotp: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultima_nc', 'disabled' => true ]) !!}
                                </div>
                            </div>
                        </div>
                        

                    {!! Form::close() !!}


				  </div>
				</div>
		 		
		    </div>

<div id="estado">
</div>
</body>
</html>
@endsection
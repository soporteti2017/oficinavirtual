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
            url:'http://192.168.1.80/ServidorImpresion/Gestion/fiscalcurso.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
             if(jsonp.fecha_apertura!==undefined){$('#fiscalcurso #fecha_apertura').val(jsonp.fecha_apertura);}
             if(jsonp.hora_apertura!==undefined){$('#fiscalcurso #hora_apertura').val(jsonp.hora_apertura);}
             if(jsonp.ultimo_cierre_z!==undefined){$('#fiscalcurso #ultimo_cierre_z').val(jsonp.ultimo_cierre_z);}
             if(jsonp.primera_boleta!==undefined){$('#fiscalcurso #primera_boleta').val(jsonp.primera_boleta);}
             if(jsonp.ultima_boleta!==undefined){$('#fiscalcurso #ultima_boleta').val(jsonp.ultima_boleta);}
             if(jsonp.ultimo_doc_nofiscal!==undefined){$('#fiscalcurso #ultimo_doc_nofiscal').val(jsonp.ultimo_doc_nofiscal);}
             if(jsonp.ultimo_doc_nofiscal_homologado!==undefined){$('#fiscalcurso #ultimo_doc_nofiscal_homologado').val(jsonp.ultimo_doc_nofiscal_homologado);}
             if(jsonp.total_ventas!==undefined){$('#fiscalcurso #total_ventas').val(jsonp.total_ventas);}
             if(jsonp.total_impuesto!==undefined){$('#fiscalcurso #total_impuesto').val(jsonp.total_impuesto);}
             if(jsonp.total_pagado!==undefined){$('#fiscalcurso #total_pagado').val(jsonp.total_pagado);}
             if(jsonp.total_donaciones!==undefined){$('#fiscalcurso #total_donaciones').val(jsonp.total_donaciones);}
             if(jsonp.cantidad_df!==undefined){$('#fiscalcurso #cantidad_df').val(jsonp.cantidad_df);}
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
				  <div class="panel-heading"><strong>Fiscal en curso:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Funciones.generadocnofiscal', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Fecha Apertura: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'fecha_apertura', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Hora Apertura: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'hora_apertura', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Último cierre Z: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_cierre_z', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Primera Boleta: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'primera_boleta', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Última boleta: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultima_boleta', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Último Documento no fiscal: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_doc_nofiscal', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Último Documento no fiscal homologado: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'ultimo_doc_nofiscal_homologado', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Total ventas: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_ventas', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Total impuesto: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_impuesto', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Total pagado: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_pagado', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Total donaciones: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'total_donaciones', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fiscalcurso">
                                    {!! Form::label('texto', 'Cantidad Notas de créditos: ') !!}
                                    {!! Form::text('texto', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'cantidad_df', 'disabled' => true ]) !!}
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
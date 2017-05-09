@extends('layouts.app')

@section('titulo', 'Ver Fecha y Hora')

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
            url:'http://192.168.1.80/ServidorImpresion/Gestion/ver_fecha.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
             if(jsonp.fecha!==undefined){$('#fecha_hora #fecha').val(jsonp.fecha);}
             if(jsonp.hora!==undefined){$('#fecha_hora #hora').val(jsonp.hora);}
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
				  <div class="panel-heading"><strong>Fecha y Hora:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Funciones.generadocnofiscal', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="fecha_hora">
                                    {!! Form::label('fecha', 'Fecha: ') !!}
                                    {!! Form::text('fecha', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'fecha', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="fecha_hora">
                                    {!! Form::label('hora', 'Hora: ') !!}
                                    {!! Form::text('hora', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'hora', 'disabled' => true ]) !!}
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
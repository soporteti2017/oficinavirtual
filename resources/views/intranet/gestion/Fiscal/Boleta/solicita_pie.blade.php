@extends('layouts.app')

@section('titulo', 'Encabezado de Boleta')

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
            url:'http://192.168.1.80/ServidorImpresion/Gestion/pie.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
             if(jsonp.linea1!==undefined){$('#encabezado #linea1').val(jsonp.linea1);}
             if(jsonp.linea2!==undefined){$('#encabezado #linea2').val(jsonp.linea2);}
             if(jsonp.linea3!==undefined){$('#encabezado #linea3').val(jsonp.linea3);}
             if(jsonp.linea4!==undefined){$('#encabezado #linea4').val(jsonp.linea4);}
             if(jsonp.linea5!==undefined){$('#encabezado #linea5').val(jsonp.linea5);}
             if(jsonp.linea6!==undefined){$('#encabezado #linea6').val(jsonp.linea6);}
             if(jsonp.linea7!==undefined){$('#encabezado #linea7').val(jsonp.linea7);}
             if(jsonp.linea8!==undefined){$('#encabezado #linea8').val(jsonp.linea8);}
             if(jsonp.linea9!==undefined){$('#encabezado #linea9').val(jsonp.linea9);}
             if(jsonp.linea10!==undefined){$('#encabezado #linea10').val(jsonp.linea10);}

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
				  <div class="panel-heading"><strong>Pie de Boleta:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Funciones.generadocnofiscal', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea1', 'Línea 1: ') !!}
                                    {!! Form::text('linea1', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea1', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea2', 'Línea 2: ') !!}
                                    {!! Form::text('linea2', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea2', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea3', 'Línea 3: ') !!}
                                    {!! Form::text('linea3', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea3', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea4', 'Línea 4: ') !!}
                                    {!! Form::text('linea4', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea4', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea5', 'Línea 5: ') !!}
                                    {!! Form::text('linea5', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea5', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea6', 'Línea 6: ') !!}
                                    {!! Form::text('linea6', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea6', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea7', 'Línea 7: ') !!}
                                    {!! Form::text('linea7', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea7', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea8', 'Línea 8: ') !!}
                                    {!! Form::text('linea8', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea8', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea9', 'Línea 9: ') !!}
                                    {!! Form::text('linea9', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea9', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="encabezado">
                                    {!! Form::label('linea10', 'Línea 10: ') !!}
                                    {!! Form::text('linea10', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea10', 'disabled' => true ]) !!}
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
@extends('layouts.app')

@section('titulo', 'Tipos de Pagos')

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
            url:'http://192.168.1.80/ServidorImpresion/Gestion/tipo_pago.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
             if(jsonp.linea1!==undefined){$('#tipo_pago #linea1').val(jsonp.linea1);}
             if(jsonp.linea2!==undefined){$('#tipo_pago #linea2').val(jsonp.linea2);}
             if(jsonp.linea3!==undefined){$('#tipo_pago #linea3').val(jsonp.linea3);}
             if(jsonp.linea4!==undefined){$('#tipo_pago #linea4').val(jsonp.linea4);}
             if(jsonp.linea5!==undefined){$('#tipo_pago #linea5').val(jsonp.linea5);}
             if(jsonp.linea6!==undefined){$('#tipo_pago #linea6').val(jsonp.linea6);}
             if(jsonp.linea7!==undefined){$('#tipo_pago #linea7').val(jsonp.linea7);}
             if(jsonp.linea8!==undefined){$('#tipo_pago #linea8').val(jsonp.linea8);}
             if(jsonp.linea9!==undefined){$('#tipo_pago #linea9').val(jsonp.linea9);}
             if(jsonp.linea10!==undefined){$('#tipo_pago #linea10').val(jsonp.linea10);}
             if(jsonp.linea11!==undefined){$('#tipo_pago #linea11').val(jsonp.linea11);}
             if(jsonp.linea12!==undefined){$('#tipo_pago #linea12').val(jsonp.linea12);}
             if(jsonp.linea13!==undefined){$('#tipo_pago #linea13').val(jsonp.linea13);}
             if(jsonp.linea14!==undefined){$('#tipo_pago #linea14').val(jsonp.linea14);}
             if(jsonp.linea15!==undefined){$('#tipo_pago #linea15').val(jsonp.linea15);}
             if(jsonp.linea16!==undefined){$('#tipo_pago #linea16').val(jsonp.linea16);}
             if(jsonp.linea17!==undefined){$('#tipo_pago #linea17').val(jsonp.linea17);}
             if(jsonp.linea18!==undefined){$('#tipo_pago #linea18').val(jsonp.linea18);}
             if(jsonp.linea19!==undefined){$('#tipo_pago #linea19').val(jsonp.linea19);}
             if(jsonp.linea20!==undefined){$('#tipo_pago #linea20').val(jsonp.linea20);}
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
				  <div class="panel-heading"><strong>Tipos de Pago:</strong> </div>
				  <div class="panel-body">
				    
				  	{!! Form::open(['route' => 'gestion.Fiscal.Funciones.generadocnofiscal', 'method' => 'POST'])  !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea1', 'Línea 1: ') !!}
                                    {!! Form::text('linea1', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea1', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea2', 'Línea 2: ') !!}
                                    {!! Form::text('linea2', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea2', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea3', 'Línea 3: ') !!}
                                    {!! Form::text('linea3', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea3', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea4', 'Línea 4: ') !!}
                                    {!! Form::text('linea4', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea4', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea5', 'Línea 5: ') !!}
                                    {!! Form::text('linea5', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea5', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea6', 'Línea 6: ') !!}
                                    {!! Form::text('linea6', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea6', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea7', 'Línea 7: ') !!}
                                    {!! Form::text('linea7', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea7', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea8', 'Línea 8: ') !!}
                                    {!! Form::text('linea8', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea8', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea9', 'Línea 9: ') !!}
                                    {!! Form::text('linea9', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea9', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea10', 'Línea 10: ') !!}
                                    {!! Form::text('linea10', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea10', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea11', 'Línea 11: ') !!}
                                    {!! Form::text('linea11', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea11', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea12', 'Línea 12: ') !!}
                                    {!! Form::text('linea12', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea12', 'disabled' => true ]) !!}
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea13', 'Línea 13: ') !!}
                                    {!! Form::text('linea13', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea13', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea14', 'Línea 14: ') !!}
                                    {!! Form::text('linea14', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea14', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea15', 'Línea 15: ') !!}
                                    {!! Form::text('linea15', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea15', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea16', 'Línea 16: ') !!}
                                    {!! Form::text('linea16', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea16', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea17', 'Línea 17: ') !!}
                                    {!! Form::text('linea17', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea17', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea18', 'Línea 18: ') !!}
                                    {!! Form::text('linea18', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea18', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea19', 'Línea 19: ') !!}
                                    {!! Form::text('linea19', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea19', 'disabled' => true ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="tipo_pago">
                                    {!! Form::label('linea20', 'Línea 20: ') !!}
                                    {!! Form::text('linea20', null, ['class' => 'form-control', 'required', 
                                                    'id' => 'linea20', 'disabled' => true ]) !!}
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
<html>
<head>
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
function solicita_avance()
{   

    
    com = "<?php echo $com_puertos; ?>";
    tipo_informe = "<?php echo $tipo_informe; ?>";
    fecha_inicial = "<?php echo $fecha_inicial; ?>";
    fecha_final = "<?php echo $fecha_final; ?>";
   
    var consulta = $.ajax({
            type:'GET',
            url:'http://192.168.1.80/ServidorImpresion/Gestion/cierrez_fecha.php',
            data:"com="+com+"&fecha_inicial="+fecha_inicial+"&fecha_final="+fecha_final+"&tipo_informe="+tipo_informe,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
            alert(jsonp.mensaje);
            location.href = 'http://192.168.1.203:8000/intranet/gestion/Fiscal/ReporteElectronico/Cierrez/cierrez_fecha'; 
        }
         });
    
}   
</script>     
</head>

<body onload="solicita_avance()">




<div id="estado">
</div>
</body>
</html>
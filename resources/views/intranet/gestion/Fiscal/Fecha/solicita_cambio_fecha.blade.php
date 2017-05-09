<html>
<head>
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
function solicita_avance()
{   

    
    com = "<?php echo $com_puertos; ?>";
    fecha = "<?php echo $fecha; ?>";
    hora = "<?php echo $hora; ?>";
   
    var consulta = $.ajax({
            type:'GET',
            url:'http://192.168.1.80/ServidorImpresion/Gestion/cambiar_fecha_hora.php',
            data:"com="+com+"&fecha="+fecha+"&hora="+hora,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
            alert(jsonp.mensaje);
            location.href = 'http://192.168.1.203:8000/intranet/gestion/Fiscal/Fecha/cambiar_fecha'; 
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
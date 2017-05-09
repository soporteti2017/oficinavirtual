<html>
<head>
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
function solicita_avance()
{   

    
    com = "<?php echo $com_puertos; ?>";
   
    var consulta = $.ajax({
            type:'GET',
            url:'http://192.168.1.80/ServidorImpresion/Gestion/cierre_z.php',
            data:"com="+com,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
            alert(jsonp.mensaje);
            location.href = 'http://192.168.1.203:8000/intranet/gestion/Fiscal/ReportesEmitidos/cierre_z'; 
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
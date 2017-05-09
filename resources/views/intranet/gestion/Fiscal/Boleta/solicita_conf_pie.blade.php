<html>
<head>
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
function solicita_avance()
{   

    
    com = "<?php echo $com_puertos; ?>";
    linea1 = "<?php echo $linea1; ?>";
    linea2 = "<?php echo $linea2; ?>";
    linea3 = "<?php echo $linea3; ?>";
    linea4 = "<?php echo $linea4; ?>";
    linea5 = "<?php echo $linea5; ?>";
    linea6 = "<?php echo $linea6; ?>";
    linea7 = "<?php echo $linea7; ?>";
    linea8 = "<?php echo $linea8; ?>";
    linea9 = "<?php echo $linea9; ?>";
    linea10 = "<?php echo $linea10; ?>";
   
    var consulta = $.ajax({
            type:'GET',
            url:'http://192.168.1.80/ServidorImpresion/Gestion/configura_pie.php',
            data:"com="+com+"&linea1="+linea1+"&linea2="+linea2+"&linea3="+linea3+"&linea4="+linea4+"&linea5="+linea5
                +"&linea6="+linea6+"&linea7="+linea7+"&linea8="+linea8+"&linea9="+linea9+"&linea10="+linea10,
            dataType:'jsonp',
            jsonp: 'callback',//nombre de la variable get para reconocer la petición
        error: function(xhr, status, error) {
            alert("error");
        },
        success: function(jsonp) { 
            alert(jsonp.mensaje);
            location.href = 'http://192.168.1.203:8000/intranet/gestion/Fiscal/Boleta/configura_pie'; 
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

        
    
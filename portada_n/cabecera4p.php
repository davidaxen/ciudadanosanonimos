<?php  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="html" lang="es-ES">
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - SISTEMA PARA CONTROL Y GESTION DE EMPRESAS</title>


<?php if ($dispositivo=='movil'){;?>
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">

<?php };?>

		<!--<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />-->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../estilo/estilonuevo.php" type="text/css" media="screen" >
		    <link rel="stylesheet" href="../tablesorter/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />
    <script type="text/javascript" src="../tablesorter/jquery-latest.js"></script> 
    <script type="text/javascript" src="../tablesorter/jquery.tablesorter.js"></script>
    
    
<script type="text/javascript">

$(document).ready(function() { 
    // call the tablesorter plugin, the magic happens in the markup 
    $("#tablestyle").tablesorter(); 
    //assign the sortStart event 
    $("#tablestyle").bind("sortStart",function() { 
        $("#overlay").show(); 
    }).bind("sortEnd",function() { 
        $("#overlay").hide(); 
    }); 
}); 

$(document).ready(function() { 
    // call the tablesorter plugin, the magic happens in the markup 
    $("#tablestyle2").tablesorter(); 
    //assign the sortStart event 
    $("#tablestyle2").bind("sortStart",function() { 
        $("#overlay").show(); 
    }).bind("sortEnd",function() { 
        $("#overlay").hide(); 
    }); 
}); 

$(document).ready(function() { 
    // call the tablesorter plugin, the magic happens in the markup 
    $("#tablestyle3").tablesorter(); 
    //assign the sortStart event 
    $("#tablestyle3").bind("sortStart",function() { 
        $("#overlay").show(); 
    }).bind("sortEnd",function() { 
        $("#overlay").hide(); 
    }); 
}); 

$(document).ready(function() { 
    // call the tablesorter plugin, the magic happens in the markup 
    $("#tablestyle4").tablesorter(); 
    //assign the sortStart event 
    $("#tablestyle4").bind("sortStart",function() { 
        $("#overlay").show(); 
    }).bind("sortEnd",function() { 
        $("#overlay").hide(); 
    }); 
}); 


    
    
</script>
</head>



<body>

<div class="encabezado">
<img src="../img/<?php  echo $imgpr;?>">
<div class="cartel" ><?php  include('../menu_n/cartel.php');?>
<?php if ($dispositivo=='movil'){;?>
<?php  include('../menu_n/submenumovil.php');?>
<?php }else{;?>
<?php  include('../menu_n/submenu.php');?>
<?php };?>
</div>
</div>
<div class="pie"></div>

   <?php if ($dispositivo!='movil'){;?>
<div class="colocacion izquierda">
<?php  include('../menu_n/menulateralp.php');?>
</div>
<?php };?>
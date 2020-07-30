<?php

           

if (isset($_GET[compactada]))
 {
      $a=stripslashes ($_GET[compactada]);
      $mi_array=unserialize($a);
      $compactada=serialize($mi_array);
			$compactada=urlencode($compactada);

}             
$user=$mi_array['user'];        
$pass=$mi_array['pass']; 
$com=$mi_array['com']; 
$img=$mi_array['img']; 
$nemp=$mi_array['nemp']; 

if ($com=='comprobacion'){;
date_default_timezone_set('Europe/Madrid');
$dbh=mysqli_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysqli_error());
mysqli_select_db ("pisciso_facturacion");




$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
$result1=mysqli_query ($conn,$conn,$sql1) or die ("Invalid result empresas");

$fact=mysqli_result($result1,0,'facturacion');
$empl=mysqli_result($result1,0,'empleados');
$cont=mysqli_result($result1,0,'contabilidad');
$util=mysqli_result($result1,0,'utilidades');
$exist=mysqli_result($result1,0,'existencias');
$trab=mysqli_result($result1,0,'trabajadores');
$vpunt=mysqli_result($result1,0,'verpuntcont');
$piscina=mysqli_result($result1,0,'piscina');
$limpieza=mysqli_result($result1,0,'limpieza');
$vigil=mysqli_result($result1,0,'vigilancia');
$person=mysqli_result($result1,0,'personalizado');
$datlat=mysqli_result($result1,0,'datoslateral');


setcookie("fact",$fact);
setcookie("empl",$empl);
setcookie("cont",$cont);
setcookie("util",$util);
setcookie("exist",$exist);
setcookie("trab",$trab);
setcookie("vpunt",$vpunt);
setcookie("piscina",$piscina);
setcookie("limpieza",$limpieza);
setcookie("vigil",$vigil);
setcookie("person",$person);

$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
$result10=mysqli_query ($conn,$conn,$sql10) or die ("Invalid result empresas");
$row10=mysqli_affected_rows();

if ($row10==1){;
$dia1="Bienvenido";
$hora1="";
}else{;
$dia1=mysqli_result($result10,1,'dia');
$hora1=mysqli_result($result10,1,'hora');
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script>
function funciones(){
top.document.cerrar=true;
top.document.location.href="<?php  echo $web;?>";
};
</script>
<html>
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - PROGRAMA DE FACTURACION Y GESTION DE LA EMPRESA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="estilo/reset-min.css">
		<link rel="stylesheet" href="estilo/style.css" type="text/css" media="screen" href="indexprueba33m.php" charset="utf-8" />
		<link rel="stylesheet" href="estilo/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="estilo/print.css" type="text/css" media="print" charset="utf-8" />
			<!--[if lt IE 7]>
			<link rel="stylesheet" href="css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->
 <style type="text/css">


</style>
		
</head>
<body>


   		
<div id="logo2"><img src="../img/<?php  echo $img;?>" width=200 height=60 border=0></div> 		    

		<!-- BEGIN Menu -->
   <div id="submenu00" ><ul id="nav">
<!-- FACTURACION --><?php if ($fact=="1"){?><a href="facturacionm.php?compactada=<?php  echo $compactada;?>">Facturacion</a><br><?php };?><!-- FIN FACTURACION -->
<!-- EMPLEADOS --><?php if ($empl=="1"){?><a href="empleadosm.php?compactada=<?php  echo $compactada;?>">Empleados</a><br><?php };?><!-- FIN EMPLEADOS -->		
<!-- CONTABILIDAD --><?php if ($cont=="1"){?><a href="contabilidadm.php?compactada=<?php  echo $compactada;?>">Contabilidad</a><br><?php };?><!-- FIN CONTABILIDAD -->
<!-- EXISTENCIAS --><?php if ($exist=="1"){?><a href="existenciasm.php?compactada=<?php  echo $compactada;?>">Existencias</a><br><?php };?><!-- FIN EXISTENCIAS -->			
<!-- UTILIDADES --><?php if ($util=="1"){?><a href="utilidadesm.php?compactada=<?php  echo $compactada;?>">Uitlidades</a><br><?php };?><!-- FIN UTILIDADES -->
<!-- PERSONALIZADOS --><?php if ($person=="1"){?><a href="personalizadosm.php?compactada=<?php  echo $compactada;?>">Personalizados</a><br><?php };?><!-- FIN PERSONALIZADOS-->
<!-- TRABAJADORES --><?php if ($trab=="1"){?><a href="trabajadoresm.php?compactada=<?php  echo $compactada;?>">Trabajadores</a><br><?php };?><!-- FIN TRABAJADORES-->
<!-- PUNTOS DE CONTROL --><?php if ($vpunt=="1"){?><a href="puntoscontrolm.php?compactada=<?php  echo $compactada;?>">Puntos de Control</a><br><?php };?><!-- FIN PUNTOS DE CONTROL-->
		</ul></div>	
		<!-- END Menu -->


	  


       
	<div id="footer" >
	    <a href="" target="_blank" title="admiservi s.l.">ADMISERVI S.L.</a><a> EMPRESA DESARROLLADORA </a><a href="" target="_blank" title="">CONTACTO</a>
	    <br>
	    <img alt="cerrar" border="0" src="../img/cerrarConexion.gif" onclick="javascript:funciones()" valing="middle"><a>Ultima Conexión: <?php  echo $dia1;?> - <?php  echo $hora1;?></a>
    </div>
	




</body>

</html>
<?php }else{;?>
<html>
<head>
<title>
Pagina de Acceso a Opciones de Gestión de Fincas
</title>
<link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<img src="../img/logo.gif" height=80>
<p> </p>
<center>No tiene permisos para acceder a la pagina</center>
<a href="http://facturacion.admiservi.es">Ir al inicio</a>
<?php };?>
</body>

</html>

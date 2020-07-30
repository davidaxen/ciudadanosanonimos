<?php  
include('bbdd.php');

if ($ide!=null){;

if ($devuelto==1){;

 include('../portada_n/cabecera4p.php');
 
 }else{;
 
  include('portada_n/cabecera4p.php');
  };
  ?>



<div id="main">
<div class="titulo">
<p class="enc">HEMOS DETECTADO LA SIGUIENTE COMPRA PENDIENTE</p>
</div>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>
<?php 
$sqlprep="select * from previopago where idempresas='".$ide."'";
$resultprep=mysqli_query ($conn,$sqlprep) or die ("Invalid resultprep");
$idpr=mysqli_result($resultprep,0,'idproyectos');
$opcion=mysqli_result($resultprep,0,'opcion');

 

$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');



$sqlpn="select * from proyectosnombre where idproyectos='".$idpr."'";
//echo $sqlpn;
$resultpn=mysqli_query ($conn,$sqlpn) or die ("Invalid resultpn");
for ($pn=0;$pn<count($dat);$pn++){;
$encab[$pn]=mysqli_result($resultpn,0,$dat[$pn]);
};
//print_r($encab);

$sqlopc="select * from precioopc where idpr='".$idpr."' and idopcion='".$opcion."'";
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
$jopc=0;
$nombreopc=mysqli_result($resultopc,$jopc,'nombre');
$precio=mysqli_result($resultopc,$jopc,'precio');
$caracprecioopc=mysqli_result($resultopc,$jopc,'caracprecio');
$variablesopc=mysqli_result($resultopc,$jopc,'variables');


$caracopc="<div id='divicolumna22'>";
$caracopc.="<ul>";
for ($t=0;$t<count($encab);$t++){;
$vcar=mysqli_result($resultopc,$jopc,$dat[$t]);
if($vcar=='1'){
$caracopc.="<li>".$encab[$t]."</li>";
$caracopc.="<input type='hidden' name='".$dat[$t]."' value='1'>";
};
};
$caracopc.="</ul></div>";



$sqliva="select * from iva order by fecha desc";
$resultiva=mysqli_query ($conn,$sqliva) or die ("Invalid resultiva");
$jiva=0;
$iva=mysqli_result($resultiva,$jiva,'iva');

$precioiva=($precio*($iva/100))+$precio;

?>


<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,6)"><div class="menup" id="menu1">Comprar</div></a></td>
</tr>
</table>
</div>

<div class="pos71" id="ver1" >

<h4>Estimado Cliente:</h4>
<b>Ha seleccionado el siguiente Producto:</b><br/>
Producto Seleccionado: <?php  echostrtoupper($nombreopc);?><br/>
Precio sin iva: <?php  echo$precio;?> <?php  echo$caracprecioopc;?><br/>
IVA aplicable: <?php  echo$iva;?>%<br/>
Precio con iva:<?php  echo$precioiva;?> <?php  echo$caracprecioopc;?><br/>
<b>Con los siguientes servicios y caracteristicas:</b><br/>
<?php  echo$caracopc;?>


	
<?php 

session_start();
$nombrepro=mysqli_result($resultpro,0,'nombre');
$producto=strtoupper($nombrepro).' '.strtoupper($nombreopc);
//if (!$_SESSION["precio"] && !$_SESSION["producto"]){
	$_SESSION["precio"] = $precioiva;
	$_SESSION["producto"] = $producto;
//}


//echo $producto." ".$precio;

?>
<div id="main">
<span>
<?php if ($devuelto==1){;?>
<form action="comser.php" method="post">
<?php }else{;?>
<form action="administracion_n/comser.php" method="post">
<?php };?>


<input type="hidden" name="opcion" value="<?php  echo$opcion;?>">
<?php  echo$variablesopc;?>
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>
</span>
<span>

<?php if ($devuelto==1){;?>
<form action="precompra.php" method="post">
<?php }else{;?>
<form action="administracion_n/precompra.php" method="post">
<?php };?>

<input type="submit" name="modificar" value="Modificar Compra">
</form>
</span>
</div>


</div>



</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

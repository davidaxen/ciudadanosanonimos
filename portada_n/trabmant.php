<?php   
include('bbdd.php');
/*
$fecha=$_GET["fecha"];
$idpccat=$_GET["idpccat"];
*/
$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$fechac=$dia.'/'.$mes.'/'.$año;

$sql1="SELECT * from almpc where dia='".$fecha."' and idempresas='".$ide."' and idpccat='4' order by id,idempleado"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_affected_rows();


if ($ide!=null){;

include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">Acciones de Mantenimiento, el dia:<?php  echo $fechac;?></p>
</div>
<div class="contenido">
<table border="1">
<tr><td colspan=6 class="enc"></td></tr>
<tr><td>Personal</td><td>Telefonos</td><td>Puesto de Trabajo</td><td>Hora</td><td>Tipo</td><td>Mapa</td></tr>
<?php for ($j=0;$j<$row1;$j++){;
$idempleado=mysqli_result($result1,$j,'idempleado');
$idpiscina=mysqli_result($result1,$j,'idpiscina');
$hora=mysqli_result($result1,$j,'hora');
$idpcsubcat=mysqli_result($result1,$j,'idpcsubcat');
$tiempo=mysqli_result($result1,$j,'tiempo');
$lat=mysqli_result($result1,$j,'lat');
$lon=mysqli_result($result1,$j,'lon');

$sql12="SELECT * from pcsubcat where idpccat='4' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$subcategoria=mysqli_result($result12,0,'subcategoria');


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=mysqli_result($result10,0,'nombre');
$priape=mysqli_result($result10,0,'1apellido');
$segape=mysqli_result($result10,0,'2apellido');
$tele1=mysqli_result($result10,0,'tele1');
$tele2=mysqli_result($result10,0,'tele2');
$nombretrab=$nombre.' '.$priape.' '.$segape;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=mysqli_result($result11,0,'nombre');

?>
<tr><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td></tr>
<?php };?>
</table>
<p>
<img border="0" alt="imprimir" class="nover" src="../img/printer.png" onclick="javascript:window.print()">
</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>



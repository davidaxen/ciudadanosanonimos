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

$sql1="SELECT * from almpc where dia='".$fecha."' and idempresas='".$ide."' and idpccat='2' order by idempleado"; 

$result1=$conn->query($sql1);
$resul1tmos=$conn->query($sql);
$num_rows=$result1->fetchAll();
$row1=count($num_rows);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_affected_rows();


if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">Niveles de la piscina, el dia:<?php  echo $fechac;?></p>
</div>
<div class="contenido">
<table border="1">
<tr class="subenc6"><td>Personal</td><td>Telefonos</td><td>Puesto de Trabajo</td><td>Hora</td><td>Tipo</td><td>Mapa</td></tr>
<?php 

foreach ($resul1tmos as $row1) {

//for ($j=0;$j<$row1;$j++){;
$idempleado=$row1['idempleado'];
$idpiscina=$row1['idpiscina'];
$hora=$row1['hora'];
$idpcsubcat=$row1['idpcsubcat'];
$tiempo=$row1['tiempo'];
$lat=$row1['lat'];
$lon=$row1['lon'];

$sql12="SELECT * from pcsubcat where idpccat='2' and idpcsubcat='".$idpcsubcat."'"; 
//$result12=mysqli_query($conn,$sql12) or die ("Invalid result 10");

$result12=$conn->query($sql12);
$num_rows=$result12->fetchAll();
$row=count($num_rows);

$subcategoria=$num_rows[0]['subcategoria'];
$rellr=dechex($num_rows[0]['rellr']);
$rellg=dechex($num_rows[0]['rellg']);
$rellb=dechex($num_rows[0]['rellb']);


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 

$result10=$conn->query($sql10);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$tele1=$num_rows[0]['tele1'];
$tele2=$num_rows[0]['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];

?>
<tr class="subenc7"><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td bgcolor="#<?php  echo $rellr;?><?php  echo $rellg;?><?php  echo $rellb;?>"><?php  echo strtoupper($subcategoria);?></td>
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


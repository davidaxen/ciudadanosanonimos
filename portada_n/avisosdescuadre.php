<?php   
include('bbdd.php');

$fechaa=time();


$fechaact=date('Y-m-d', $fechaa);


$sql1="SELECT * from puntservicios where  idempresas='".$ide."' and idpccat='2'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);


?>
<script>
function refrescar1()
{
	window.location.reload();
}
</script>
<style type="text/css" media="print">
.nover {display:none}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
	   <!--<link rel="stylesheet" href="/estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />-->
	   
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body  onload="setTimeout('refrescar1()', 5000);">
<table>
<tr class="enctab"><td>Puesto de Trabajo</td><td>Empleado</td><td>Accion</td><td>Dia</td><td>Hora</td><td>Mapa</td><td>Datos</td></tr>

<?php 
for ($jh=0;$jh<$row1;$jh++){;
mysqli_data_seek($result1,$jh);
$resultado1=mysqli_fetch_array($result1);
$idpcsubcat=$resultado1['idpcsubcat'];
$p1=$resultado1['p1'];
$p5=$resultado1['p5'];



$sql11="SELECT * from almpc where  idempresas='".$ide."' and idpccat='2' and idpcsubcat='".$idpcsubcat."' and cantidad >'".$p5."' and dia>='".$fechaact."' union SELECT * from almpc where  idempresas='".$ide."' and idpccat='2' and idpcsubcat='".$idpcsubcat."' and cantidad <'".$p1."' and dia>='".$fechaact."' order by dia desc"; 
//echo $sql10;
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$row11=mysqli_num_rows($result11);

for ($j=0;$j<$row11;$j++){;
mysqli_data_seek($result11,$j);
$resultado11=mysqli_fetch_array($result11);
$idempleado=$resultado11['idempleado'];
$idpiscina=$resultado11['idpiscina'];
$dia=$resultado11['dia'];
$hora=$resultado11['hora'];
$idpccat=$resultado11['idpccat'];
$idpcsubcat=$resultado11['idpcsubcat'];
$tiempo=$resultado11['tiempo'];
$lat=$resultado11['lat'];
$lon=$resultado11['lon'];
$cantidad=$resultado11['cantidad'];
$otro=$resultado11['otro'];

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 12");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$tele1=$resultado10['tele1'];
$tele2=$resultado10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql13="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result 13");
$resultado13=mysqli_fetch_array($result13);
$nombrecom=$resultado13['nombre'];


$f=fmod($j,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>

<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>

<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>" target="_parent"><img src="../img/modificar.gif" width="25px"></a>
</td>
<td><?php if($cantidad!=0){;?><?php  echo strtoupper($cantidad);?><?php };?></td>
</tr>
<?php };?>
<?php };?>
</table>
</body>

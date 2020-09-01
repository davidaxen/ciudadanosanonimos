<?php   
error_reporting(0);

include('bbdd.php');

$fecha=$_GET["fecha"];

$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$fechac=$dia.'/'.$mes.'/'.$año;
$fechac='20/08/2015';

$mesa=str_split($mes);

if ($mesa[0]==0){;
$mes=$mesa[1];
};
//dia='".$fechac."' and

$sql="SELECT * from mensajes where idempresa=:ide and fechafin>:fechac or fechafin is null order by fechafin desc";

$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->bindParam(':fechac',$fechac);
$result->execute();
$resultado=$result->fetch();

foreach ($result as $rowmos) {

	$idmensaje=$rowmos['id'];
	$fechafin=$rowmos['fechafin'];
	$texto=$rowmos['texto'];
?>
<div style="font-size: 15px">
<?php  echo $texto;?>
<div>
<br>
<?php

$sql10="SELECT * from respuestamensajes where idempresa=:ide and idmensaje=:idmensaje";

$result10=$conn->prepare($sql10);
$result10->bindParam(':ide',$ide);
$result10->bindParam(':idmensaje',$idmensaje);
$result10->execute();

$row10=count($result10->fetchAll());
if ($row10==0){
?>
<?php } ?>

<?php } ?>

<?php

//$sql1="SELECT * from almpcinci where  idempresas='".$ide."' and idempleado='".$idtrab."' order by tiempo desc, hora desc limit 0,5";
//$result1=$conn->query($sql1);
//$result1mos=$conn->query($sql1);
//$row1=count($result1->fetchAll());

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

//$sql01="SELECT * from categorias where idpccat='".$idpccat."'";
//$result01=$conn->query($sql01);
//$resultado01=$result01->fetch();

/*$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$resultado01=mysqli_fetch_array($result01);*/
//$categoria=$resultado01['nombre'];



?>
<script>
function refrescar()
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
<!--<body onload="setTimeout('refrescar()', 5000);">-->

<table>

<?php 
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);*/
/*foreach ($result1mos as $row1mos) {
$idempleado=$row1mos['idempleado'];
$idpiscina=$row1mos['idpiscina'];
$dia=$row1mos['dia'];
$hora=$row1mos['hora'];
$tiempo=$row1mos['tiempo'];
$lat=$row1mos['lat'];
$lon=$row1mos['lon'];
$texto=$row1mos['texto'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";
$result10=$conn->query($sql10);
$resultado10=$result10->fetch();

$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$nombretrab=$nombre.' '.$priape.' '.$segape;


$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'";
$result11=$conn->query($sql11);
$result11mos=$conn->query($sql11);
$row11=count($result11->fetchAll());



if ($row11==0){;
$nombrecom="Fuera de Puesto";
}else{;
$resultado11=$result11mos->fetch();
//$resultado11=mysqli_fetch_array($result11);
$nombrecom=$resultado11['nombre'];
};
$f=fmod($j,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>

<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>
<td><?php  echo strtoupper($texto);?></td>
<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idpiscina;?>&descripcion=<?php  echo $texto;?>" target="_parent"><img src="../img/asignacion.png" width="20px"></a></td>

</tr>
<?php };*/?>
</table>
</body>

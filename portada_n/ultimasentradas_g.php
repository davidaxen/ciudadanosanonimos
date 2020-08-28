<?php   
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

$sql04="SELECT * from clientes where  idgestor='".$idgestor."' and idempresas='".$ide."'"; 

$result04=$conn->query($sql04);
$num_rows=$result04->fetchAll();
$row04=count($num_rows);

//$result04=mysqli_query ($conn,$sql04) or die ("Invalid result 1");
//$row04=mysqli_affected_rows();
if ($row04>0){;
$datos='(';
for($ty=0;$ty<$row04;$ty++){
	if($ty>0){
		$datos.=',';	
	}
$datos.=$num_rows[0]['idclientes'];
}
$datos.=')';
}



$sql1="SELECT * from almpc where  idempresas='".$ide."'  and idpiscina in ".$datos." order by tiempo desc, hora desc limit 0,12"; 

$result1=$conn->query($sql1);
$result1mos=$conn->query($sql1);
$num_rows=$result1->fetchAll();
$row1=count($num_rows);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_affected_rows();

$sql01="SELECT * from categorias where idpccat='".$idpccat."'"; 

$result01=$conn->query($sql01);
$num_rows=$result01->fetchAll();
$row=count($num_rows);

//$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$categoria=$num_rows[0]['nombre'];



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

foreach ($result1mos as $row1) {


//for ($j=0;$j<$row1;$j++){;
$idempleado=$row1['idempleado'];
$idpiscina=$row1['idpiscina'];
$dia=$row1['dia'];
$hora=$row1['hora'];
$idpccat=$row1['idpccat'];
$idpcsubcat=$row1['idpcsubcat'];
$tiempo=$row1['tiempo'];
$lat=$row1['lat'];
$lon=$row1['lon'];
$cantidad=$row1['cantidad'];
$otro=$row1['otro'];

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
//echo $sql12;

$result12=$conn->query($sql12);
$num_rows=$result12->fetchAll();
$row=count($num_rows);

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$subcategoria=$num_rows[0]['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 

$result10=$conn->query($sql10);
$num_rows=$result10->fetchAll();
$row=count($num_rows);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$tele1=$num_rows[0]['tele1'];
$tele2=$num_rows[0]['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 

$result11=$conn->query($sql11);
$num_rows=$result11->fetchAll();
$row=count($num_rows);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];
if ($idpiscina==1){;
$nombrecom="Teletrabajo";
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
<td><?php  echo strtoupper($subcategoria);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>

<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>" target="_parent"><img src="../img/modificar.gif" width="25px"></a>
</td>
<td><?php if($cantidad!=0){;?><?php  echo strtoupper($cantidad);?><?php };?></td>
</tr>
<?php };?>
</table>
</body>

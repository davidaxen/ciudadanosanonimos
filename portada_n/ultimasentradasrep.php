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

$sql="select * from empresas where nifrepresentante='".$nifrep."' and estado>0";
$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
$row=mysqli_affected_rows();
for ($j=0;$j<$row;$j++){;
$idempresas=mysqli_result($result,$j,'idempresas');
$lista.=$idempresas;
if($j!=($row-1)){;
$lista.=',';
};
};



$sql1="SELECT * from almpc where  idempresas in (".$lista.") order by tiempo desc, hora desc limit 0,40"; 
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_affected_rows();


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
<!--	   <link rel="stylesheet" href="/estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />-->
	   
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body  onload="setTimeout('refrescar1()', 5000);">
<table>
<tr class="enctab">
<td>Empresa</td>
<td>Puesto de Trabajo</td><td>Empleado</td><td>Accion</td><td>Dia</td><td>Hora</td><td>Mapa</td><td>Datos</td></tr>

<?php 
for ($j=0;$j<$row1;$j++){;

$idempresas=mysqli_result($result1,$j,'idempresas');
$idempleado=mysqli_result($result1,$j,'idempleado');
$idpiscina=mysqli_result($result1,$j,'idpiscina');
$dia=mysqli_result($result1,$j,'dia');
$hora=mysqli_result($result1,$j,'hora');
$idpccat=mysqli_result($result1,$j,'idpccat');
$idpcsubcat=mysqli_result($result1,$j,'idpcsubcat');
$tiempo=mysqli_result($result1,$j,'tiempo');
$lat=mysqli_result($result1,$j,'lat');
$lon=mysqli_result($result1,$j,'lon');
$cantidad=mysqli_result($result1,$j,'cantidad');
$otro=mysqli_result($result1,$j,'otro');

$sql11="select * from empresas where idempresas='".$idempresas."'";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombreemp=mysqli_result($result11,0,'nombre');


$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$idempresas."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 12");
$subcategoria=mysqli_result($result12,0,'subcategoria');


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$idempresas."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=mysqli_result($result10,0,'nombre');
$priape=mysqli_result($result10,0,'1apellido');
$segape=mysqli_result($result10,0,'2apellido');
$tele1=mysqli_result($result10,0,'tele1');
$tele2=mysqli_result($result10,0,'tele2');
$nombretrab=$nombre.' '.$priape.' '.$segape;


$sql13="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$idempresas."'"; 
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result 11");
$nombrecom=mysqli_result($result13,0,'nombre');

?>
<tr class="dattab">
<td><?php  echo strtoupper($nombreemp);?></td>
<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>

<td><a href="maparepr.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>" target="_parent"><img src="../img/modificar.gif" width="25px"></a>
</td>
<td><?php if($cantidad!=0){;?><?php  echo strtoupper($cantidad);?><?php };?></td>
</tr>
<?php };?>
</table>
</body>

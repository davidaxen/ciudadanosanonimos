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

$result=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
//$row=mysqli_affected_rows();
for ($j=0;$j<$row;$j++){;
$idempresas=$num_rows['idempresas'];
$lista.=$idempresas;
if($j!=($row-1)){;
$lista.=',';
};
};



$sql1="SELECT * from almpc where  idempresas in (".$lista.") order by tiempo desc, hora desc limit 0,40"; 
//echo $sql1;

$result1=$conn->query($sql1);
$result1mos=$conn->query($sql1);
$num_rows=$result1->fetchAll();
$row1=count($num_rows);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_affected_rows();


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


foreach ($result1mos as $row1) {

//for ($j=0;$j<$row1;$j++){;

$idempresas=$row1['idempresas'];
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

$sql11="select * from empresas where idempresas='".$idempresas."'";

$result11=$conn->query($sql11);
$num_rows=$result11->fetchAll();
$row=count($num_rows);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombreemp=$num_rows[0]['nombre'];


$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$idempresas."'"; 
//echo $sql12;

$result12=$conn->query($sql12);
$num_rows=$result12->fetchAll();
$row=count($num_rows);

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 12");
$subcategoria=$num_rows[0]['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$idempresas."'"; 

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


$sql13="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$idempresas."'"; 

$result13=$conn->query($sql13);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];

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

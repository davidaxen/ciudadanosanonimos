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


$sql="select * from empresas where nifrepresentante='".$nifrep."' and estado>0";

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
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


$sql1="SELECT * from almpcinci where  idempresas in (".$lista.") order by tiempo desc, hora desc limit 0,40"; 

$result1=$conn->query($sql1);
$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row1=count($num_rows);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_affected_rows();
/*
$sql01="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$categoria=mysqli_result($result01,0,'nombre');
*/


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
<!--	   <link rel="stylesheet" href="/estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />-->
	   
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body onload="setTimeout('refrescar()', 5000);">

<table>
<tr class="enctab">
<td>Empresa</td>
<td>Puesto de Trabajo</td><td>Empleado</td><td>Dia</td><td>Hora</td><td>Informacion</td><td>Asignar</td></tr>

<?php 


foreach ($resultmos as $row1) {

//for ($j=0;$j<$row1;$j++){;

$idempresas=$row1['idempresas'];
$idempleado=$row1['idempleado'];
$idpiscina=$row1['idpiscina'];
$dia=$row1['dia'];
$hora=$row1['hora'];
$tiempo=$row1['tiempo'];
$lat=$row1['lat'];
$lon=$row1['lon'];
$texto=$row1['texto'];
$urgente=$row1['urgente'];

$sql11="select * from empresas where idempresas='".$idempresas."'";

$result11=$conn->query($sql11);
$num_rows=$result11->fetchAll();
$row=count($num_rows);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombreemp=$num_rows[0]['nombre'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$idempresas."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");

$result10=$conn->query($sql10);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$nombretrab=$nombre.' '.$priape.' '.$segape;


$sql13="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$idempresas."'"; 

$result13=$conn->query($sql13);
$num_rows=$result13->fetchAll();
$row13=count($num_rows);

//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result 13");
//$row13=mysqli_affected_rows();
if ($row13==0){;
$nombrecom="Fuera de Puesto";
}else{;
$nombrecom=$num_rows[0]['nombre'];
};
?>
<?php if ($urgente=='0'){;?>
<tr class="dattab">
<?php }else{;?>
<tr class="dattab2">
<?php };?>
<td><?php  echo strtoupper($nombreemp);?></td>
<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>
<td><?php  echo strtoupper($texto);?></td>
<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idpiscina;?>&descripcion=<?php  echo $texto;?>" target="_parent"><img src="../img/asignacion.png" width="20px"></a></td>

</tr>
<?php };?>
</table>
</body>

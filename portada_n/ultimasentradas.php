<?php   
include('bbdd.php');

$sql1="SELECT * from almpc where  idempresas='".$ide."'";
if ($idcli!=0){;
$sqln1="SELECT * from clientes where nif='".$gente."' and idempresas='".$ide."'";
$resultn1=mysqli_query ($conn, $sqln1) or die ("Invalido resulto n1");
$resultadon1=mysqli_fetch_array($resultn1);
$idclienten1=$resultadon1['idclientes'];
$sql1.=" and idpiscina='".$idclienten1."'";
};
$sql1.=" order by tiempo desc, hora desc limit 0,12"; 
//echo $sql1;
$result1=mysqli_query ($conn, $sql1) or die ("Invalido resulto 1");
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
<table style="width:100%;">
<tr class="enctab"><td>Puesto de Trabajo</td><td>Empleado</td><td>Accion</td><td>Dia</td><td>Hora</td><td>Mapa</td><td>Datos</td></tr>

<?php 
for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultados1 = mysqli_fetch_array ($result1);
$idempleado=$resultados1['idempleado'];
$idpiscina=$resultados1['idpiscina'];
$dia=$resultados1['dia'];
$hora=$resultados1['hora'];
$idpccat=$resultados1['idpccat'];
$idpcsubcat=$resultados1['idpcsubcat'];
$tiempo=$resultados1['tiempo'];
$lat=$resultados1['lat'];
$lon=$resultados1['lon'];
$cantidad=$resultados1['cantidad'];
$otro=$resultados1['otro'];

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 12");
$resultados12 = mysqli_fetch_array ($result12);
$subcategoria=$resultados12['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultados10 = mysqli_fetch_array ($result10);
$nombre=$resultados10['nombre'];
$priape=$resultados10['1apellido'];
$segape=$resultados10['2apellido'];
$tele1=$resultados10['tele1'];
$tele2=$resultados10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$row11=mysqli_num_rows($result11);
$resultados11 = mysqli_fetch_array ($result11);
$nombrecom=$resultados11['nombre'];
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
<?php 
};?>
</table>
</body>

<?php   
include('bbdd.php');

$sql1="SELECT * from almpcinci where  idempresas='".$ide."'";
if ($idcli!=0){;
$sqln1="SELECT * from clientes where nif='".$gente."' and idempresas='".$ide."'";
$resultn1=mysqli_query ($conn, $sqln1) or die ("Invalido resulto n1");
$resultadon1=mysqli_fetch_array($resultn1);
$idclienten1=$resultadon1['idclientes'];
$sql1.=" and idpiscina='".$idclienten1."'";
};
$sql1.=" order by tiempo desc, hora desc limit 0,5"; 
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);

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
<body onload="setTimeout('refrescar()', 5000);">

<table style="width:100%;">
<tr class="enctab"><td>Puesto de Trabajo</td><td>Empleado</td><td>Dia</td><td>Hora</td><td>Informacion</td><td>Asignar</td></tr>

<?php 
for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultados1 = mysqli_fetch_array ($result1);

$idempleado=$resultados1['idempleado'];
$idpiscina=$resultados1['idpiscina'];
$dia=$resultados1['dia'];
$hora=$resultados1['hora'];
$tiempo=$resultados1['tiempo'];
$lat=$resultados1['lat'];
$lon=$resultados1['lon'];
$texto=$resultados1['texto'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultados10 = mysqli_fetch_array ($result10);

$nombre=$resultados10['nombre'];
$priape=$resultados10['1apellido'];
$segape=$resultados10['2apellido'];
$nombretrab=$nombre.' '.$priape.' '.$segape;


$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$resultados11 = mysqli_fetch_array ($result11);
$row11=mysqli_num_rows($result11);
if ($row11==0){;
$nombrecom="Fuera de Puesto";
}else{;
$nombrecom=$resultados11['nombre'];
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
<?php };?>
</table>
</body>

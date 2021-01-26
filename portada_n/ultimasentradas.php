<?php
include('bbdd.php');

$sql1="SELECT * from almpc where  idempresas='".$ide."'";
if ($idcli!=0){;
$sqln1="SELECT * from clientes where nif='".$gente."' and idempresas='".$ide."'";

$resultn1=$conn->query($sqln1);
$resultadon1=$resultn1->fetchAll();

//$resultn1=$conn->query($sqln1);
//$resultadon1=$resultn1->fetch();

/*$resultn1=mysqli_query ($conn, $sqln1) or die ("Invalido resulto n1");
$resultadon1=mysqli_fetch_array($resultn1);*/
$idclienten1=$resultadon1['idclientes'];
$sql1.=" and idpiscina='".$idclienten1."'";
};
$sql1.=" order by tiempo desc, hora desc limit 0,12";
//echo $sql1;
$result1=$conn->query($sql1);

/*$result1=mysqli_query ($conn, $sql1) or die ("Invalido resulto 1");
$row1=mysqli_num_rows($result1);*/

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
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body style="background-image:url(../img/iconos/portada_ca.jpg)";>
		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
		    <div class="[ navbar-header ]">
		        <div class="[ animbrand ]">
		            <a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
		        </div>
		    </div>
			<div class="[ container ]">
			<?php
				include_once("showmenu.php");
			?>
			</div>
		</nav>
<table>
	  <tr>
    <td><p><a href="ultimasentradas.php">Ultimas Entradas</a></p></td> <!-- ? -->
    <td><p><a href="ultimasincidencias.php">Ultimas Incidencias</a></p></td>
    <td><p><a href="dpuntcont.php">Crear Pregunta</a></p></td>
  </tr>
</table>
<table style="width:100%;">
<tr class="enctab"><td>Puesto de Trabajo</td><td>Empleado</td><td>Accion</td><td>Dia</td><td>Hora</td><td>Mapa</td><td>Datos</td></tr>

<?php
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultados1 = mysqli_fetch_array ($result1);*/

foreach ($result1 as $row1mos) {
$idempleado=$row1mos['idempleado'];
$idpiscina=$row1mos['idpiscina'];
$dia=$row1mos['dia'];
$hora=$row1mos['hora'];
$idpccat=$row1mos['idpccat'];
$idpcsubcat=$row1mos['idpcsubcat'];
$tiempo=$row1mos['tiempo'];
$lat=$row1mos['lat'];
$lon=$row1mos['lon'];
$cantidad=$row1mos['cantidad'];
$otro=$row1mos['otro'];

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'";
//echo $sql12;
$result12=$conn->query($sql12);
$resultados12=$result12->fetch();

/*$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 12");
$resultados12 = mysqli_fetch_array ($result12);*/
$subcategoria=$resultados12['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";
$result10=$conn->query($sql10);
$resultados10=$result10->fetch();

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultados10 = mysqli_fetch_array ($result10);*/
$nombre=$resultados10['nombre'];
$priape=$resultados10['1apellido'];
$segape=$resultados10['2apellido'];
$tele1=$resultados10['tele1'];
$tele2=$resultados10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'";
$result11=$conn->query($sql11);
$resultados11=$result11->fetch();

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$row11=mysqli_num_rows($result11);
$resultados11 = mysqli_fetch_array ($result11);*/
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

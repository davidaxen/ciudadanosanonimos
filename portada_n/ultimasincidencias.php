<?php
include('bbdd.php');
//error_reporting(0);
$ide = 21;

$sqluser = "SELECT * FROM usuarios WHERE user = :mail";
$resultuser=$conn->prepare($sqluser);
$resultuser->bindParam(':mail', $_COOKIE['gente']);
$resultuser->execute();
$resultadouser=$resultuser->fetch();

$sql1="SELECT * from mensajes where user = ".$resultadouser['id'];

//$sql1.=" order by tiempo desc, hora desc limit 0,5";
//echo $sql1;

$result1=$conn->query($sql1);

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<meta charset="utf-8">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
@media (min-width: 1192px){
		 .external-collapse.navbar-collapse {
				 display: -webkit-box!important;
				 display: -ms-flexbox!important;
				 display: flex!important;
		 }

 }

 @media (min-width: 768px){
		 .hid {
					visibility: hidden;
		 }
}
</style>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<!--<body onload="setTimeout('refrescar()', 5000);">-->
<body   style="background-image:url(../img/iconos/portada_ca.jpg)"; >


		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

  		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 20%; ">
	    		<div class="[ navbar-header ]">
	        		<div class="[ animbrand ]">
	            		<a style="float: none;" class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>

	        		</div>
	    		</div>
	    	</td>
			<td style="width: 65%; ">
							<?php
								include_once("showmenu2.php");

							?>
						</td>
					</tr>
				</table>
				</nav>
<br> <br> <br> <br> <br> <br> <br>
<div class="container fadeInDown" style="background-color: white; border-radius: 10px; padding-bottom: 20px">
<table style="width:100%;">

	<h2 style="text-align: center;">Tus preguntas realizadas</h2>

<?php
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultados1 = mysqli_fetch_array ($result1);*/
$j=0;
foreach ($result1 as $row1mos) {
$idempleado=$row1mos['idempleado'];
/*$idpiscina=$row1mos['idpiscina'];
$dia=$row1mos['dia'];
$hora=$row1mos['hora'];
$tiempo=$row1mos['tiempo'];
$lat=$row1mos['lat'];
$lon=$row1mos['lon'];*/
$texto=$row1mos['texto'];


/*$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";
$result10=$conn->query($sql10);
$resultados10=$result10->fetch();*/

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultados10 = mysqli_fetch_array ($result10);*/

/*$nombre=$resultados10['nombre'];
$priape=$resultados10['1apellido'];
$segape=$resultados10['2apellido'];
$nombretrab=$nombre.' '.$priape.' '.$segape;*/


/*$sql11="SELECT * from clientes where idclientes='".$idempleado."' and idempresas='".$ide."'";
$result11=$conn->query($sql11);
$result11fetch=$conn->query($sql11);

$resultados11=$result11->fetch();
$row11=count($result11fetch->fetchAll());*/

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$resultados11 = mysqli_fetch_array ($result11);
$row11=mysqli_num_rows($result11);*/
/*if ($row11==0){;
$nombrecom="Fuera de Puesto";
}else{;
$nombrecom=$resultados11['nombre'];
};*/
$f=fmod($j,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>

<!--<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>-->
<!--<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>-->
<td><?php  echo strtoupper($texto);?></td>
<!--<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idempleado;?>&descripcion=<?php  echo $texto;?>" target="_parent"><img src="../img/asignacion.png" width="20px"></a></td>-->

</tr>
<?php
$j=$j+1;
};?>
</table>
</div>
</body>

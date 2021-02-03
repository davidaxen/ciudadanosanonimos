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

$sql="SELECT * from mensajes where idempresa=$ide and fechafin>$fechac or fechafin is null order by fechafin desc";

$result=$conn->query($sql);

/*$result->bindParam(':ide',$ide);
$result->bindParam(':fechac',$fechac);

$result->execute();*/

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="boostrapUlt.css">
	<link rel="stylesheet" type="text/css" href="nav.js">


	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

	<script>
function refrescar()
{
	window.location.reload();
}
</script>

<style type="text/css" media="print">
.nover {display:none}
</style>

</head>
<body  style="background-image:url(../img/iconos/portada_ca.jpg)";>


	<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
  			<div class="[ navbar-header ]">
        		<div class="[ animbrand ]">
          			<a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
          			<div style="float: right; margin-top: 22px;">
							<?php include ('../donaciones/index.php')?>
					</div>
        		</div>
  			</div>
		<div>
  			<?php 
				include_once("showmenu.php");
			?>	
   		</div>
 	</nav>


	
</body>
</html>






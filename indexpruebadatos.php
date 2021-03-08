<?php 
include('bbdd.php');


if ($com=='comprobacion'){;

$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
$resultusuario=$conn->prepare($sqltusuario);
$resultusuario->bindParam(':gente', $_COOKIE['gente']);
$resultusuario->execute();
$resultadousuario = $resultusuario->fetch();

$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=$conn->query($sql56);
$resultados56=$result56->fetch();

if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
	$idiomacookie=strtolower($_COOKIE['lang']);
}else{
	$idiomacookie='es';
}

$idioma = $resultadousuario['lang'];
if ($idiomacookie != $idioma) {
	include($_SERVER['DOCUMENT_ROOT']."/lang/$idiomacookie.php");
	$sqlupdatelang = "UPDATE usuarios SET lang = '".$idiomacookie."' WHERE id = ".$resultadousuario['id'].";";
	$conn->exec($sqlupdatelang);
}else{
	include($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");
}

/*$result56=mysqli_query ($conn, $sql56) or die ("Invalid result sql56");
$resultados56 = mysqli_fetch_array ($result56);*/
//$rgpdt=$resultados56['rgpd'];
//$avisolegalt=$resultados56['avisolegal'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>PROTECCIÓN DE DATOS</title>

	  <link rel="stylesheet" type="text/css" href="respuestas.css">
  <link rel="stylesheet" type="text/css" href="portada_n/cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

  <meta charset="utf-8">

  	<link rel="stylesheet" type="text/css" href="incidencias_t.css">

</head>
<body   style="background-image:url(../img/iconos/portada_ca.jpg)";>


	<div id="main">

<div class="main3">
<span><?php  //include('portada_n/portada2.php');?></span>

</div>

<div class="main6">
<?php //include ('estilo/tab.htm');?>

<?php 
/*$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa='".$ide."' and paginapor.idpag in ('1','2') order by idportada asc";
echo $sql;
$result=$conn->query($sql56);
$row=count($result->fetchAll());*/

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);*/
?>

<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; 	max-width: 650px; margin:auto;">
		<div id='formContent' style="padding-left: 4%; padding-right: 8%; padding-bottom: 1%" >
			<form method="post" action="intro2p.php" name="login_form">
				<table>
					<tr>
						<td>
							<img src="/img/ciudadanoslogo.png">
						</td>
					</tr>
					<tr>
						<td>
							 <div align="center"><textarea style="border-radius: 10px" name="rgpdt" disabled cols="80" rows="15">
							<?php echo $RGPD;?></textarea></div>
						</td>
					<tr>
						<td>
							<div align="center"><input type='checkbox' name='rgpd' value="1"><?php echo $CHECKRGPD; ?></div>
						</td>
					</tr>
						<td>
							<div align="center"><textarea style="border-radius: 10px" name="avisolegalt" disabled cols="80" rows="15"><?php echo $AVISOLEGAL;?></textarea></div>
						</td>
					<tr>
						<td>
							<div align="center"><input type='checkbox' name="avisolegal" value="1"><?php echo $CHECKAVISOLEGAL; ?></div>
						</td>
					</tr>
					</tr>
					<tr>	
						<td colspan="4">
							<div align="center"><input type="submit" name="enviar" value="<?php echo $ENVIAR ?>"></div>
						</td>	
					</tr>
			</table>
		</form>
	</div>
</div>




</div>



</div>

</body>
</html>






    





<?php }else{;
include ('cierre.php');
};?>
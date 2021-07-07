<?php
include('bbdd.php');
$ide = 21;
if ($ide!=null){;

	$sqluser = "SELECT * FROM usuarios WHERE user = :mail";
	$resultuser=$conn->prepare($sqluser);
	$resultuser->bindParam(':mail', $_COOKIE['gente']);
	$resultuser->execute();
	$resultadouser=$resultuser->fetch();

	if ($resultadouser['tusuario'] == 41 || $resultadouser['tusuario'] == 42 || $resultadouser['tusuario'] == 51 || $resultadouser['tusuario'] == 52 || $resultadouser['tusuario'] == 61) {

	if ($resultadouser['localidad'] != 0) {
		$sql1 = "SELECT * FROM ciudades WHERE idciudad = :idciudad";
	    $result1=$conn->prepare($sql1);
	    $result1->bindParam(':idciudad', $resultadouser['localidad']);
	    $result1->execute();
	    $resultado1 = $result1->fetch();
	}else{
		$resultado1['ciudad'] = "unknown";
	}

	if ($resultadouser['pais'] != 0) {
		$sql2 = "SELECT * FROM paises WHERE idpais = :idpais";
		$result2=$conn->prepare($sql2);
		$result2->bindParam(':idpais', $resultadouser['pais']);
		$result2->execute();
		$resultado2 = $result2->fetch();
	}else{
		$resultado2['idpais'] = "0";
	}

?>
<head>

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../portada_n/cabecera.css">
<link rel="stylesheet" type="text/css" href="../../portada_n/ultimasincidencias_t.css">
<link rel="stylesheet" type="text/css" href="../../nav.js">



</head>
<body style="background-image:url(../../img/iconos/portada_ca.jpg); margin-top: 4.5%";>

<div id="main">
<div class="titulo">

</div>
</div>
<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" style="background-color: transparent;" role="navigation">
		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 65%;">
				<div>
				<?php
					include_once("../../portada_n/showmenu.php");

				?>	
			</div>
			</td>
		</tr>
	</table>
 	</nav>

<div class='wrapper fadeInDown' style="border-radius:10px; background-color: white; padding-top: 1%; max-width: 850px; text-align: center; min-height: 0%;  margin:auto;">
	
<form action="intro2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="ide" value="21">
<input type="hidden" name="tabla" value="intro">
<table class="tabla" align="center">

	<input type="hidden" name="user" value="<?php echo $resultadouser['id'];?>">
	<input type="hidden" name="pais" value="<?php echo $resultado2['idpais']; ?>">
	<input type="hidden" name="localidad" value="<?php echo $resultado1['ciudad']; ?>">
	<input type="hidden" name="cp" value="<?php echo $resultadouser['cp'] ?>">


<tr><td colspan="2" style="text-align: center;"><h2 class="enc">ENVIO DE PREGUNTAS</h2></td></tr>
<?php 
if ($resultadouser['tusuario'] == 41 || $resultadouser['tusuario'] == 42) {
?>
<tr><td><b>Codigo postal</b></td><td><?php echo $resultadouser['cp']; ?></td></tr>
<?php
}else if($resultadouser['tusuario'] == 51 || $resultadouser['tusuario'] == 52){
	?>
<tr><td><b>Ciudad</b></td><td><?php echo $resultado1['ciudad']; ?></td></tr>
	<?php
	}else if($resultadouser['tusuario'] == 61){
	?>
<tr><td><b>Pais</b></td><td><?php echo $resultado2['pais']; ?></td></tr>
<tr><td><b>Ciudad</b></td><td>TODAS</td></tr>
	<?php
	}
 ?>

<tr><td><b>Fecha de Finalización</b></td><td><div style="margin-left: 20%"><input type="text" name="fechafin" placeholder="Ej:2020/01/01"></div></td></tr>
<tr><td colspan="2"><b>Pregunta</b></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="texto" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><b>Respuestas propuestas</b></td></tr>
<tr><td colspan="2">* solo rellena los espacios necesarios</td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="resp[0]" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="resp[1]" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="resp[2]" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="resp[3]" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="text" name="resp[4]" maxlength="250" size="100"></div></td></tr>
<tr><td colspan="2"><div align="center"><input class="input1" type="checkbox" name="otrosmot" value="1">Otros Motivos</td></tr>
<tr><td><b>Videos</b></td><td><input type="file" name="video"></td></tr>
<tr><td><b>Ficheros</b></td><td><input type="file" name="fichero"></td></tr>
<tr><td align="center" colspan="2"><input class="button button5" type="submit" class="envio" value="ENVIAR" name="ENVIAR"></td></tr>
</table>
<?php 


if (isset($_REQUEST['msg'])) {
	?>
	
	<div style="text-align: center; font-size: 26px"><?php echo $_REQUEST['msg']; ?></div>

<?php
}
 ?>
</form>



</div>
</body>
<?php 


	}else{
	  header("Location: /portada_n/ultimasentradas_t.php");
	}

} else {;
include ('../../cierre.php');

 };?>

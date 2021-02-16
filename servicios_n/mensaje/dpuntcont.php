<?php
include('bbdd.php');
if ($ide!=null){;

?>
<head>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../portada_n/boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="../../nav.js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url(../../img/iconos/portada_ca.jpg)";>

<div id="main">
<div class="titulo">

</div>
</div>
<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
		<div class="[ navbar-header ]">
				<div class="[ animbrand ]">
						<a class="[ navbar-brand ][ animate ]" href="../../inicio1.php"><img src="../../img/ciudadanoslogo.png"></a>
				</div>
		</div>
	<div class="[ container ]">
	<?php
		include_once("../../portada_n/showmenu4.php");
	?>
	</div>
</nav>
<br> <br> <br> <br> <br> <br> <br>
<div class="container fadeInDown" style="background-color: white; border-radius: 10px;">
<br>
<form action="intro2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tabla" value="intro">
<table class="tabla" align="center">

<tr><td colspan="2"><h2 class="enc">ENVIO DE <?php  echo strtoupper($nc);?></h2></td></tr>
<tr><td><b>Pais</b></td><td><?php include('provincias.php'); ?></td></tr>
<tr><td><b>Ciudad</b></td><td>
<div id="listamunicipios">
      <select name="provincia" id="obj_municipio" >
        <option>Seleccionar...</option>
      </select>
    </div>
</td></tr>
<tr><td><b>Fecha de Finalización</b></td><td><input type="text" name="fechafin" placeholder="Ej:2020/01/01"></tr>
<tr><td colspan="2"><b>Pregunta</b></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="texto" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><b>Respuestas propuestas</b></td></tr>
<tr><td colspan="2">* solo rellena los espacios necesarios</td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[0]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[1]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[2]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[3]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[4]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="checkbox" name="otrosmot" value="1">Otros Motivos</td></tr>
<tr><td><b>Videos</b></td><td><input type="file" name="video"></td></tr>
<tr><td><b>Ficheros</b></td><td><input type="file" name="fichero"></td></tr>
<tr><td></td></tr>
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
</div>
</body>
<?php } else {;
include ('../../cierre.php');

 };?>

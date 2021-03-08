<?php
include('bbdd.php');

$fechac=date("Y-m-d",time());

$mail = $_COOKIE['gente'];
$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
$resultusuario=$conn->prepare($sqltusuario);
$resultusuario->bindParam(':gente', $mail);
$resultusuario->execute();
$resultadousuario = $resultusuario->fetch();

$paisuser = $resultadousuario['pais'];
$localidaduser = $resultadousuario['localidad'];
$cpuser = $resultadousuario['cp'];

$sql1="SELECT * from mensajes where fechafin>'".$fechac."' or fechafin is null and id not in (SELECT idmensaje FROM respuestamensajes WHERE iduser='".$resultadousuario['id']."') AND pdf = 0 order by id asc";
$result1=$conn->query($sql1);
$result1row=$conn->query($sql1);
$row=count($result1row->fetchAll());

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

?>
<script src="../js/ultimasentradas_tjs.js">

</script>


<style>


/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}


</style>


<head>
	<!-- cabecera -->
  <link rel="stylesheet" type="text/css" href="respuestas.css">
  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <link rel="stylesheet" type="text/css" href="ultimasincidencias_t.css">

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
</head>

<body   style="background-image:url(../img/iconos/portada_ca.jpg); margin-top: 15%"; >


		<nav style="background-color: transparent;" class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

  		<table style="margin-left: 20px; width: 100%">
		<tr>

			<td style="width: 65%; ">
					<?php
						include_once("showmenu.php");

					?>
				</td>
			</tr>
		</table>
		</nav>
<!--onload="setTimeout('refrescar1()', 5000);"-->


<?php

if ($row) {


$i=1;
foreach ($result1 as $row1mos) {
$pais=$row1mos['pais'];
$provincia=$row1mos['provincia'];
$localidad=$row1mos['localidad'];
$cp=$row1mos['cp'];
$texto=$row1mos['texto'];
$idmensaje=$row1mos['id'];


$sql10="SELECT * from respuestamensajes where id='".$idmensaje."' and iduser='".$resultadousuario['id']."'";
$result10=$conn->query($sql10);
//var_dump($sql10);
$row10=count($result10->fetchAll());
if ($row10==0){;

?>

<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 650px; margin:auto;">
	<div id='formContent' >
<br><br>

<form action="../servicios_n/mensaje/introrespuesta.php" method="post" enctype="multipart/form-data">


	<input type="hidden" name="id" value="<?php echo $idmensaje;?>">
	<input type="hidden" name="iduser" value="<?php echo $resultadousuario['id']?>">
	<div class="mySlides">
		<div>Hemos recibido un total de:
			<?php
				$sqlCount="SELECT COUNT(*) FROM respuestamensajes WHERE idmensaje=$idmensaje";
				$result=$conn->query($sqlCount);
				$cantidad=$result->fetch();
				echo "$cantidad[0]";

			?> respuestas</div>
		<!--<a href="../servicios_n/mensaje/responder.php?id=<?php echo $idmensaje;?>" target="_parent">-->
		<div class="numbertext" style="font-size: 20px;"><?php echo "$i/$row"; ?></div>

		<!--<img src="../img/pencil.png" class="cuadro">-->
		<p><?php  echo $texto;?></p>
		
		<!--</a>-->

		<?php
			$sql="SELECT * from mensajes where id=:id";
			$result=$conn->prepare($sql);
			$result->bindParam(':id', $idmensaje);
			$result->execute();
			$resultado=$result->fetch();

			$texto=$resultado['texto'];
			$fichero=$resultado['fichero'];
			$otrosmot=$resultado['otrosmot'];

			$sql2="SELECT * from respuesta where idmensaje=:id";
			$result2=$conn->prepare($sql2);
			$result2->bindParam(':id', $idmensaje);
			$result2->execute();
		 ?>


<table align="center">
	<tr>
		<td width="350">
			<a style="background-color: transparent; position: relative; width: 100%" class="prev" onclick="plusSlides(-1)">&#10094;</a>
		</td>
		<td width="200">&nbsp;</td>
		<td width="350">
		<div align="right"><a style="background-color: transparent; position: relative;" class="next" onclick="plusSlides(1)">&#10095;</a><div>
		</td>
	</tr>
</table>


	 	<div class="main" style="text-align: center;">


			<table style="margin: auto;
					border-collapse:separate;
                    border-spacing: 10;
                   	border: #56baed solid 8px;
                    border-radius:10px;
                    -moz-border-radius:10px;
                    -webkit-border-radius: 5px; ">
				<tr>

			<?php
			foreach ($result2 as $row2mos) {
			$valor=$row2mos['valor'];
			$textores=$row2mos['texto'];
			?>

					<td style="width: 200px; text-align: center;" >
						<div align="center">
							<b style="color: red"><?php echo ("$textores");?></b>
						</div>

						<div align="center" >
						<label style="display: inline;" class="container">
							<input type="radio" name="respuesta" value="<?php echo $valor;?>">
							<span class="checkmark"></span>
						</label>
						</div>

						</td>




			<?php };?>
			</tr>
			</table>
			<?php

			if($otrosmot=='1'){ ?>
			<label>
				<span class="caja">
				 <b>Otros Motivos</b>
				 <br/>
				 <input type="radio" name="respuesta" value="99" id="radiotext">

				 <input type="text" name="textotro" size="20" maxlength="250" onfocus="document.getElementById('radiotext').checked = true;">
				</span>
			</label>


			<?php } ?>



		</div>




	<?php
		$sql1="SELECT count(*) from pdfs WHERE idmensaje=(SELECT id FROM mensajes WHERE id = :id)";

		//echo "$sql1";

		/*$result1=$conn->query($sql1);
		$fetchAll1=$result1->fetchAll();
		$row=count($fetchAll1);*/

		$result1=$conn->prepare($sql1);
		$result1->bindParam(':id', $idmensaje);
		$result1->execute();
		$check=$result1->fetch();

          if ($check[0] !=0) {
          	$sql2="SELECT url from pdfs WHERE idmensaje=(SELECT id FROM mensajes WHERE id = :id)";
          	$result2=$conn->prepare($sql2);
			$result2->bindParam(':id', $idmensaje);
			$result2->execute();
          	$url=$result2->fetch();
          	$urltotal=$url[0];
          	$urlfinal = substr($urltotal, 5);
          	echo "<a class='pdflink' target='_blank' href='../servicios_n/abrirpdf.php?file=".$urlfinal."'>Ver PDF</a>";
          		?>

	<?php
 		}

	  $sql1="SELECT count(*) from videos WHERE idmensaje=(SELECT id FROM mensajes WHERE id = :id)";
      $result1=$conn->prepare($sql1);
	  $result1->bindParam(':id', $idmensaje);
	  $result1->execute();
	  $data=$result1->fetch();

	  if ($data[0] != 0) {
	  	?>

	  	<table align="center" >
			<tr>
				<td>
					<div oncontextmenu="return false;" style="margin-bottom:10%; border: #56baed solid 8px; border-radius: 10px 10px 10px 10px; padding: 5px; align-content: center;" >
						<img src="../administracion_n/marca/marca video 2.png" width="320" height="260" style="position: absolute;">
						<video style="border-radius: 10px;" width="320" height="260" controls disablepictureinpicture controlsList="nodownload">
						  <source src="<?php
						          $sql1="SELECT url from videos WHERE idmensaje=(SELECT id FROM mensajes WHERE id = :id)";
						          $result1=$conn->prepare($sql1);
								  $result1->bindParam(':id', $idmensaje);
								  $result1->execute();
						          $url=$result1->fetch();
						          echo("../servicios_n/".$url[0]);?>">
						Tu navegador no sorporta los videos.
						</video>
					</div>
				</td>
			</tr>
			<tr>
				<td>

				</td>
			</tr>

		</table>





	  	<?php
	  		}
	  	?>
  	 			<div align="center" style="padding-bottom: 20px">
				<button type="submit" class="btn btn-primary" value="enviar" name="enviar">ENVIAR</button>

				</div>

	</div>
</div>
</div>


</form>
<?php
};

$i=$i+1;
};?>

<!--agregado nuedo SCROLL-->
 <div class="container">
 	<div id="wrap" style="">
 		<div>
<?php
for ($i=1; $i <= $row; $i++) {

 ?>
	<span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
	<script>
		currentSlide(1);
	</script>

<?php }

?>		</div>
	</div>
 </div>
<?php
}else{
?>
<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 650px; margin:auto;">
	<div id='formContent' >
<div style="font-size: 15px; text-align: center;">GRACIAS POR RESPONDER A TODAS LAS PREGUNTAS</div>
</div>
</div>
<?php
} ?>

</div>
</body>

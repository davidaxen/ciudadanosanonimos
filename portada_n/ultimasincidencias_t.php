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

$mail = $_COOKIE['gente'];
$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
$resultusuario=$conn->prepare($sqltusuario);
$resultusuario->bindParam(':gente', $mail);
$resultusuario->execute();
$resultadousuario = $resultusuario->fetch();

$sql="SELECT * from mensajes where id in (SELECT idmensaje FROM respuestamensajes WHERE iduser=".$resultadousuario['id'].") order by fechafin desc ";
$result=$conn->query($sql);

/*$result->bindParam(':ide',$ide);
$result->bindParam(':fechac',$fechac);

$result->execute();*/

?>

<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

	<link rel="stylesheet" type="text/css" href="ultimasincidencias_t.css">


<script>
	function refrescar()
	{
		window.location.reload();
	}

</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body   style="background-image:url(../img/iconos/portada_ca.jpg)"; >


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


<div style=" display: flex; justify-content: center; margin-top: 15%" class='wrapper fadeInDown' >
	<div id='formContent' >	
		<table style=" display: flex; justify-content: center;" >
			<tr>
				<td colspan="2" style="text-align: center;"><i class="fas fa-book" style="font-size: 30px"></i></td>
			</tr>

				<tr><td colspan="2">&nbsp;</td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>

			<tr>
				<td colspan="2">
					<p style=" 	text-align: center;
 								font-family: Convergence;
 								font-size: 20px;
 								font-style: normal;
 								font-variant: normal;
 								font-weight: 400;
 								line-height: 20px; ">TUS ULTIMAS RESPUESTAS:</p>
				</td>
			</tr>

<?php

	foreach ($result as $rowmos) {

	$idmensaje=$rowmos['id'];
	$fechafin=$rowmos['fechafin'];
	$texto=$rowmos['texto'];

?>
	<tr>
		<td style="text-align: left;">
			<span>
				<?php echo " ".$texto;?>
			</span>
		</td>
		<td style="text-align: top; padding-left: 10px">
			<img src="./grafico.png" onclick="openmodal(<?php echo $idmensaje;?>)" style="height: 30px; width: 30px;" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
<?php


} ?>


		</table>
	</div>
</div>


	<div id="myModal" class="modal">
		<div class="modal-content">
		</div>
	</div>

	<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];


	function openmodal(id) {
		 modal.style.display = "block";

		 $.ajax({
          	type : 'post',
			url : 'ajaxmodal.php', // in here you should put your query
			data :  'id='+id, // here you pass your id via ajax .
			success : function(html){
				// now you can show output in your modal
				$('.modal-content').show().html(html);
			}
		});
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}
	</script>

	<style>
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 2; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  top: 30%;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}

	</style>

</body>
</html>

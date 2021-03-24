<?php
include('bbdd.php');

?>
<html>

<head>
 
 
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

  <meta charset="utf-8">

  	<link rel="stylesheet" type="text/css" href="incidencias_t.css">


<script>
	function validateForm(){
  		var data = document.getElementById("informacion").value;

  		if (data.length != 0) {
  			return true;
  		}else{
  			alert("Has olvidado introducir tu pregunta");
  			return false;
  		}
	}
</script>

<!--<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Estamos trabajando en ello...</p></strong>-->




</head>


<body  style="background-image:url(img/iconos/portada_ca.jpg); margin-top: 10%">

					<?php
						include_once("portada_n/showmenu.php");

					?>
			

				
<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 650px; margin:auto;">
	<div id='formContent' >
	<i class="fas fa-exclamation-triangle  fa-lg fa-fw" style="font-size: 30px"></i>
	<table align="center" >
		<tr>
			<td>

				<p>Escribe aquí cualquier tipo de duda, comentario que se te presente:</p>

			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
		<td>

			<form method="POST" action="/portada_n/introincidencias.php" onsubmit="return validateForm()">
				<div>
					<div>
						<textarea style=" resize: none; height: 150px; border-radius: 10px; " class="form-control" id="informacion" rows="1" cols="50" name="incidencia" placeholder="Incidencias, dudas, comentarios..."></textarea>

					</div>
				</div>

				<div style="text-align: center; margin-top: 20px;">
					<input type="submit" class="envio" value="enviar" name="enviar">
				</div>
				<?php 
					if (isset($_REQUEST['msg'])) {
						
					?>
					<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Gracias por tu aportacion... Trabajaremos para seguir mejorando.</p></strong>
					<?php 
					}
				 ?>
			</form>

		</td>
	</tr>
</table>
</div>
</div>


</body>
</html>
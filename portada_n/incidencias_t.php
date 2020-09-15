<?php   
include('bbdd.php');



?>

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

<style type="text/css" media="print">
.nover {display:none}
</style>

<style>
	textarea {
		width: 500px;
		height: 200px;
		display: block;
	    margin-left: auto;
	    margin-right: auto;
	}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

<body >
	<form method="POST" action="introincidencias.php" onsubmit="return validateForm()">
		<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Escribe aquí cualquier tipo de duda, comentario que se te presente:</p></strong>
		<div style="text-align: center; margin-top: 15px;">
			<textarea id="informacion" rows="1" cols="50" name="incidencia" placeholder="Incidencias, dudas, comentarios..."></textarea>
		</div>

		<div style="text-align: center; margin-top: 20px;">
			<input type="submit" class="envio" value="enviar" name="enviar">
		</div>
	</form>
</body>

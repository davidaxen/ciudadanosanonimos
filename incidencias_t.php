<?php   
include('bbdd.php');

?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapNav1.css">
<link rel="stylesheet" type="text/css" href="nav.js">

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

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

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

		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

</head>


<body   style="background-image:url(img/iconos/portada_ca.jpg)"; >


		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
  			<div class="[ navbar-header ]">
        		<div class="[ animbrand ]">
          			<a class="[ navbar-brand ][ animate ]" href="inicio1.php"><img src="img/ciudadanoslogo.png"></a>
          			<div style="float: right; margin-top: 22px;">
							<?php include ('donaciones/index.php')?>
					</div>
        		</div>
  			</div>
		<div>
       		<?php 
			    include_once("portada_n/showmenu.php");
			  ?>
   		</div>
 	</nav>
<div class='wrapper fadeInDown' >
<div id='formContent' >	
	<i class="fas fa-exclamation-triangle  fa-lg fa-fw" style="font-size: 30px"></i>
<table style=" display: flex; justify-content: center; margin-top: 15%;" >
	<tr>
		<td>

			<p>Escribe aquí cualquier tipo de duda, comentario que se te presente:</p>

		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>	
			<form method="POST" action="introincidencias.php" onsubmit="return validateForm()">
				<div class="input-group">
					<div class="input-group-prepend">
						<textarea style=" resize: none; width:505px; height: 150px; border-radius: 10px; " class="form-control" id="informacion" rows="1" cols="50" name="incidencia" placeholder="Incidencias, dudas, comentarios..."></textarea>
					</div>
				</div>

				<div style="text-align: center; margin-top: 20px;">
					<input type="submit" class="envio" value="enviar" name="enviar">
				</div>
			</form>

		</td>
	</tr>
</table>
</div>
</div>


</body>
</html>
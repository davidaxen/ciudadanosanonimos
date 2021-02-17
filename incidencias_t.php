<?php
include('bbdd.php');

?>
<html>

<head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="incidencias_t.css">
<link rel="stylesheet" type="text/css" href="portada_n/cabecera.css">
<link rel="stylesheet" type="text/css" href="nav.js">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
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
	@media (min-width: 1192px){
			 .external-collapse.navbar-collapse {
					 display: -webkit-box!important;
					 display: -ms-flexbox!important;
					 display: flex!important;
			 }
	 }
	
	@media(max-width:768px) {
    .navbar .navbar-nav>.nav-item {
        float: none;
        margin-left: .1rem;
    }
    .navbar .navbar-nav {
        float:none !important;
    }
    .navbar .collapse.in, .navbar .collapsing  {
        clear:both;
    }
}

</style>

		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

</head>


<body   style="background-image:url(img/iconos/portada_ca.jpg)"; >


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
				<nav class="navbar navbar-expand-lg navbar-light">
									<div class="navbar-header">
										
											<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
											<span class="navbar-toggler-icon"></span>
											</button>
											<div class="pull-left">
											
										</div>
									</div>
									<div class="navbar-collapse collapse">
										<div>
							<?php
								include_once("portada_n/showmenu.php");

							?>
							<td>
										<div>
									<?php include ('donaciones/index.php')?>
								</div>
							</td>
						</div>
									</div>

					</nav>



						</td>
					</tr>
				</table>
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

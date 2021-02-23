<?php
include('bbdd.php');

if ($com=='comprobacion'){;

include('portada_n/cabecera.php');
?>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="portada_n/boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body style="background-image:url(../img/iconos/portada_ca.jpg)";>
	<div id="main">
	<div class="titulo">

	</div>
	</div>
<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
		<div class="[ navbar-header ]">
				<div class="[ animbrand ]">
						<a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
				</div>
		</div>
	<div class="[ container ]">
	<?php
		include_once("portada_n/showmenu3.php");
	?>
	</div>
</nav>


</div>
</div>

</body>

</html>
<?php 
header("Location: portada_n/ultimasincidencias.php");
}else{;
include ('cierre.php');
};?>

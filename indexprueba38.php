<?php
include('bbdd.php');

if ($com=='comprobacion'){;
header("Location: portada_n/ultimasincidencias.php");
//include('portada_n/cabecera.php');
?>

<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" type="text/css" href="portada_n/boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">


<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
@media (min-width: 1192px){
		 .external-collapse.navbar-collapse {
				 display: -webkit-box!important;
				 display: -ms-flexbox!important;
				 display: flex!important;
		 }

 }

 @media (min-width: 768px){
		 .hid {
					visibility: hidden;
		 }
}
</style>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body   style="background-image:url(../img/iconos/portada_ca.jpg)"; >


		<!--<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

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
				
							<?php
								include_once("portada_n/showmenu3.php");

							?>
							<td>
										<div>
									<?php include ('donaciones/index.php')?>
								</div>
							</td>


						</td>
					</tr>
				</table>
				</nav>-->


</div>
</div>

</body>

</html>
<?php

}else{;
include ('cierre.php');
};?>

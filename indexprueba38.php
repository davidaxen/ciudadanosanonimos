<?php
include('bbdd.php');

if ($com=='comprobacion'){;

include('portada_n/cabecera.php');
?>

<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="portada_n/boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
											<button type="button" class="navbar-toggler hid" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
											Menu
											</button>
											<div class="pull-left">
											</div>
									</div>
									<div class="navbar-collapse collapse">
										<div>
							<?php
								include_once("portada_n/showmenu3.php");

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

<?php
$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa='".$ide."' order by idportada asc";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultmos1=$conn->query($sql);

?>

<?php

$j=0;
foreach ($resultmos1 as $rowmos1) {
$tituloport=$rowmos1['titulo'];
$pagport=$rowmos1['pag'];
$iconoport=$rowmos1['icono'];
?>




<?php
$j=$j+1;
};
?>




</div>
</div>

</body>

</html>
<?php
header("Location: portada_n/ultimasincidencias.php");
}else{;
include ('cierre.php');
};?>

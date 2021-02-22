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

  		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 20%; ">
	    		<div class="[ navbar-header ]">
	        		<div class="[ animbrand ]">
	            		<a style="float: none;" class="[ navbar-brand ][ animate ]" href="inicio1.php"><img src="../img/ciudadanoslogo.png"></a>

	        		</div>
	    		</div>
	    	</td>
			<td style="width: 65%; ">
				<nav class="navbar navbar-expand-lg navbar-light">
									<div class="navbar-header">
											<button type="button" class="navbar-toggler hid" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">

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

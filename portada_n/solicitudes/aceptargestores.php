<?php 
	include('bbdd.php');

	$sql = "SELECT tusuario FROM usuarios WHERE user = :gente";
	$result=$conn->prepare($sql);
	$result->bindParam(':gente', $_COOKIE['gente']);
	$result->execute();
	$resultado = $result->fetch();

	if ($resultado['tusuario'] == 51 || $resultado['tusuario'] == 52 || $resultado['tusuario'] == 61 || $resultado['tusuario'] == 1) {

		if ($resultado['tusuario'] == 51 || $resultado['tusuario'] == 52) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 41 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}else if ($resultado['tusuario'] == 61) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 51 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}else if ($resultado['tusuario'] == 1) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 61 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}

	

 ?>

 <html>

 <head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cabecera.css">
<link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">
<link rel="stylesheet" type="text/css" href="../nav.js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css" media="print">
.nover {display:none}
</style>

</head>

<body style="background-image:url(../../img/iconos/portada_ca.jpg)">
	<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 20%;">
	    		<div class="[ navbar-header ]">
	        		<div class="[ animbrand ]">
	            		<a style="float: none;" class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../../img/ciudadanoslogo.png"></a>

	        		</div>
	    		</div>
	    	</td>
			<td style="width: 65%;">
				<div align="center" >
				<?php

					if ($resultado['tusuario'] == 1) {
						include_once("../../portada_n/showmenu2.php");
					}else{
						include_once("../../portada_n/showmenu.php");
					}
					

				?>	
				
			</div>
			</td>
			<td>
			      	<div>
						<?php include ('../../donaciones/index.php')?>
					</div>
				</td>
		</tr>
	</table>
	</nav>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; margin-top: 220px">
		<div style="text-align: center;"><h2>Lista de solicitudes</h2></div>
		<?php 
			if (count($resultadosolicitudes) > 0 )  {
				
			?>
		<form method="POST" action="execute.php">
			<input type="hidden" name="typeaccept" value="1">
			<table align="center" style="margin-top: 20px">
				<tr>
					<th style="width: 200px; text-align: center; height: 30px">Nombre</th>
					<th style="width: 200px; text-align: center;">Pais</th>
					<th style="width: 200px; text-align: center;">Localidad</th>
					<th style="width: 200px; text-align: center;">Telefono</th>
					<th style="text-align: center;"></th>
				</tr>
				<?php
					foreach ($resultadosolicitudes as $row) {
						$sqluser = "SELECT * FROM usuarios WHERE id= ".$row['idusuario'];
						$resultuser = $conn->query($sqluser);
						$resultadouser = $resultuser->fetch();
						
						$sqlinfo = "SELECT * FROM validar WHERE email='".$resultadouser['user']."'";
						$resultinfo = $conn->query($sqlinfo);
						$resultadoinfo = $resultinfo->fetch();

						$sqlpais = "SELECT * FROM paises WHERE idpais=".$resultadoinfo['pais'];
						$resultpais = $conn->query($sqlpais);
						$resultadopais = $resultpais->fetch();

						$sqlciudad = "SELECT * FROM ciudades WHERE idciudad=".$resultadoinfo['localidad'];
						$resultciudad = $conn->query($sqlciudad);
						$resultadociudad = $resultciudad->fetch();
						
					?>
						<tr>
							<input type="hidden" name="idsoli[]" id="idsoli" value="<?php echo $row['id'] ?>">
							<td style="text-align: center;"><?php echo $resultadoinfo['nombreemp']; ?></td>
							<td style="text-align: center;"><?php echo $resultadopais['pais']; ?></td>
							<td style="text-align: center;"><?php echo $resultadociudad['ciudad']; ?></td>
							<td style="text-align: center;"><?php echo $resultadoinfo['telcontacto']; ?></td>
							<td style="text-align: center;"><input type="submit" name="aceptarbtn" value="Aceptar"></td>
							<td style="text-align: center;"><input style="background-color: #F08080" type="submit" name="denegarbtn" value="Denegar"></td>
						</tr>
					<?php

					}
				 ?>
			</table>

			<!--<div style="text-align: center; margin-top: 50px">
				<input type="submit" name="aceptarbtn" value="Aceptar">
				<input style="background-color: #F08080" type="submit" name="denegarbtn" value="Denegar">
			</div>-->
		</form>

		<?php 

		}else{
			?>
			<div style="text-align: center; height: 50px">Aun no hay solicitudes disponibles</div>
		<?php
		}

		 ?>
	</div>

</body>

</html>

<?php 

    }else{
      header("Location: /portada_n/ultimasentradas_t.php");
    }

 ?>
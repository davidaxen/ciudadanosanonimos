<?php 
	include('bbdd.php');

	$sql = "SELECT tusuario FROM usuarios WHERE user = :gente";
	$result=$conn->prepare($sql);
	$result->bindParam(':gente', $_COOKIE['gente']);
	$result->execute();
	$resultado = $result->fetch();

	if ($resultado['tusuario'] == 41  || $resultado['tusuario'] == 42 || $resultado['tusuario'] == 51 || $resultado['tusuario'] == 52 || $resultado['tusuario'] == 61) {

		if ($resultado['tusuario'] == 41 || $resultado['tusuario'] == 42) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 40 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}else if ($resultado['tusuario'] == 51 || $resultado['tusuario'] == 52) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 50 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}else if ($resultado['tusuario'] == 61) {
			$sqlsolicitudes = "SELECT * FROM solicitudes WHERE tsolicitud = 60 AND aceptado = 0";
			$resultsolicitudes = $conn->query($sqlsolicitudes);
			$resultadosolicitudes = $resultsolicitudes->fetchAll();
		}

	

 ?>

 <html>

 <head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../cabecera.css">
<link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">
<link rel="stylesheet" type="text/css" href="../nav.js">

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
					include_once("../../portada_n/showmenu.php");

				?>	
				
			</div>
			</td>
		</tr>
	</table>
	</nav>

	<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 850px; margin:auto;">
	<div id='formContent' style="max-width: 900px;">
		<div style="text-align: center;"><h2>Lista de solicitudes</h2></div>
		<?php 
			if (count($resultadosolicitudes) > 0 )  {
				
			?>
		
			<table align="center" style="margin-top: 20px">
				<tr>
					<th style="text-align: center; height: 30px">Nombre</th>
					<th style="text-align: center;">Pais</th>
					<th style="text-align: center;">Localidad</th>
					<th style="text-align: center;">Telefono</th>
					<th style="text-align: center;"></th>
					<th style="text-align: center;"></th>
				</tr>
				<?php
					foreach ($resultadosolicitudes as $row) {
						$sqluser = "SELECT * FROM usuarios WHERE id= ".$row['idusuario'];
						$resultuser = $conn->query($sqluser);
						$resultadouser = $resultuser->fetch();

						$sqlpais = "SELECT * FROM paises WHERE idpais=".$resultadoinfo['pais'];
						$resultpais = $conn->query($sqlpais);
						$resultadopais = $resultpais->fetch();

						$sqlciudad = "SELECT * FROM ciudades WHERE idciudad=".$resultadoinfo['localidad'];
						$resultciudad = $conn->query($sqlciudad);
						$resultadociudad = $resultciudad->fetch();
						
					?>
					<form method="POST" action="execute.php">
					<input type="hidden" name="typeaccept" value="0">
						<tr>
							<input type="hidden" name="idsoli" id="idsoli" value="<?php echo $row['id'] ?>">
							<td style="text-align: center;"><?php echo $resultadouser['nombreemp']; ?></td>
							<td style="text-align: center;"><?php echo $resultadopais['pais']; ?></td>
							<td style="text-align: center;"><?php echo $resultadociudad['ciudad']; ?></td>
							<td style="text-align: center;"><?php echo $resultadouser['telcontacto']; ?></td>
							<td style="text-align: center;"><div align="center"><button class="btn btn-primary" type="submit" name="aceptarbtn" value="Aceptar">Aceptar</button> <button class="btn btn-danger" style="background-color: #F08080; " type="submit" name="denegarbtn" value="Denegar">Denegar</button></td>
						</tr>
					</form>
					<?php
					}
				 ?>
			</table>

			<!--<div style="text-align: center; margin-top: 50px">
				<input type="submit" name="aceptarbtn" value="Aceptar">
				<input style="background-color: #F08080" type="submit" name="denegarbtn" value="Denegar">
			</div>-->

		<?php 

		}else{
			?>
			<div style="text-align: center; height: 50px">Aun no hay solicitudes disponibles</div>
		<?php
		}

		 ?>
	</div>
</div>

</body>

</html>

<?php 

    }else{
      header("Location: /portada_n/ultimasentradas_t.php");
    }

 ?>
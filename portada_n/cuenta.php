<?php
include('bbdd.php');
	$mail = $_COOKIE['gente'];
	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $mail);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

	$sqlsoli = "SELECT * FROM solicitudes WHERE idusuario = :idusuario AND aceptado = 0";
	$resultsoli=$conn->prepare($sqlsoli);
	$resultsoli->bindParam(':idusuario', $resultadousuario['id']);
	$resultsoli->execute();
	$resultadosoli = $resultsoli->fetch();

	if ($resultadosoli != null) {
		$solicitado = 1;
		$tsolicitud = $resultadosoli['tsolicitud'];
	}else{
		$solicitado = 0;
		$tsolicitud = 0;
	}

?>
<html>

<script type="text/javascript">

	function executeAjax(iduser, tsolicitud){
		var checksoli = document.getElementById('solimade').value;
		var tsolicitudold = document.getElementById('tiposoli').value;

		if (checksoli != 1) {
			$.ajax({
				url: "ajax_solicitud_tuser.php",
				type: "POST",
				dataType : 'json',
				data: {
					iduser: iduser,
					tsolicitud: tsolicitud
				},
				success: function(e){
				  	console.log(e.message);

				},
				error: function(e) {
			       	console.log(e.message);
			    }
			});

			var texto = "";
			if (tsolicitud == 40) {
				texto = "analista de codigo postal";
			}else if (tsolicitud == 41 || tsolicitud == 42) {
				texto = "portavoz de codigo postal";
			}else if (tsolicitud == 50) {
				texto = "analista de ciudad";
			}else if (tsolicitud == 51 || tsolicitud == 52) {
				texto = "portavoz de ciudad";
			}else if (tsolicitud == 60) {
				texto = "analista de pais";
			}else if (tsolicitud == 61 || tsolicitud == 62) {
				texto = "portavoz de pais";
			}

			alert('Tu solicitud para ser '+texto+' ha sido enviada correctamente, espera que algun gestor te acepte');
			document.getElementById('solimade').value = 1;
			document.getElementById('tiposoli').value = tsolicitud;
		}else{
			var texto = "";
			if (tsolicitudold == 40) {
				texto = "analista de codigo postal";
			}else if (tsolicitudold == 41 || tsolicitudold == 42) {
				texto = "portavoz de codigo postal";
			}else if (tsolicitudold == 50) {
				texto = "analista de ciudad";
			}else if (tsolicitudold == 51 || tsolicitudold == 52) {
				texto = "portavoz de ciudad";
			}else if (tsolicitudold == 60) {
				texto = "analista de pais";
			}else if (tsolicitudold == 61 || tsolicitudold == 62) {
				texto = "portavoz de pais";
			}
			alert('Ya has solicitado ser '+texto+', debes esperar a ser aceptado antes de volver a solicitar');
		}

	}

	function desaparecer(){
		document.getElementById('informacion').style.display = "none";
		document.getElementById('formulario').style.display = "block";
	}

	function desaparecerpass(){
		document.getElementById('informacion').style.display = "none";
		document.getElementById('cambiarpass').style.display = "block";
	}

	function mostrar(){
		window.location.replace("cuenta.php");

	}

	function confirmarDatos(){
		var nombre = document.getElementById('nombre');
		var email = document.getElementById('email');
		var telf = document.getElementById('telcontacto');

		if (nombre.value == "") {
			alert("El campo del nombre no puede estar vacio");
			return false;
		}else if (email.value == "") {
			alert("El campo del correo no puede estar vacio");
			return false;
		}else if (telf.value == "") {
			alert("El campo del telefono no puede estar vacio");
			return false;
		}


		return true;

	}

	function showPass(valor) {

	  var x = document.getElementById(valor);
	  if (x.type === 'password') {
	    x.type = 'text';
	  } else {
	    x.type = 'password';
	  }

	}

	function cambiarcontra() {
		
		var fd = new FormData(document.getElementById('formChangePass'));
		$.ajax({
				url: "ajaxcambiarcontra.php",
				type: "POST",
				data: fd,
				processData: false,
        		contentType: false,
				success: function(data){
				  	alert(data);
				  	console.log(data);

				  	if (data == document.getElementById('mensajeidioma').value) {
				  		location.reload();
				  	}

				},
				error: function(data) {
			       	console.log(data.message);
			    }
			});
	}

</script>

<head>
	

  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
	
	
<link rel="stylesheet" type="text/css" href="ultimasincidencias_t.css">
<link rel="stylesheet" type="text/css" href="cabecera.css">



</head>

<?php
if(isset($_COOKIE['gente'])){
	$idPais = $resultadousuario['pais'];

	$sqlPais = "SELECT pais FROM paises WHERE idpais = $idPais";
	$resultPais=$conn->query($sqlPais);
	$resultadoPais=$resultPais->fetch();

?>

<body   style="background-image:url(../img/iconos/portada_ca.jpg)"; >


		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

  		<table style="margin-left: 20px; width: 100%">
		<tr>

			<td style="width: 65%; ">
					<?php
						include_once("showmenu.php");

					?>
				</td>
			</tr>
		</table>
		</nav>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; margin-top: 7%" id="informacion">
		<h2><?php echo $TITULOCUENTA;?></h2>
		<input type="hidden" name="solimade" id="solimade" value="<?php echo $solicitado; ?>">
		<input type="hidden" name="tiposoli" id="tiposoli" value="<?php echo $tsolicitud; ?>">
		<div class="form-group">
			<label><?php echo $NOMBRECUENTA;?></label> <br>
			<label><?php echo $resultadousuario['nombreemp']; ?></label>
		</div>
		<div class="form-group">
			<label><?php echo $CORREOCUENTA;?></label><br>
			<label><?php echo $resultadousuario['user']; ?></label>
		</div>
		<div class="form-group">
			<label><?php echo $TELEFONOCUENTA;?></label> <br>
			<label><?php echo $resultadousuario['telcontacto']; ?></label>
		</div>
		<div class="form-group">
			<label><?php echo $PAISCUENTA;?></label> <br>
			<label><?php echo $resultadoPais['pais']; ?></label>
		</div>
		<div class="form-group">
			<?php
			if ($resultadousuario['tusuario'] == 3) {
				?>
				<!--<button  style="border-color: black" class="btn btn-default" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 40)"><b>Solicitar ser analista de pais</b></button>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 40) {
				?>
				<button style="border-color: black" class="btn btn-default" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 41)"><b>Solicitar ser portavoz de codigo postal</b></button>
				&nbsp; &nbsp;
				<button style="border-color: black" class="btn btn-default" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 50)"><b>Solicitar ser analista de ciudad</b></button>

				<!--<input type="checkbox" name="solicitud" id="solicitud" value="41"> <label for="solicitud">Solicitar ser gestor de codigo postal</label>
				<br>
				<input type="checkbox" name="solicitud" id="solicitudciu" value="50"> <label for="solicitudciu">Solicitar ser colaborador de ciudad</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 41) {
				?>
				<button style="border-color: black"  class="btn btn-default" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 42)"><b>Solicitar ser analista de ciudad</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudciu" value="50"> <label for="solicitudciu">Solicitar ser colaborador de ciudad</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 42) {
				?>
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 50)"><b>Solicitar ser portavoz de ciudad</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudciu" value="50"> <label for="solicitudciu">Solicitar ser colaborador de ciudad</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 50) {
				?>
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 51)"><b>Solicitar ser portavoz de ciudad</b></button>
				&nbsp; &nbsp;
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 60)"><b>Solicitar ser gestor de pais</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudciu" value="51"> <label for="solicitudciu">Solicitar ser gestor de ciudad</label>
				<br>
				<input type="checkbox" name="solicitud" id="solicitudpais" value="60"> <label for="solicitudpais">Solicitar ser colaborador de pais</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 51) {
				?>
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 52)"><b>Solicitar ser analista de pais</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudpais" value="60"> <label for="solicitudpais">Solicitar ser colaborador de pais</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 52) {
				?>
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 61)"><b>Solicitar ser portavoz de pais</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudpais" value="60"> <label for="solicitudpais">Solicitar ser colaborador de pais</label>-->
				<?php
			}
			 ?>

			 <?php
			if ($resultadousuario['tusuario'] == 60) {
				?>
				<button class="btn btn-default" style="border-color: black" name="solicitud" id="solicitud" onclick="executeAjax(<?php echo $resultadousuario['id']; ?>, 61)"><b>Solicitar ser portavoz de pais</b></button>
				<!--<input type="checkbox" name="solicitud" id="solicitudpais" value="61"> <label for="solicitudpais">Solicitar ser gestor de pais</label>-->
				<?php
			}
			 ?>




		</div>
	
			<div>
				<button style="border-color: black" type="button" class="btn btn-default" onclick="desaparecer()"><?php echo $BTN_EDITAR; ?></button>
				<button style="border-color: black" type="button" class="btn btn-default" onclick="desaparecerpass()"><?php echo $BTN_CAMBIARPASS; ?></button>
			</div>
			 <br>		
		</div>

	</div>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; display: none; margin-top: 220px" id="formulario">
		<h2><?php echo $TITULOEDITAR; ?></h2>
		<div>
			<form method="POST" id="formChangeData" action="editar.php" onsubmit="return confirmarDatos()">
				<input type="hidden" name="nombrePrincipal" value="<?php echo $resultadousuario['nombreemp']; ?>">
				<input type="hidden" name="telfPrincipal" value="<?php echo $resultadousuario['telcontacto']; ?>">
				<input type="hidden" id="mailPrincipal" name="mailPrincipal" value="<?php echo $mail; ?>">
				<div class="form-group col-xs-4">
				<label for="nombre"><?php echo $NOMBRECUENTA; ?></label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="nombre" name="nombre" value="<?php echo $resultadousuario['nombreemp']; ?>"><br>
			</div>
			<div class="form-group col-xs-4">
				<label for="email"><?php echo $CORREOCUENTA; ?></label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="email" name="email" value="<?php echo $resultadousuario['user']; ?>">
			</div>
			<div class="form-group col-xs-4">
				<label for="telcontacto"><?php echo $TELEFONOCUENTA; ?></label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="telcontacto" name="telcontacto" value="<?php echo $resultadousuario['telcontacto']; ?>">
			</div>
			<br> <br>
				<div><button type="submit" style="border-color: blue" class="btn btn-default" value="Editar"><?php echo $BTN_CONFIRMAR; ?></button>
					<button type="button" style="border-color: red" class="btn btn-default" onclick="mostrar()"><?php echo $BTN_CANCELAR; ?></button>
				</div>
			</form>
			<br>
		</div>

		
	</div>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; display: none; margin-top: 160px" id="cambiarpass">
		<h2><?php echo $TITULOCAMBIARCONTRA; ?></h2>
		<input type="hidden" name="mensajeidioma" id="mensajeidioma" value="<?php echo $MENSAJE1CAMBIARCONTRA; ?>">
		<form method="POST" id="formChangePass">
			<input type="hidden" name="iduser" id="iduser" value="<?php echo $resultadousuario['id']; ?>">
			<div class="form-group col-xs-4">
				<label for="passprin"><?php echo $LABELCONTRAACTUAL; ?></label> <br>
				<input type="password" style="text-align:left;" class="form-control" id="passprin" name="passprin" value="">
				<img align="center" src='../img/iconos/pass.png' width='32px' onclick="showPass('passprin')">
			</div>
			<div class="form-group col-xs-4">
				<label for="newpass"><?php echo $LABELCAMBIARCONTRA; ?></label> <br>
				<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="text-align:left;" class="form-control" id="newpass" name="newpass" title="<?php echo $TITLEPASS; ?>" required>
				<img align="center" src='../img/iconos/pass.png' width='32px' onclick="showPass('newpass')">
			</div>

			<div class="form-group col-xs-4">
				<label for="newpass2"><?php echo $LABELREPETIRCONTRA; ?></label> <br>
				<input type="password" style="text-align:left;" class="form-control" id="newpass2" name="newpass2" required >
				<img align="center" src='../img/iconos/pass.png' width='32px' onclick="showPass('newpass2')">
			</div>

			<br> <br>
			<div>
				<button type="button" style="border-color: blue" class="btn btn-default" onclick="cambiarcontra()" value="Editar"><?php echo $BTN_CONFIRMAR; ?></button>
				<button type="button" style="border-color: red" class="btn btn-default" onclick="mostrar()"><?php echo $BTN_CANCELAR; ?></button>
			</div>
		</form>
		<br>
	</div>

</body>

<?php

if (isset($_REQUEST['comp'])) {
	$data = $_REQUEST['comp'];
	if ($data == 1) {
		echo "<script>alert('".$ALERTDATOSACT."');</script>";
	}else if ($data == 2) {
		echo "<script>alert('".$ALERTCORREOUSO."');</script>";
	}else if($data == 3){
		echo "<script>alert('".$ALERTMSGCONFIRMACION."');</script>";
	}
}

}else{
?>

<div style="margin-top: 120px; text-align: center;">
	<?php echo $ERRORCUENTA; ?>
</div>


<?php

}
?>

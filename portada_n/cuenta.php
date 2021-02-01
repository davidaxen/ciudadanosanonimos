<?php
include('bbdd.php');

?>
<html>

<script type="text/javascript">

	function desaparecer(){
		document.getElementById('informacion').style.display = "none";
		document.getElementById('formulario').style.display = "block";
	}

	function mostrar(){
		window.location.replace("cuenta.php");

	}

	function confirmarDatos(){
		var nombre = document.getElementById('nombre');
		var email = document.getElementById('email');
		var telf = document.getElementById('telcontacto');
		//var mailPrincipal = document.getElementById('mailPrincipal').value;

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

</script>

<head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css" media="print">
.nover {display:none}
</style>

</head>

<?php
if(isset($_COOKIE['gente'])){
	$mail = $_COOKIE['gente'];
	$sql = "SELECT * FROM validar WHERE email = :mail";
	$result=$conn->prepare($sql);
	$result->bindParam(':mail', $mail);
	$result->execute();
	$resultado = $result->fetch();

	$idValidar = $resultado['idvalidar'];
	$idPais = $resultado['pais'];

	$sqlPais = "SELECT pais FROM paises WHERE idpais = $idPais";

	$resultPais=$conn->query($sqlPais);
	$resultadoPais=$resultPais->fetch();

?>

<body style="background-image:url(../img/iconos/portada_ca.jpg)";>
	<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
	    <div class="[ navbar-header ]">
	        <div class="[ animbrand ]">
	            <a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
	        </div>
	    </div>
		<div class="[ container ]">
		<?php
			include_once("showmenu.php");
		?>
		</div>
	</nav>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; margin-top: 220px" id="informacion">
		<h2>Mi cuenta</h2>
		<div class="form-group">
			<label>Nombre:</label> <br>
			<label><?php echo $resultado['nombreemp']; ?></label>
		</div>
		<div class="form-group">
			<label>Correo:</label><br>
			<label><?php echo $resultado['email']; ?></label>
		</div>
		<div class="form-group">
			<label>Teléfono de contacto:</label> <br>
			<label><?php echo $resultado['telcontacto']; ?></label>
		</div>
		<div class="form-group">
			<label>País:</label> <br>
			<label><?php echo $resultadoPais['pais']; ?></label>
		</div>
			<?php
			if (isset($_REQUEST['comp'])) {
				$data = $_REQUEST['comp'];
			}
			?>

			<br>

			<div><button type="button" class="btn btn-default" onclick="desaparecer()">Editar</button></div> <br>
		</div>

	</div>

	<div class="container fadeInDown" style="background-color: white; border-radius: 10px; display: none; margin-top: 220px" id="formulario">
		<h2>Editar información</h2>
		<div>
			<form method="POST" id="formChangeData" action="editar.php" onsubmit="return confirmarDatos()">
				<input type="hidden" name="nombrePrincipal" value="<?php echo $resultado['nombreemp']; ?>">
				<input type="hidden" name="telfPrincipal" value="<?php echo $resultado['telcontacto']; ?>">
				<input type="hidden" name="idValidar" value="<?php echo $idValidar; ?>">
				<input type="hidden" id="mailPrincipal" name="mailPrincipal" value="<?php echo $mail; ?>">
				<div class="form-group col-xs-4">
				<label for="nombre">Nombre:</label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="nombre" name="nombre" value="<?php echo $resultado['nombreemp']; ?>"><br>
			</div>
			<div class="form-group col-xs-4">
				<label for="email">Correo:</label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="email" name="email" value="<?php echo $resultado['email']; ?>">
			</div>
			<div class="form-group col-xs-4">
				<label for="telcontacto">Teléfono de contacto</label> <br>
				<input type="text" style="text-align:left;" class="form-control" id="telcontacto" name="telcontacto" value="<?php echo $resultado['telcontacto']; ?>">
			</div>
			<br> <br>
				<div><button type="submit" class="btn btn-default" value="Editar">Confirmar</button>
					<button type="button" class="btn btn-default" onclick="mostrar()">Cancelar</button>
				</div>
			</form>
			<br>
	</div>
</body>

<?php

if (isset($_REQUEST['comp'])) {
	$data = $_REQUEST['comp'];
	if ($data == 1) {
		echo "<script>alert('Datos actualizados');</script>";
	}else if ($data == 2) {
		echo "<script>alert('Este correo ya esta en uso');</script>";
	}else if($data == 3){
		echo "<script>alert('Te hemos enviado un mensaje de confirmacion a tu correo anterior');</script>";
	}
}

}else{
?>

<div style="margin-top: 120px; text-align: center;">
	Error al identificar el usuario
</div>

<?php

}
?>

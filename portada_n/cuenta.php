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
		document.getElementById('informacion').style.display = "block";
		document.getElementById('formulario').style.display = "none";
		document.getElementById('msg').style.display = "none";
	}

	function confirmarDatos(){
		var nombre = document.getElementById('nombre');
		var email = document.getElementById('email');
		var telf = document.getElementById('telcontacto');
		var mailPrincipal = document.getElementById('mailPrincipal').value;
		
		if (nombre.value == "") {
			alert("El campo del nombre no puede estar vacio");
			return false;
		}else if (email.value == "") {
			alert("El campo del correo no puede estar vacio");
			return false;
		}else if (telf.value == "") {
			alert("El campo del telefono no puede estar vacio");
			return false;
		}else{
			if (email.value != mailPrincipal) {
				var cambioCorreo = confirm("Si cambia de correo se le cerrara sesion y tendra que validarlo antes de volver a iniciar");
				return cambioCorreo;
			}
			return true;
		}

		
		return false;

	}
</script>

<head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapNav1.css">
<link rel="stylesheet" type="text/css" href="nav.js">

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

<body>
	<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
	    <div class="[ navbar-header ]">
	        <div class="[ animbrand ]">
	            <a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
	        </div>
	    </div>
		<div class="[ container ]">
		<?php 
			include_once("../portada_n/showmenu.php");
		?>
		</div>
	</nav>

	<div style="margin-top: 120px; text-align: center;" id="informacion">
		<div>
			<div>Nombre: <?php echo $resultado['nombreemp']; ?></div>
			<div>Correo: <?php echo $resultado['email']; ?></div>
			<div>Telefono de contacto: <?php echo $resultado['telcontacto']; ?></div>
			<div>Pais: <?php echo $resultadoPais['pais']; ?></div>
			<?php
			if (isset($_REQUEST['comp'])) {
				$data = $_REQUEST['comp'];
			?>
				<div id="msg">
					<?php 
						if ($data == 1) {
							echo "Usuario actualizado";
						}else if ($data == 2) {
							echo "<script>alert('Este correo ya esta en uso');</script>";
						}
					?>
				</div>
			<?php
			}
			?>

			<br>

			<div><input type="button" value="Editar informacion" onclick="desaparecer()"></div>
		</div>
		
	</div>

	<div style="margin-top: 120px; text-align: center; display: none" id="formulario">
		<div>
			<form method="POST" action="editar.php" onsubmit="return confirmarDatos()">
				<input type="hidden" name="nombrePrincipal" value="<?php echo $resultado['nombreemp']; ?>">
				<input type="hidden" name="telfPrincipal" value="<?php echo $resultado['telcontacto']; ?>">
				<input type="hidden" name="idValidar" value="<?php echo $idValidar; ?>">
				<input type="hidden" id="mailPrincipal" name="mailPrincipal" value="<?php echo $mail; ?>">

				Nombre: <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['nombreemp']; ?>">
				<br><br>
				Correo: <input type="text" id="email" name="email" value="<?php echo $resultado['email']; ?>">
				<br><br>
				Telefono de contacto: <input type="text" id="telcontacto" name="telcontacto" value="<?php echo $resultado['telcontacto']; ?>">
				<br><br>
				<input type="submit" name="enviar" value="Editar">
			</form>
			<br><br>
			<div><input type="button" value="Mostrar informacion" onclick="mostrar()"></div>
		</div>
	</div>
</body>

<?php

}else{
?>

<div style="margin-top: 120px; text-align: center;">
	Error al identificar el usuario
</div>

<?php

}
?>


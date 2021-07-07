<?php 
	include_once('bbdd.php');
	
	if ($_POST['tipo'] == "1") {
		$tipo = "an_cp";

	}else if ($_POST['tipo'] == "2") {
		$tipo = "an_loc";

	}else if ($_POST['tipo'] == "3") {
		$tipo = "an_pro";

	}else if ($_POST['tipo'] == "4") {
		$tipo = "an_com";

	}else if ($_POST['tipo'] == "5") {
		$tipo = "an_pais";
	}

	if (isset($_POST['iduser'])) {

		$sqlusuario = "SELECT $tipo as tip FROM usuarios WHERE id = :iduser";
		$resultusuario=$conn->prepare($sqlusuario);
		$resultusuario->bindParam(':iduser', $_POST['iduser']);
		$resultusuario->execute();
		$resultadousuario = $resultusuario->fetch();

		if ($resultadousuario['tip'] == 1) {
			$cambio = 0;
		}else{
			$cambio = 1;
		}

		$sqlupdateuser = "UPDATE usuarios SET $tipo = $cambio WHERE id = :iduser";
		$resultupdateuser=$conn->prepare($sqlupdateuser);
		$resultupdateuser->bindParam(':iduser', $_POST['iduser']);
		$resultupdateuser->execute();
	}
 ?>
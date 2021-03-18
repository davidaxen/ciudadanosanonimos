<?php 
	include('bbdd.php');
	include ('../yo.php');

	$sqltusuario = "SELECT * FROM usuarios WHERE id = :iduser";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':iduser', $_POST['iduser']);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

	include($_SERVER['DOCUMENT_ROOT']."/lang/".$resultadousuario['lang'].".php");

	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($resultadousuario['password']), METHOD, $key, 0, $iv);
	$passbbdd=$output;

	$regexpass = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,}$/";

	if ($_POST['passprin'] == $passbbdd) {
		if ($_POST['newpass'] == $_POST['newpass2']) {

			if (preg_match($regexpass, $_POST['newpass']) == 1) {
				$output=FALSE;
				$output=openssl_encrypt($_POST['newpass'], METHOD, $key, 0, $iv);
				$pass=base64_encode($output);
				$sqlupdateusuario = "UPDATE usuarios SET password = :newpass WHERE id = :iduser";

				$updateusuario=$conn->prepare($sqlupdateusuario);
				$updateusuario->bindParam(':newpass', $pass);
				$updateusuario->bindParam(':iduser', $_POST['iduser']);
				$updateusuario->execute();

				echo $MENSAJE1CAMBIARCONTRA;
			}else{
				echo $MENSAJE2CAMBIARCONTRA;
			}			

		}else{
			echo $MENSAJE3CAMBIARCONTRA;
		}
	}else{
		echo $MENSAJE4CAMBIARCONTRA;
	}



 ?>
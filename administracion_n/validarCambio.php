<?php 
	include('bbdd.php');

	if (isset($_REQUEST['oldMail']) && isset($_REQUEST['newMail'])) {
		$oldMail = $_REQUEST['oldMail'];
		$newMail = $_REQUEST['newMail'];

		$sqln="UPDATE validar2 SET validado = 1 WHERE oldemail=:oldemail AND newemail = :newemail";
		$resultn = $conn->prepare($sqln);
		$resultn->bindParam(':oldemail', $oldMail);
		$resultn->bindParam(':newemail', $newMail);
		$resultn->execute();

		$sqlUpdateUser = "UPDATE usuarios SET user = :newemail WHERE user=:oldemail";
		$resultUpdateUser = $conn->prepare($sqlUpdateUser);
		$resultUpdateUser->bindParam(':oldemail', $oldMail);
		$resultUpdateUser->bindParam(':newemail', $newMail);
		$resultUpdateUser->execute();

		$sqlUpdateValidar = "UPDATE validar SET email = :newemail WHERE email=:oldemail";
		$resultUpdateValidar = $conn->prepare($sqlUpdateValidar);
		$resultUpdateValidar->bindParam(':oldemail', $oldMail);
		$resultUpdateValidar->bindParam(':newemail', $newMail);
		$resultUpdateValidar->execute();

		header('Location: https://control.ciudadanosanonimos.com/index.php?idpr=1&msg=Correo confirmado, ya puedes acceder con él');
	}

 ?>
<?php
	include('bbdd.php');
	$oldMail = $_REQUEST['oldMail'];
	$newMail = $_REQUEST['newMail'];

	$sqlUpdateUsuario = "UPDATE usuarios SET user = :oldMail, validar = '1' WHERE user = :newMail";
	$resultUpdateUsuario = $conn->prepare($sqlUpdateUsuario);
	$resultUpdateUsuario->bindParam(':newMail', $newMail);
	$resultUpdateUsuario->bindParam(':oldMail', $oldMail);
	$resultUpdateUsuario->execute();

	$sqlSelectUsuario = "SELECT * FROM usuarios WHERE user = :oldMail";
	$resultSelectUsuario=$conn->prepare($sqlSelectUsuario);
	$resultSelectUsuario->bindParam(':oldMail', $oldMail);
	$resultSelectUsuario->execute();
	$resultadoSelectUsuario=$resultSelectUsuario->fetch();

	$idpr=$resultadoSelectUsuario['idpr'];

	header("Location: http://control.ciudadanosanonimos.com?idpr=$idpr");
?>
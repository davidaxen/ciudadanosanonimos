<?php
	include('../../bbdd.php');
	$text = $_POST['text'];

	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $_COOKIE['gente']);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

	$mail = $_COOKIE['gente'];
	$sql = "SELECT * FROM validar WHERE email = :mail";
	$result=$conn->prepare($sql);
	$result->bindParam(':mail', $mail);
	$result->execute();
	$resultado = $result->fetch(); 

	$fecha = date("g:i A");
	$sql1 = "INSERT INTO chatcp (idusuario, idpais, cp, msg, timehour, chat, tuser) VALUES (".$resultadousuario['id'].",".$resultado['pais'].",'".$resultado['cp'].",'".stripslashes(htmlspecialchars($text))."','".$fecha."', 1, 1)";
	$conn->exec($sql1);

	/*$fp = fopen("log.php", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b> Anonimo </b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);*/

?>
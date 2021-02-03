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

	if ($resultadousuario['tusuario'] == 51) {
		$gestor = 1;
	}else{
		$gestor = 0;
	}

	$fecha = date("g:i A");
	$sql1 = "INSERT INTO chatciudad (idusuario, idpais, idciudad, msg, timehour, chat, tuser) VALUES (".$resultadousuario['id'].",".$resultado['pais'].",".$resultado['localidad'].",'".stripslashes(htmlspecialchars($text))."','".$fecha."', 1, $gestor)";
	$conn->exec($sql1);


/*$text = $_POST['text'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b> Anonimo </b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
fclose($fp);*/

?>
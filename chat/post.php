<?php
	include('../bbdd.php');
	$text = $_POST['text'];
	$mail = $_COOKIE['gente'];

	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $mail);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();
	
	$sql = "SELECT * FROM validar WHERE email = :mail";
	$result=$conn->prepare($sql);
	$result->bindParam(':mail', $mail);
	$result->execute();
	$resultado = $result->fetch();

	$fecha = date("g:i A");
	$sql1 = "INSERT INTO chatgeneral (idusuario, idvalidar, idpais, idciudad, msg, timehour) VALUES (".$resultadousuario['id'].",".$resultado['idvalidar'].",".$resultado['pais'].",".$resultado['localidad'].",'".stripslashes(htmlspecialchars($text))."','".$fecha."')";
	$conn->exec($sql1);


/*$text = $_POST['text'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b> Anonimo </b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
fclose($fp);*/

?>
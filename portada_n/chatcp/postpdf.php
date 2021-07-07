<?php
	include_once('../../bbdd.php');

	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $_COOKIE['gente']);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

	if ($resultadousuario['tusuario'] == 41 || $resultadousuario['tusuario'] == 42) {
		$gestor = 1;
	}else{
		$gestor = 0;
	}

	//var_dump($_FILES);
	//var_dump($_REQUEST);

	$allowedExtsPDF = array("pdf");
	$extensionPDF = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
	if (in_array($extensionPDF, $allowedExtsPDF)) {
		$fecha = date("g:i A");
		$sql1 = "INSERT INTO chatcp (idusuario, idpais, cp, msg, timehour, chat, tuser, pdf) VALUES (".$resultadousuario['id'].",".$resultadousuario['pais'].",".$resultadousuario['cp'].",'".stripslashes(htmlspecialchars($_FILES['archivo']['name']))."','".$fecha."', 0, $gestor, 1)";
		$result1 = $conn->prepare($sql1);
		$result1->execute();

		$id = $conn->lastInsertId();

		/*var_dump($sql1);
		echo "<br>";
		var_dump($id);*/
		$rutapdfchat = "pdfs/".$id;

		mkdir($rutapdfchat);
		move_uploaded_file($_FILES["archivo"]["tmp_name"], "$rutapdfchat/" . $_FILES["archivo"]["name"]);

	}


 ?>
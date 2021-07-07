<?php 
	include('bbdd.php');
	$idUser = $_REQUEST['iduser'];
	$tsolicitud = $_REQUEST['tsolicitud'];

	$sqlInfoUser = "SELECT * FROM usuarios WHERE id = $idUser";
	$resultInfoUser = $conn->query($sqlInfoUser);
	$resultadoInfoUser = $resultInfoUser->fetch();
	
	$sqlInsertSoli = "INSERT INTO solicitudes (idusuario, tusuario, tsolicitud, aceptado) VALUES (".$idUser.",".$resultadoInfoUser['tusuario'].",".$tsolicitud.", 0)";
	$conn->exec($sqlInsertSoli);

 ?>
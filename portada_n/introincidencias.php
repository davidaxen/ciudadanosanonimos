<?php 
include('bbdd.php');

$mail = $_COOKIE['gente'];
$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
$resultusuario=$conn->prepare($sqltusuario);
$resultusuario->bindParam(':gente', $mail);
$resultusuario->execute();
$resultadousuario = $resultusuario->fetch();

$sql1="INSERT INTO incidencias (iduser,texto) VALUES (:iduser,:incidencia)";

$result1=$conn->prepare($sql1);
$result1->bindValue(':iduser', $resultadousuario['id']);
$result1->bindValue(':incidencia', $incidencia);
$result1->execute();

header("location: /incidencias_t.php?msg=1")
 ?>
<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
 <body>
 	<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Gracias por tu aportacion... Trabajaremos para seguir mejorando.</p></strong>
 	<a href="/inicio1.php" target="_parent" style="text-align: center;">Volver al inicio</a>
 </body>
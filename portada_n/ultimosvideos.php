<?php 
include('bbdd.php');

if ($ide!=null) {
	$sql1="INSERT INTO videos (nombre,contenido) VALUES (:nombre,:contenido)";

	$result1=$conn->prepare($sql1);
	$result1->bindValue(':nombre', $nombre);
	$result1->bindValue(':contenido', $contenido);
	$result1->execute();


}else {
	include ('../../cierre.php');
}

?>

<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
 <body>
 	<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Gracias por tu aportacion... Trabajaremos para seguir mejorando.</p></strong>
 	<a href="/inicio1.php" target="_parent" style="text-align: center;">Volver al inicio</a>
 </body>
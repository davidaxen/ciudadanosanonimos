<?php 
include('bbdd.php');

if ($ide!=null) {
	$sql1="INSERT INTO incidencias (idempresa,idempleado,texto) VALUES (:ide,:idtrab,:incidencia)";

	$result1=$conn->prepare($sql1);
	$result1->bindValue(':ide', $ide);
	$result1->bindValue(':idtrab', $idtrab);
	$result1->bindValue(':incidencia', $incidencia);
	$result1->execute();


}else {
	include ('../../cierre.php');
}

 ?>


 <body>
 	<strong><p style="text-align: center; font-family: Palatino, 'Palatino Linotype', serif; font-size: 18px;">Gracias por tu aportacion... Trabajaremos para seguir mejorando.</p></strong>
 	<a href="/inicio1.php" target="_parent" style="text-align: center;">Volver al inicio</a>
 </body>
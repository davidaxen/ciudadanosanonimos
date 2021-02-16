<?php  
include('bbdd.php');

?>



<?php  


if (!empty($textotro)) {
	$sql1 = "INSERT INTO respuestamensajes (idempresa,iduser,idmensaje,respuesta,textorespuesta) VALUES 
	(21,:iduser,:id,:resp,:textotro)";

	$result1=$conn->prepare($sql1);
	$result1->bindParam(':iduser', $iduser);
	$result1->bindParam(':id', $id);
	$result1->bindParam(':resp', $respuesta);
	$result1->bindParam(':textotro', $textotro);

}else{
	$sql1 = "INSERT INTO respuestamensajes (idempresa,iduser,idmensaje,respuesta) VALUES 
	(21,:iduser,:id,:resp)";

	$result1=$conn->prepare($sql1);
	$result1->bindParam(':iduser', $iduser);
	$result1->bindParam(':id', $id);
	$result1->bindParam(':resp', $respuesta);
}

$result1->execute();


header("location:../../portada_n/ultimasentradas_t.php");
?>


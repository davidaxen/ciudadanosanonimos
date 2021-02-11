<?php 
	include('bbdd.php');

	$typeaccept = $_REQUEST['typeaccept'];
	$idsoli = $_REQUEST['idsoli'];
	if ($idsoli != null) {
		if (isset($_REQUEST['aceptarbtn'])) {
			
			$sql1 = "SELECT * FROM solicitudes WHERE id =".$idsoli;
			$result1 = $conn->query($sql1);
			$resultado1 = $result1->fetch();

			$sql2 = "UPDATE usuarios SET tusuario = ".$resultado1['tsolicitud']." WHERE id =".$resultado1['idusuario'];
			$conn->exec($sql2);

			$sql3 = "UPDATE solicitudes SET aceptado = 1 WHERE id =".$idsoli;
			$conn->exec($sql3);

			if ($typeaccept == 1) {
				header("Location: aceptargestores.php");
			}else{
				header("Location: aceptarcolaboradores.php");
			}

		}else if (isset($_REQUEST['denegarbtn'])) {
			$sql4 = "DELETE FROM solicitudes WHERE id =".$idsoli;
			$conn->exec($sql4);

			if ($typeaccept == 1) {
				header("Location: aceptargestores.php");
			}else{
				header("Location: aceptarcolaboradores.php");
			}
		}
	}else{

		if ($typeaccept == 1) {
			header("Location: aceptargestores.php");		
		}else{
			header("Location: aceptarcolaboradores.php");
		}
		
	}

	
	
 ?>
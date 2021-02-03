<?php 
	include('bbdd.php');

	$idsoli = $_REQUEST['idsoli'];
	if ($idsoli != null) {
		if (isset($_REQUEST['aceptarbtn'])) {
			foreach ($idsoli as $rowid) {
				$sql1 = "SELECT * FROM solicitudes WHERE id =".$rowid;
				$result1 = $conn->query($sql1);
				$resultado1 = $result1->fetch();

				$sql2 = "UPDATE usuarios SET tusuario = ".$resultado1['tsolicitud']." WHERE id =".$resultado1['idusuario'];
				$conn->exec($sql2);

				$sql3 = "UPDATE solicitudes SET aceptado = 1 WHERE id =".$rowid;
				$conn->exec($sql3);

				header("Location: aceptarcolaboradorescp.php");

			}

		}else if (isset($_REQUEST['denegarbtn'])) {
			foreach ($idsoli as $rowid) {
				$sql4 = "DELETE FROM solicitudes WHERE id =".$rowid;
				$conn->exec($sql4);
			}
			header("Location: aceptarcolaboradorescp.php");
		}
	}else{
		header("Location: aceptarcolaboradorescp.php");
	}

	
	
 ?>
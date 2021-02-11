<?php 
	include('../../bbdd.php');
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

	$sql1="SELECT * FROM chatciudad WHERE chat = 0 AND idpais =".$resultado['pais']." AND idciudad=".$resultado['localidad'];
	$result1=$conn->query($sql1);
	$resultado1=$result1->fetchAll();

	foreach ($resultado1 as $row) {
		$timehour = $row['timehour'];
		$msg = $row['msg'];
		?>
			<div class='msgln'>(<?php echo $timehour ?>) <b> 
				<?php 
					if ($row['idusuario'] == $resultadousuario['id']) {
						if ($row['tuser'] == 1) {
							echo $resultado['nombreemp']." (Tú)";
						}else{
							echo $resultado['nombreemp']." (Tú)";
						}
						
					}else{

						$sql2 = "SELECT * FROM validar WHERE idvalidar = :idvalidar";
						$result2=$conn->prepare($sql2);
						$result2->bindParam(':idvalidar', $row['idvalidar']);
						$result2->execute();
						$resultado2 = $result2->fetch();

						if ($row['tuser'] == 1) {
							echo $resultado2['nombreemp']." (Gestor)";
						}else{
							echo $resultado2['nombreemp'];
						}
					}
				?> </b>: <?php echo $msg ?><br></div>
		<?php
	}
 ?>
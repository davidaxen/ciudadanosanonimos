<?php 
	include('../bbdd.php');
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

	$sql1="SELECT * FROM chatgeneral";
	$result1=$conn->query($sql1);
	$resultado1=$result1->fetchAll();

	foreach ($resultado1 as $row) {
		$timehour = $row['timehour'];
		$msg = $row['msg'];
		?>
			<div class='msgln'>(<?php echo $timehour ?>) <b> 
				<?php 
					if ($row['idusuario'] == $resultadousuario['id']) {

						echo $resultado['nombreemp']." (Tú)";

					}else{

						$sql2 = "SELECT * FROM validar WHERE idvalidar = :idvalidar";
						$result2=$conn->prepare($sql2);
						$result2->bindParam(':idvalidar', $row['idvalidar']);
						$result2->execute();
						$resultado2 = $result2->fetch();

						$sql3 = "SELECT * FROM paises WHERE idpais = :idpais";
						$result3=$conn->prepare($sql3);
						$result3->bindParam(':idpais', $resultado2['pais']);
						$result3->execute();
						$resultado3 = $result3->fetch();

						echo $resultado2['nombreemp']." (".$resultado3['pais'].")";
					}
				?></b>: <?php echo $msg ?><br></div>
		<?php
	}
 ?>
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

	$sql1="SELECT * FROM chatcp WHERE chat = 1 AND idpais =".$resultado['pais']." AND cp=".$resultado['cp'];
	$result1=$conn->query($sql1);
	$resultado1=$result1->fetchAll();

	foreach ($resultado1 as $row) {
		$timehour = $row['timehour'];
		$msg = $row['msg'];
		?>
			<div class='msgln'>(<?php echo $timehour ?>) <b> 
				<?php 
					if ($row['idusuario'] == $resultadousuario['id']) {
						echo "Tú";
					}else{
						echo "Anonimo";
					}
				?> </b>: <?php echo $msg ?><br></div>
		<?php
	}
 ?>


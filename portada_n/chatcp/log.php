<?php 
	include('../../bbdd.php');
	$mail = $_COOKIE['gente'];

	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $mail);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

	$sql1="SELECT * FROM chatcp WHERE chat = 0 AND idpais =".$resultadousuario['pais']." AND cp=".$resultadousuario['cp'];
	$result1=$conn->query($sql1);
	$resultado1=$result1->fetchAll();

	foreach ($resultado1 as $row) {
		$timehour = $row['timehour'];
		$msg = $row['msg'];
		$pdf = $row['pdf'];
		if ($pdf == 0) {	
		?>
			<div class='msgln'>(<?php echo $timehour ?>) <b> 
				<?php 
					if ($row['idusuario'] == $resultadousuario['id']) {
						if ($row['tuser'] == 1) {
							echo $resultadousuario['nombreemp']." (Tú)";
						}else{
							echo $resultadousuario['nombreemp']." (Tú)";
						}
						
					}else{

						$sql2 = "SELECT * FROM usuarios WHERE id = :idusuario";
						$result2=$conn->prepare($sql2);
						$result2->bindParam(':idusuario', $row['idusuario']);
						$result2->execute();
						$resultado2 = $result2->fetch();

						if ($row['tuser'] == 1) {
							echo $resultado2['nombreemp']." (Gestor)";
						}else{
							echo $resultado2['nombreemp'];
						}
					}
				?></b>: <?php echo $msg ?><br></div>
		<?php
		}else{
			?>
			<div class='msgln'>(<?php echo $timehour ?>) <b> 
				<?php 
					if ($row['idusuario'] == $resultadousuario['id']) {
						if ($row['tuser'] == 1) {
							echo $resultadousuario['nombreemp']." (Tú)";
						}else{
							echo $resultadousuario['nombreemp']." (Tú)";
						}
						
					}else{

						$sql2 = "SELECT * FROM usuarios WHERE id = :idusuario";
						$result2=$conn->prepare($sql2);
						$result2->bindParam(':idusuario', $row['idusuario']);
						$result2->execute();
						$resultado2 = $result2->fetch();

						if ($row['tuser'] == 1) {
							echo $resultado2['nombreemp']." (Gestor)";
						}else{
							echo $resultado2['nombreemp'];
						}
					}
				?></b>: Archivo: <a target="_blank" href="<?php echo "abrir_pdf.php?file=".$row['id']."/".$msg; ?>"><?php echo $msg; ?></a><br></div>
			<?php

		}
	}
 ?>
<?php 
include('bbdd.php');
?>

<?php 

	$sql1="SELECT url from videos WHERE idmensaje=(SELECT id FROM mensajes WHERE id = 4)";

	$result1=$conn->query($sql1);
	$url=$result1->fetch();



 ?>





<?php 
include('bbdd.php');
?>

<?php 

	$sql1="SELECT url from videos";

	$result1=$conn->query($sql1);
	$url=$result1->fetch();



 ?>





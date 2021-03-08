<?php 
	include('bbdd.php');


	if (isset($_REQUEST['iduser']) && isset($_REQUEST['lang'])) {
		$iduser = $_REQUEST['iduser'];
		$lang = $_REQUEST['lang'];

		switch ($lang) {
			case 1:
				$langfin = "es";
				break;
			case 2:
				$langfin = "en";
				break;
			case 3:
				$langfin = "he";
				break;
			
			default:
				$langfin = "es";
				break;
		}



		$sqlupdatelang = "UPDATE usuarios SET lang = '".$langfin."' WHERE id = ".$iduser.";";
		//var_dump($sqlupdatelang);
		$conn->exec($sqlupdatelang);

		/*var_dump($iduser);
		var_dump($lang);
		var_dump($langfin);*/
		


	}

 ?>
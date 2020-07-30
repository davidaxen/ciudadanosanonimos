<?php 
include('bbdd.php');
//print_r($_COOKIE);

if ($com=='comprobacion'){
	
$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=mysql_query ($sql56) or die ("Invalid result idempresas");
$imgpr=mysql_result($result56,0,'logo');
$imgprpaypal=mysql_result($result56,0,'logopaypal');
$dprueba=mysql_result($result56,0,'diasprueba');
$tprecios=mysql_result($result56,0,'tipoprecios');
			setcookie("imgpr",$imgpr);
			setcookie("imgprpaypal",$imgprpaypal);
			setcookie("tprecios",$tprecios);
		if($validar==0){;
			include_once('indexprueba36.php');
		}else{;
$diasprueba=$dprueba*24*60*60;

				$sql10="select * from validar where email='".$user."'"; 
				$result10=mysql_query ($sql10) or die ("Invalid result validar");		
				$diaentrada=mysql_result($result10,0,'diaentrada');
				$diaentrada2=strtotime($diaentrada);
				$diaentrada1=strtotime(strtok($diaentrada," "));
				$dt=time();
				$dif=$dt-$diaentrada1;

if ($dif<$diasprueba){;
			include_once('inicio1.php');
}else{;
 include_once('indexprueba36p.php');
};


	    };

?>


<?php }else{;
include ('cierre.php');
};?>
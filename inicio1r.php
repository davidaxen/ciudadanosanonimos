<?php 
include('bbdd.php');
//print_r($_COOKIE);

if ($com=='comprobacion'){

			
$sql56="select * from proyectos where idproyectos='".$idpr."'";
$result56=mysql_query ($sql56) or die ("Invalid result idempresas");
$imgpr=mysql_result($result56,0,'logo');

				setcookie("imgpr",$imgpr);
				
				$sql1="select * from representante where idrepresentante='".$idrepresentante."'"; 
				//echo $sql1;
				$result1=mysql_query ($sql1) or die ("Invalid result empresas ");

				$nrep=mysql_result($result1,0,'nombre');
				$nifrep=mysql_result($result1,0,'nif');
				$estadorep=mysql_result($result1,0,'estado');
				$imgrep=mysql_result($result1,0,'logotipo');
				$idproyectosrep=mysql_result($result1,0,'idproyectos');
				$webrep=mysql_result($result1,0,'web');
				if ($webrep==''){;
				$webrep='http://www.smartcbc.com';
				};

			
				$sql10="select * from proyectos where idproyectos='".$idproyectosrep."'"; 
				$result10=mysql_query ($sql10) or die ("Invalid result empresas ");			
				$nomproyectosrep=mysql_result($result10,0,'nombre');

				setcookie("imgrep",$imgrep);
				setcookie("nrep",$nrep);
				setcookie("nifrep",$nifrep);
				setcookie("webrep",$webrep);
				setcookie("nomproyectosrep",$nomproyectosrep);
				
				$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
				$result10=mysql_query ($sql10) or die ("Invalid result empresas 10");
				$row10=mysql_affected_rows();

				if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$dia1=mysql_result($result10,0,'dia');
				$hora1=mysql_result($result10,0,'hora');
				setcookie("diarep",$dia1);
				setcookie("horarep",$hora1);
				};
				
				$pag='indexprueba'.$modulorep.'.php'; 
				echo $pag;
				include_once($pag);

}else{;//com


include ('cierre.php');
};?>

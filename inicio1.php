<?php 
include('bbdd.php');
//print_r($_COOKIE);


if ($com=='comprobacion'){
	


$sql="select * from usuarios where user='".$gente."' and password='".$part."'";
//echo $sql;
//echo hash('sha512',$part);
$result=$conn->query($sql);
$resultados=$result->fetch();
/*$result=mysqli_query ($conn, $sql) or die ("Invalid result sql");
$resultados = mysqli_fetch_array ($result);*/
				
$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=$conn->query($sql56);
$resultados56=$result56->fetch();

/*$result56=mysqli_query ($conn, $sql56) or die ("Invalid result sql56");
$resultados56 = mysqli_fetch_array ($result56);*/
$imgpr=$resultados56['logo'];
$dprueba=$resultados56['diasprueba'];
$nomproyectos=$resultados56['nombre'];
$ct=$resultados56['colorfondo'];
				
				setcookie("imgpr",$imgpr);
				$estado=$resultados['estado'];
				$tusuario=$resultados['tusuario'];
				$idempresacontrol=$resultados['idempresas'];				
			
				$rgpd=$resultados['rgpd'];
				$avisolegal=$resultados['avisolegal'];

$sqlc="select * from empresas where idempresas='".$idempresacontrol."'";
//echo $sql;
//echo hash('sha512',$part);
$resultc=$conn->query($sqlc);
$resultadosc=$resultc->fetch();

/*$resultc=mysqli_query ($conn, $sqlc) or die ("Invalid result sql");
$resultadosc = mysqli_fetch_array ($resultc);*/
$malta=$resultadosc['mesalta'];
$yalta=$resultadosc['yearalta'];
$dalta=$resultadosc['diaalta'];

$fhoy=time();				
$flimite=mktime(0,0,0,$malta,$dalta+$dprueba,$yalta);

if (($estado==2) and ($fhoy>$flimite)){
				setcookie("idempresacontrol",$idempresacontrol);
				setcookie("tusuario",$tusuario);
				$pag='indexpruebasuperada.php'; 
				//echo $pag;
				include_once($pag);

}else{

				
				if (($rgpd!=1) or ($avisolegal!=1)){;
				$pag='indexpruebadatos.php'; 
				//echo $pag;
				include_once($pag);
					}else{;
				
if ($tusuario==1){;
$pag1="inicio1.php";
setcookie("pag1",$pag1);
}; 			
				$clivpunt=$resultados['idcliente'];
				
				$idu=$resultados['id'];
				
				
				$sql10="select * from visitas where usuario='".$gente."' order by dia desc,hora desc";
				$result10=$conn->query($sql10);
				$resultados10=$result10->fetchAll();
				$row10=count($resultados10);

				/*$result10=mysqli_query ($conn, $sql10) or die ("Invalid result empresas 10");
				$resultados10 = mysqli_fetch_array ($result10);*/
				//$row10=mysqli_num_rows($result10);

				if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$dia1=$resultados10[0]['dia'];
				$hora1=$resultados10[0]['hora'];
				setcookie("dia1",$dia1);
				setcookie("hora1",$hora1);
				};
				
				
				$pag='indexprueba'.$modulo.'.php'; 
				//echo $pag;
				include_once($pag);
};
	
	};		
	
}else{;

include ('cierre.php');
};?>
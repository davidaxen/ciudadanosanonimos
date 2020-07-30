<?php 
include('bbdd.php');
//print_r($_COOKIE);

if ($com=='comprobacion'){

$sql="select * from usuarios where user='".$user."' and password='".$pass."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result idempresas");
$resultado=mysqli_fetch_array($result);
				
$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=mysqli_query ($conn,$sql56) or die ("Invalid result idempresas");
$resultado56=mysqli_fetch_array($result56);
$imgpr=$resultado56['logo'];

				setcookie("imgpr",$imgpr);
				$estado=$resultado['estado'];
				$tusuario=$resultado['tusuario'];
if ($tusuario==1){;
$pag1="inicio1.php";
setcookie("pag1",$pag1);
}; 			
				$clivpunt=$resultado['idcliente'];
				
				$idu=$resultado['id'];
				
				$sql1="select * from empresas where idempresas='".$ide."'"; 
				//echo $sql1;
				$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas ");
				$resultado1=mysqli_fetch_array($result1);
				
				$nemp=$resultado1['nombre'];
				$nifemp=$resultado1['nif'];
				$demp=$resultado1['domicilio'];
				$cpemp=$resultado1['cp'];
				$nccemp=$resultado1['ncc'];
				$repr=$resultado1['representante'];
				$nifrepr=$resultado1['nifrepresentante'];
				$telefonof=$resultado1['telefonof'];
				$telefonom=$resultado1['telefonom'];
				$fax=$resultado1['fax'];
				$codpais=$resultado1['pais'];
				$pemp=$resultado1['provincia'];
				$lemp=$resultado1['localidad'];
				$estadoemp=$resultado1['estado'];
				$img=$resultado1['logotipo'];
				$imgpeq=$resultado1['logotipopeq'];
				$firma=$resultado1['firma'];
				$imgpl=$resultado1['plantilla'];
				$plantillasobre=$resultado1['plantillasobre'];
				$plantillacarnet=$resultado1['plantillacarnet'];
				$plantilla=$resultado1['plantilla'];
				$imghoja1=$resultado1['imghoja1'];
				$imghoja2=$resultado1['imghoja2'];
				$ico=$resultado1['ico'];
				$frase=$resultado1['frase'];
				$idfacturacion=$resultado1['idfacturacion'];
				$ayuda=$resultado1['ayuda'];
				$idproyectos=$resultado1['idproyectos'];
				$modulo=$resultado1['modulo'];
				$colorarriba=$resultado1['colorarriba'];
				$colorlateral=$resultado1['colorlateral'];
				$colorcentral=$resultado1['colorcentral'];
				$email=$resultado1['email'];
				$emailadmin=$resultado1['emailadmin'];
				$web=$resultado1['web'];
				$ct=$resultado1['color'];							
				
				$sql10="select * from proyectos where idproyectos='".$idproyectos."'"; 
				$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empresas ");
				$resultado10=mysqli_fetch_array($result10);			
				$nomproyectos=$resultado10['nombre'];



				if ($web==''){;
				$web='http://www.smartcbc.com';
				};

				setcookie("ide",$ide);
				setcookie("menupers",$menupers);
				setcookie("clivp",$clivpunt);
				setcookie("idu",$idu);
				setcookie("estadoemp",$estadoemp);
				setcookie("img",$img);
				setcookie("imgpeq",$imgpeq);
				setcookie("imgpl",$imgpl);
				setcookie("nemp",$nemp);
				setcookie("nifemp",$nifemp);
				setcookie("demp",$demp);
				setcookie("cpemp",$cpemp);
				setcookie("pemp",$pemp);
				setcookie("lemp",$lemp);
				setcookie("firma",$firma);
				setcookie("nccemp",$nccemp);
				setcookie("telf",$telefonof);
				setcookie("telm",$telefonom);
				setcookie("fax",$fax);
				setcookie("email",$email);
				setcookie("emailadmin",$emailadmin);
				setcookie("web",$web);
				setcookie("repr",$repr);
				setcookie("nifrepr",$nifrepr);
				setcookie("ico",$ico);
				setcookie("plantilla",$plantilla);
				setcookie("plantillasobre",$plantillasobre);
				setcookie("plantillacarnet",$plantillacarnet);
				setcookie("ct",$ct);
				setcookie("codpais",$codpais);
				setcookie("imghoja1",$imghoja1);
				setcookie("imghoja2",$imghoja2);
				setcookie("frase",$frase);
				setcookie("idfacturacion",$idfacturacion);
				setcookie("ayuda",$ayuda);
				setcookie("nomproyectos",$nomproyectos);
				setcookie("colorarriba",$colorarriba);
				setcookie("colorlateral",$colorlateral);				
				setcookie("colorcentral",$colorcentral);	
				
				$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
				//echo $sql1;
				$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas 1");
				$resultado1=mysqli_fetch_array($result1);
				
				$admi=$resultado1['administracion'];
				$serv=$resultado1['servicios'];
				$info=$resultado1['informes'];
				$docu=$resultado1['documentacion'];
				$trab=$resultado1['trabajador'];
				$cli=$resultado1['cliente'];
				$ges=$resultado1['gestor'];
				$idtrab=$resultado1['idempleados'];
				$idcli=$resultado1['idcliente'];
				$idges=$resultado1['idgestor'];
				$datlat=$resultado1['datoslateral'];
				$datlat2=$resultado1['datoslateral2'];
				$port=$resultado1['portada'];

				setcookie("idtrab",$idtrab);
				setcookie("idcli",$idcli);
				setcookie("idges",$idges);



				$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
				$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empresas 10");
				$row10=mysql_num_rows($result10);

				if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$resultado10=mysqli_fetch_array($result10);
				$dia1=$resultado10['dia'];
				$hora1=$resultado10['hora'];
				setcookie("dia1",$dia1);
				setcookie("hora1",$hora1);
				};
				
				//$com='comprobacion';
				//$url="https://control.nativecbc.com/indexprueba35.php";
				//echo "<SCRIPT>window.location='$url';</SCRIPT>";
				
				$pag='estamosmejorando.php'; 
				//echo $pag;
				include_once($pag);

}else{;
include ('cierre.php');
};
?>

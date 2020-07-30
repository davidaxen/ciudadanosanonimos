<?php 
include('bbdd.php');
//print_r($_COOKIE);


if ($com=='comprobacion'){

$sql="select * from usuarios where user='".$user."' and password='".$pass."'";
$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$resultados = mysqli_fetch_array ($result);

				
$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=mysqli_query ($conn, $sql56) or die ("Invalid result idempresas");
$resultados56 = mysqli_fetch_array ($result56);


$imgpr=$resultados56['logo'];

				setcookie("imgpr",$imgpr);
				$estado=$resultados['estado'];
				$tusuario=$resultados['tusuario'];
				
if ($tusuario==1){;
$pag1="inicio1.php";
setcookie("pag1",$pag1);
}; 			
				$clivpunt=$resultados['idcliente'];
				
				$idu=$resultados['id'];
				
				$sql1="select * from empresas where idempresas='".$ide."'"; 
				//echo $sql1;
				$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas22");
				$resultados1 = mysqli_fetch_array ($result1);

				$nemp=$resultados1['nombre'];
				$nifemp=$resultados1['nif'];
				$demp=$resultados1['domicilio'];
				$cpemp=$resultados1['cp'];
				$nccemp=$resultados1['ncc'];
				$repr=$resultados1['representante'];
				$nifrepr=$resultados1['nifrepresentante'];
				$telefonof=$resultados1['telefonof'];
				$telefonom=$resultados1['telefonom'];
				$fax=$resultados1['fax'];
				$codpais=$resultados1['pais'];
				$pemp=$resultados1['provincia'];
				$lemp=$resultados1['localidad'];
				$estadoemp=$resultados1['estado'];
				$img=$resultados1['logotipo'];
				$imgpeq=$resultados1['logotipopeq'];
				$firma=$resultados1['firma'];
				$imgpl=$resultados1['plantilla'];
				$plantillasobre=$resultados1['plantillasobre'];
				$plantillacarnet=$resultados1['plantillacarnet'];
				$plantilla=$resultados1['plantilla'];
				$imghoja1=$resultados1['imghoja1'];
				$imghoja2=$resultados1['imghoja2'];
				$ico=$resultados1['ico'];
				$frase=$resultados1['frase'];
				$idfacturacion=$resultados1['idfacturacion'];
				$ayuda=$resultados1['ayuda'];
				$idproyectos=$resultados1['idproyectos'];
				$modulo=$resultados1['modulo'];

				$sql10="select * from proyectos where idproyectos='".$idproyectos."'";
				 
				$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empresas23");			
				$resultados10 = mysqli_fetch_array ($result10);

				$nomproyectos=$resultados1['nombre'];
				$ct=$resultados1['color'];

				$email=$resultados1['email'];
				$emailadmin=$resultados1['emailadmin'];
				$web=$resultados1['web'];
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

				
				$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
				//echo $sql1;
				$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas 1");
				$resultados1 = mysqli_fetch_array ($result1);
				
				$admi=$resultados1['administracion'];
				$serv=$resultados1['servicios'];
				$info=$resultados1['informes'];
				$docu=$resultados1['documentacion'];
				$trab=$resultados1['trabajador'];
				$cli=$resultados1['cliente'];
				$ges=$resultados1['gestor'];
				$idtrab=$resultados1['idempleados'];
				$idcli=$resultados1['idcliente'];
				$idges=$resultados1['idgestor'];
				$datlat=$resultados1['datoslateral'];
				$datlat2=$resultados1['datoslateral2'];
				$port=$resultados1['portada'];

				setcookie("idtrab",$idtrab);
				setcookie("idcli",$idcli);
				setcookie("idges",$idges);



				$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
				$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empresas 10");
				$row10=mysqli_num_rows();
				$resultados10 = mysqli_fetch_array ($result10);
				
				if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$dia1=$resultados1['dia'];
				$hora1=$resultados1['hora'];
				setcookie("dia1",$dia1);
				setcookie("hora1",$hora1);
				};
				
				//$com='comprobacion';
				//$url="https://control.nativecbc.com/indexprueba35.php";
				//echo "<SCRIPT>window.location='$url';</SCRIPT>";
				
				$pag='indexprueba'.$modulo.'.php'; 
				//echo $pag;
				include_once($pag);

}else{;//com

include ('cierre.php');
};?>

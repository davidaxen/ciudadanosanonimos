<?php 
include('bbdd.php');
//extract($_GET);
//extract($_POST);
//extract($_COOKIE);

$ip=$REMOTE_ADDR;
$dt=date("Y-m-d",time());
$tm=date("G:i:s",time());

if($img==null){;
$sql55 = "INSERT INTO visitas (usuario,dia,hora,ip) VALUES ('$user','$dt','$tm','$ip')";
$result55=mysql_query ($sql55) or die ("Invalid result user");
};
$sql="select * from usuarios where user='".$user."' and password='".$pass."' and estado='1'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result idempresas");
$valores=mysql_affected_rows();

if($valores==0){
	$donde='index.php?fv=1';
header( "Location: " . $donde );
}else{;

				$validar=mysql_result($result,0,'validar');
				$valor=mysql_result($result,0,'idempresas');

		
if (($validar==0) or ($valor>0)){;
		if($validar==0){
				setcookie("user",$user);
				setcookie("pass",$pass);
				setcookie("com","comprobacion");
				setcookie("validar",$validar);
				$com='comprobacion';
				//$url="https://control.nativecbc.com/indexprueba36.php";
				//echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
				include('indexprueba36.php');
		}else{
				$clivpunt=mysql_result($result,0,'idcliente');
				
				$idu=mysql_result($result,0,'id');
				$ide=$valor;

				$sql1="select * from empresas where idempresas='".$valor."'"; 
				$result1=mysql_query ($sql1) or die ("Invalid result empresas ");

				$nemp=mysql_result($result1,0,'nombre');
				$nifemp=mysql_result($result1,0,'nif');
				$demp=mysql_result($result1,0,'domicilio');
				$cpemp=mysql_result($result1,0,'cp');
				$nccemp=mysql_result($result1,0,'ncc');
				$repr=mysql_result($result1,0,'representante');
				$nifrepr=mysql_result($result1,0,'nifrepresentante');
				$telefonof=mysql_result($result1,0,'telefonof');
				$telefonom=mysql_result($result1,0,'telefonom');
				$fax=mysql_result($result1,0,'fax');
				$codpais=mysql_result($result1,0,'pais');
				$pemp=mysql_result($result1,0,'provincia');
				$lemp=mysql_result($result1,0,'localidad');
				$estadoemp=mysql_result($result1,0,'estado');
				$img=mysql_result($result1,0,'logotipo');
				$imgpeq=mysql_result($result1,0,'logotipopeq');
				$firma=mysql_result($result1,0,'firma');
				$imgpl=mysql_result($result1,0,'plantilla');
				$plantillasobre=mysql_result($result1,0,'plantillasobre');
				$plantillacarnet=mysql_result($result1,0,'plantillacarnet');
				$plantilla=mysql_result($result1,0,'plantilla');
				$imghoja1=mysql_result($result1,0,'imghoja1');
				$imghoja2=mysql_result($result1,0,'imghoja2');
				$ico=mysql_result($result1,0,'ico');
				$frase=mysql_result($result1,0,'frase');
				$idfacturacion=mysql_result($result1,0,'idfacturacion');
				$ayuda=mysql_result($result1,0,'ayuda');
				$idproyectos=mysql_result($result1,0,'idproyectos');
				$sql10="select * from proyectos where idproyectos='".$idproyectos."'"; 
				$result10=mysql_query ($sql10) or die ("Invalid result empresas ");			
				$nomproyectos=mysql_result($result10,0,'nombre');
				
				$ct=mysql_result($result1,0,'color');

				$email=mysql_result($result1,0,'email');
				$emailadmin=mysql_result($result1,0,'emailadmin');
				$web=mysql_result($result1,0,'web');
				if ($web==''){;
				$web='http://www.smartcbc.com';
				};


				setcookie("user",$user);
				setcookie("pass",$pass);
				setcookie("com","comprobacion");
				setcookie("menupers",$menupers);
				setcookie("clivp",$clivpunt);
				setcookie("idu",$idu);
				setcookie("estadoemp",$estadoemp);
				setcookie("img",$img);
				setcookie("imgpeq",$imgpeq);
				setcookie("ide",$valor);
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
				$result1=mysql_query ($sql1) or die ("Invalid result empresas 1");

				$admi=mysql_result($result1,0,'administracion');
				$serv=mysql_result($result1,0,'servicios');
				$info=mysql_result($result1,0,'informes');
				$docu=mysql_result($result1,0,'documentacion');
				$trab=mysql_result($result1,0,'trabajador');
				$cli=mysql_result($result1,0,'cliente');
				$ges=mysql_result($result1,0,'gestor');
				$idtrab=mysql_result($result1,0,'idempleados');
				$idcli=mysql_result($result1,0,'idcliente');
				$idges=mysql_result($result1,0,'idgestor');
				$datlat=mysql_result($result1,0,'datoslateral');
				$datlat2=mysql_result($result1,0,'datoslateral2');
				$port=mysql_result($result1,0,'portada');

				setcookie("idtrab",$idtrab);
				setcookie("idcli",$idcli);
				setcookie("idges",$idges);



				$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
				$result10=mysql_query ($sql10) or die ("Invalid result empresas 10");
				$row10=mysql_affected_rows();

				if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$dia1=mysql_result($result10,0,'dia');
				$hora1=mysql_result($result10,0,'hora');
				setcookie("dia1",$dia1);
				setcookie("hora1",$hora1);
				};
				$com='comprobacion';
				//$url="https://control.nativecbc.com/indexprueba35.php";
				//echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
				include_once('indexprueba35.php');

				};
}else{;

include ('cierre.php');
};?>

<?php 
date_default_timezone_set('Europe/Madrid');

$dbh=mysql_connect ("bbddsmartcbc.db.11415121.hostedresource.com", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bbddsmartcbc");

extract($_POST);

$ip=$REMOTE_ADDR;
$dt=date("Y-m-d",time());
$tm=date("G:i:s",time());

$sql55 = "INSERT INTO visitas (usuario,dia,hora,ip) VALUES ('$user','$dt','$tm','$ip')";
$result55=mysql_query ($sql55) or die ("Invalid result user");

$sql="select idempresas,id,idcliente from usuarios where user='".$user."' and password='".$pass."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result idempresas");
$valores=mysql_affected_rows();

if($valores==0){
	$donde='index.php';
header( "Location: " . $donde );
}else{;

$clivpunt=mysql_result($result,0,'idcliente');
$valor=mysql_result($result,0,'idempresas');
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

$ct=mysql_result($result1,0,'color');

$email=mysql_result($result1,0,'email');
$emailadmin=mysql_result($result1,0,'emailadmin');
$web=mysql_result($result1,0,'web');







setcookie("user",$user);
setcookie("pass",$pass);
setcookie("com","comprobacion");
setcookie("menupers",$menupers);
setcookie("clivp",$clivpunt);
setcookie("idu",$idu);
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
};

if ($valor!=null) {;?>
<html>

    	<title><?php  echo strtoupper($nemp);?> - PROGRAMA DE GESTION DE PERSONAL Y TRABAJO</title>
<script src="reloj.js" language="JavaScript"> </script>
<link href="estilo/estilo2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="estilo/estilo.css">
<link rel="shortcut icon" href="img/<?php  echo $ico;?>">

<frameset rows="*">
           <frame src="indexprueba33.php" name="logo" scrolling=no noresize>
</frameset>

<?php }else{;
include ('cierre.php');
};?>

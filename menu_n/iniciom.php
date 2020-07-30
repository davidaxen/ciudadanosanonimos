<?php
date_default_timezone_set('Europe/Madrid');

$dbh=mysqli_connect ("localhost", "pisciso_jsolano", "jas17011974") or die ('I cannot connect to the database because: ' . mysqli_error());
mysqli_select_db ("pisciso_facturacion");

$ip=$REMOTE_ADDR;
$dt=date("Y-m-d",time());
$tm=date("G:i:s",time());

$sql55 = "INSERT INTO visitas (usuario,dia,hora,ip) VALUES ('$user','$dt','$tm','$ip')";
$result55=mysqli_query ($conn,$conn,$sql55) or die ("Invalid result user");

$sql="select idempresas,id,idcliente from usuarios where user='".$user."' and password='".$pass."'";

$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result idempresas");
$clivpunt=mysqli_result($result,0,'idcliente');
$valor=mysqli_result($result,0,'idempresas');
$idu=mysqli_result($result,0,'id');
$ide=$valor;

$sql1="select * from empresas where idempresas='".$valor."'"; 
$result1=mysqli_query ($conn,$conn,$sql1) or die ("Invalid result empresas");

$img=mysqli_result($result1,0,'logotipo');
$nemp=mysqli_result($result1,0,'nombre');
$nifemp=mysqli_result($result1,0,'nif');
$demp=mysqli_result($result1,0,'domicilio');
$cpemp=mysqli_result($result1,0,'cp');
$pemp=mysqli_result($result1,0,'provincia');
$lemp=mysqli_result($result1,0,'localidad');
$vemp=mysqli_result($result1,0,'varios');
$firma=mysqli_result($result1,0,'firma');
$imgpl=mysqli_result($result1,0,'plantilla');
$dregistral=mysqli_result($result1,0,'dregistral');
$nccemp=mysqli_result($result1,0,'ncc');
$telefonom=mysqli_result($result1,0,'telefonom');
$telefonof=mysqli_result($result1,0,'telefonof');
$fax=mysqli_result($result1,0,'fax');
$email=mysqli_result($result1,0,'email');
$web=mysqli_result($result1,0,'web');
$wpubli=mysqli_result($result1,0,'publi');
$repr=mysqli_result($result1,0,'representante');
$nifrepr=mysqli_result($result1,0,'nifrepresentante');
$crepr=mysqli_result($result1,0,'conceptorep');
$ico=mysqli_result($result1,0,'ico');
$plantilla=mysqli_result($result1,0,'plantilla');
$plantillasobre=mysqli_result($result1,0,'plantillasobre');
$plantillacarnet=mysqli_result($result1,0,'plantillacarnet');
$ct=mysqli_result($result1,0,'color');
$codcontab=mysqli_result($result1,0,'codcontab');
$menupers=mysqli_result($result1,0,'menupersonalizado');
$autsegsoc=mysqli_result($result1,0,'autsegsoc');
$codpais=mysqli_result($result1,0,'pais');

setcookie("user",$user);
setcookie("pass",$pass);
setcookie("com","comprobacion");
setcookie("menupers",$menupers);
setcookie("clivp",$clivpunt);
setcookie("idu",$idu);
setcookie("img",$img);
setcookie("ide",$valor);
setcookie("imgpl",$imgpl);
setcookie("nemp",$nemp);
setcookie("nifemp",$nifemp);
setcookie("demp",$demp);
setcookie("cpemp",$cpemp);
setcookie("pemp",$pemp);
setcookie("lemp",$lemp);
setcookie("vemp",$vemp);
setcookie("firma",$firma);
setcookie("dregistral",$dregistral);
setcookie("nccemp",$nccemp);
setcookie("telf",$telefonof);
setcookie("telm",$telefonom);
setcookie("fax",$fax);
setcookie("email",$email);
setcookie("web",$web);
setcookie("wpubli",$wpubli);
setcookie("repr",$repr);
setcookie("crepr",$crepr);
setcookie("nifrepr",$nifrepr);
setcookie("ico",$ico);
setcookie("plantilla",$plantilla);
setcookie("plantillasobre",$plantillasobre);
setcookie("plantillacarnet",$plantillacarnet);
setcookie("ct",$ct);
setcookie("codcontab",$codcontab);
setcookie("autsegsoc",$autsegsoc);
setcookie("codpais",$codpais);


if ($valor!=null) {;?>
<html>
    	<title><?php  echo strtoupper($nemp);?> - PROGRAMA DE FACTURACION Y GESTION DE LA EMPRESA</title>
<script src="reloj.js" language="JavaScript"> </script>
<link href="estilo/estilo2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="estilo/estilo.css">
<link rel="shortcut icon" href="img/<?php  echo $ico;?>">

<frameset rows="*">
           <frame src="indexprueba33m.php" name="logo" scrolling=no noresize>
</frameset>


<?php }else{;?>
<html>
<head>
<title>
Pagina de Acceso a Opciones de Gestión de Fincas
</title>
<link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<img src="img/logo.gif" height=80>
<p> </p>
<center>No tiene permisos para acceder a la pagina</center>
<a href="http://facturacion.admiservi.es">Ir al inicio</a>
<?php };?>
</body>
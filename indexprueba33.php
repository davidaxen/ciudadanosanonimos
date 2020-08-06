<?php 

extract($_COOKIE);

if ($com=='comprobacion'){;

/*date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("bbddsmartcbc.db.11415121.hostedresource.com", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bbddsmartcbc");*/

try{
$conn = new PDO("mysql:host=bbddsmartcbc.db.11415121.hostedresource.com;dbname=bbddsmartcbc", "bbddsmartcbc", "Jas170174");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conexion realizada";

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=$conn->query($sql1);
$resultado1=$result1->fetchAll();

//$result1=mysql_query ($sql1) or die ("Invalid result empresas 1");
$admi=$resultado1[0]['administracion'];
$serv=$resultado1[0]['servicios'];
$info=$resultado1[0]['informes'];
$docu=$resultado1[0]['documentacion'];
$trab=$resultado1[0]['trabajador'];
$cli=$resultado1[0]['cliente'];
$ges=$resultado1[0]['gestor'];

$idtrab=$resultado1[0]['idempleados'];
$idcli=$resultado1[0]['idcliente'];
$idges=$resultado1[0]['idgestor'];


$datlat=$resultado1[0]['datoslateral'];
$datlat2=$resultado1[0]['datoslateral2'];
$port=$resultado1[0]['portada'];




/*$admi=mysql_result($result1,0,'administracion');
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
$port=mysql_result($result1,0,'portada');*/

setcookie("idtrab",$idtrab);
setcookie("idcli",$idcli);
setcookie("idges",$idges);



$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
$result10=$conn->query($sql10);
$resultado10=$result10->fetchAll();
$row10=count($resultado10);

/*$result10=mysql_query ($sql10) or die ("Invalid result empresas 10");
$row10=mysql_affected_rows();*/

if ($row10==0){;
$dia1="Bienvenido";
$hora1="";
}else{;
	$dia1=$resultado10[0]['dia'];
	$hora1=$resultado10[0]['hora'];

/*$dia1=mysql_result($result10,0,'dia');
$hora1=mysql_result($result10,0,'hora');*/
};

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script>
function funciones(){
top.document.cerrar=true;
top.document.location.href="<?php  echo $web;?>";
};
</script>
<html>
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - SISTEMA PARA CONTROL Y GESTION DE EMPRESAS</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" type="text/css" href="estilo/reset-min.css">
		<link rel="stylesheet" href="estilo/style.css" type="text/css" media="screen" href="indexprueba33.php" charset="utf-8" />
		<link rel="stylesheet" href="estilo/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="estilo/print.css" type="text/css" media="print" charset="utf-8" />
			<!--[if lt IE 7]>
			<link rel="stylesheet" href="css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->
 <style type="text/css">


</style>
		
</head>
<body>


   		
	    
		<!-- BEGIN Menu -->
   <div id="container" ><ul id="nav">
<!-- ADMINISTRACION --><?php if ($admi=="1"){?><?php  include('menu/administracion.php');?><?php };?><!-- FIN ADMINISTRACION -->
<!-- SERVICIOS --><?php if ($serv=="1"){?><?php  include('menu/servicios.php');?><?php };?><!-- FIN SERVICIOS -->	
<!-- DOCUMENTACION --><?php if ($docu=="1"){?><?php  include('menu/documentacion.php');?><?php };?><!-- FIN DOCUMENTACION -->	
<!-- INFORMES --><?php if ($info=="1"){?><?php  include('menu/informes.php');?><?php };?><!-- FIN INFORMES -->
<!-- TRABAJADORES --><?php if ($trab=="1"){?><?php  include('menu/trabajador.php');?><?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?php if ($cli=="1"){?><?php  include('menu/clientes.php');?><?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($ges=="1"){?><?php  include('menu/gestores.php');?><?php };?><!-- FIN GESTORES -->		
		
		</ul></div>	
		<!-- END Menu -->


 <div id="logo2"><?php  include('utilidades/logo.php');?></div> 		  
<div id="submenu00"><?php if ($datlat=="1"){?><?php include('utilidades/submenu00a.php');?><?php }else{;?><?php include('utilidades/submenu.php');?><?php };?></div>
 <div id="content">
 <iframe
 <?php if ($port==1){;?>
  src="portada/portada.php" 
 <?php }else{;?>
 src=""
 <?php };?>
 width="100%" height="550" frameborder=0 name="principal">
 </iframe></div>

<!-- Menu Lateral Izquierdo -->
<div id="submenu01"><?php if ($datlat=="1"){?><iframe src="utilidades/1b.php" width="100%" height="100%" frameborder=0 name="submenu01" scrolling=no><?php };?></iframe></div>
<div id="submenu02"><?php if ($datlat2=="1"){?><iframe src="utilidades/1b2.php"  width="100%" height="100%" frameborder=0 name="submenu02" scrolling=no></iframe><?php };?></div>
<div id="submenu03"><iframe src="utilidades/1a2.php"  width="100%" height="100%" frameborder=0 name="submenu03" scrolling=no></iframe></div>
<!--<div id="submenu04"><iframe src="utilidades/1a2.php"  width="100%" height="100%" frameborder=0 name="submenu04" scrolling=no></iframe></div>-->
<!-- Fin Menu Lateral Izquierdo -->

       
	<div id="footer" >
	    <a href="" target="_blank" title="APRENDO MAS">APRENDO MAS</a><a> EMPRESA DESARROLLADORA </a><a href="" target="_blank" title="">CONTACTO</a>
	    <br>
	    <img alt="cerrar" border="0" src="img/cerrarConexion.gif" onclick="javascript:funciones()" valing="middle"><a>Ultima Conexión: <?php  echo $dia1;?> - <?php  echo $hora1;?></a>
    </div>
	




</body>

</html>
<?php }else{;
include ('cierre.php');
};?>

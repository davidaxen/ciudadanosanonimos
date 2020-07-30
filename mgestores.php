<?php  
include('bbdd.php');

if ($ide!=null){;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="html" lang="es-ES">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - SISTEMA PARA CONTROL Y GESTION DE EMPRESAS</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" href="../estilo/estilonuevo.css" type="text/css" media="screen" charset="utf-8" >
	   <link rel="stylesheet" href="../estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />

			<!--[if lt IE 7]>
			<link rel="stylesheet" href="css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->
</head>

<body>

<div class="encabezado"></div>
<div class="pie"></div>
<div class="cartel" ><?php  include('../menu/cartel.php');?></div>	
<div class="logo"><?php  include('../utilidades/logo_nuevo.php');?></div> 
<div class="menu"><?php  include('../menu/menup.php');?></div>
<div class="colocacion izquierda">
<center>Tareas Habituales</center>
<?php  include('../portada/portada4.php');?>
</div>


<div class="colocacion derecha">
<div class="titulo">
<p class="enc">MODIFICACION DE GESTORES</p></div>
<div class="contenido">
<?php 
if ($datos!='datos'){;
?>
<form method="post" action="mgestores.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from gestores where idempresa='".$ide."' and estado='".$estado."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc"><td>Nº Gestor</td><td>Nombre del Gestor</td><td>Persona de Contacto</td><td>Telefono 1</td><td>Telefono 2</td><td>Fax</td><td>Direccion</td><td>C.P.</td><td>E.mail</td><td>Opcion</td></tr>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $idgestor=mysql_result($result,$i,'idgestor');?><?php  echo $idgestor;?></td>
<td><?php $nombre=mysql_result($result,$i,'nombregestor');?><?php  echo $nombre;?></td>
<td><?php $percontacto=mysql_result($result,$i,'percontacto');?><?php  echo $percontacto;?></td>
<td><?php $tele1=mysql_result($result,$i,'telefono1');?><?php  echo $tele1;?></td>
<td><?php $tele2=mysql_result($result,$i,'telefono2');?><?php  echo $tele2;?></td>
<td><?php $fax=mysql_result($result,$i,'fax');?><?php  echo $fax;?></td>
<td><?php $direccion=mysql_result($result,$i,'direccion');?><?php  echo $direccion;?></td>
<td><?php $cp=mysql_result($result,$i,'cp');?><?php  echo $cp;?></td>
<td><?php $emailn=mysql_result($result,$i,'email');?><?php  echo $emailn;?></td>
<td><a href="mgestoresm.php?idgestor=<?php  echo $idgestor;?>"><img src="../img/icono-usuarios.gif" border=0 width=25></a></td>
</tr>
<?php };?>
</table>

<?php };?>
</div>
<?php }else{;
include ('cierre.php');
};?>







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

<p class="enc">MODIFICACION DE PUESTOS DE TRABAJO</p>
<?php 
if ($envio==null){;?>
<form action="mclientes.php" method="post" name="form2">
<select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>
<?php }else{;?>



<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and estado='".$estado."' order by idclientes asc"; 
$result=mysqli_query ($sql) or die ("Invalid result");
$resultados = mysqli_fetch_array ($result);
print_r($resultados);
$row=mysql_num_rows($result);
?>
<!--
<table>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $idclientes=$resultados,$i,'idclientes'];?><?php  echo $idclientes;?></td>
<td><?php $nombre=$resultados,$i,'nombre'];?><?php  echo $nombre;?></td>
<td><?php $nif=$resultados,$i,'nif'];?><?php  echo $nif;?></td>
<td><?php $estado=$resultados,$i,'estado'];?>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="modclientes.php?idclientes=<?php  echo $idclientes;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
-->

<?php };?>
<?php }else{;
include ('cierre.php');
};?>

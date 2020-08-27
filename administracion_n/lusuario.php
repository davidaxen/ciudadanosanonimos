<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ADMINISTRADORES</p></div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>

<table>
<form method="post" action="lusuario.php">


<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from usuariost where idempresa='".$ide."' and estado='".$estado."'";
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();*/
?>
<td>
<a href="pdfcartu.php?dato=todo">
Carta para todos los usuarios</a>
</td>
<table>
<tr class="enctab"><td>Nº Usuario</td><td>Nombre Usuario</td><td>NIF</td><td>Doc.</td>

<td>Portada</td>
<td>Administracion</td>
<td>Servicios</td>
<td>Documentacion</td>
<td>Informes</td>
</tr>
<?php  

	foreach ($result as $rowmos) {
?>
<tr class="dattab">
<td><?php $idclientes=$rowmos['idusuario'];?><?php  echo$idclientes;?></td>
<td><?php $nombre=$rowmos['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$rowmos['nif'];?><?php  echo$nif;?></td>
<td>
<a href="pdfcartu.php?dato=<?php  echo$nif;?>">
<img src="../img/modificar.gif" border=0></a>
</td>


<td><?php $portada=$rowmos['portada'];?>
<input type="radio" name="portada<?php  echo$i;?>" value="1" <?php if ($portada==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $administracion=$rowmos['administracion'];?>
<input type="radio" name="administracion<?php  echo$i;?>" value="1" <?php if ($administracion==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $servicios=$rowmos['servicios'];?>
<input type="radio" name="servicios<?php  echo$i;?>" value="1" <?php if ($servicios==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $documentacion=$rowmos['documentacion'];?>
<input type="radio" name="documentacion<?php  echo$i;?>" value="1" <?php if ($documentacion==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $informes=$rowmos['informes'];?>
<input type="radio" name="informes<?php  echo$i;?>" value="1" <?php if ($informes==1){;?>checked="checked"<?php };?>  disabled></td>




</tr>
<?php };?>
</table>

<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
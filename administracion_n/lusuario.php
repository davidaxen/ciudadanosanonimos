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
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<td>
<a href="pdfcartu.php?dato=todo">
Carta para todos los usuarios</a>
</td>
<table>
<tr class="enctab"><td>N� Usuario</td><td>Nombre Usuario</td><td>NIF</td><td>Doc.</td>

<td>Portada</td>
<td>Administracion</td>
<td>Servicios</td>
<td>Documentacion</td>
<td>Informes</td>
</tr>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="dattab">
<td><?php $idclientes=mysqli_result($result,$i,'idusuario');?><?php  echo$idclientes;?></td>
<td><?php $nombre=mysqli_result($result,$i,'nombre');?><?php  echo$nombre;?></td>
<td><?php $nif=mysqli_result($result,$i,'nif');?><?php  echo$nif;?></td>
<td>
<a href="pdfcartu.php?dato=<?php  echo$nif;?>">
<img src="../img/modificar.gif" border=0></a>
</td>


<td><?php $portada=mysqli_result($result,$i,'portada');?>
<input type="radio" name="portada<?php  echo$i;?>" value="1" <?php if ($portada==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $administracion=mysqli_result($result,$i,'administracion');?>
<input type="radio" name="administracion<?php  echo$i;?>" value="1" <?php if ($administracion==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $servicios=mysqli_result($result,$i,'servicios');?>
<input type="radio" name="servicios<?php  echo$i;?>" value="1" <?php if ($servicios==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $documentacion=mysqli_result($result,$i,'documentacion');?>
<input type="radio" name="documentacion<?php  echo$i;?>" value="1" <?php if ($documentacion==1){;?>checked="checked"<?php };?>  disabled></td>

<td><?php $informes=mysqli_result($result,$i,'informes');?>
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
<?php  
include('bbdd.php');
if ($ide!=null){;


$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['usuario'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['usuario'];


include('../portada_n/cabecera2.php');?>

<style>
tr:nth-child(even) {
  background-color: #f2f2f2;
}
/*
tr:nth-child(odd) {
  background-color: #fff;
}
*/
</style>
<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>


<form method="post" action="lusuario.php">

<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
</table>
<?php 
}else{;

$sql="SELECT * from usuariost where idempresa='".$ide."' and estado='".$estado."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>

<table><tr><td><?php include ('../js/busqueda.php');?></td>
<!--
<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="lusuario2.php?tipo=<?php  echo $tipo;?>&estadoe=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lusuario2.php?tipo=<?php  echo $tipo;?>&estadoe=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>
-->

<td width="150px" align="center"><a href="iusuario.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>
<!--
<td width="150px" align="center"><a href="fempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a></td>
-->
</tr>
</table>

<a href="pdfcartu.php?dato=todo">
Carta para todos los usuarios</a>

<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nº Usuario</td><td>Nombre Usuario</td><td>NIF</td><td>Doc.</td>

<td>Portada</td>
<td>Administracion</td>
<td>Servicios</td>
<td>Documentacion</td>
<td>Informes</td>
</tr>
</thead>
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
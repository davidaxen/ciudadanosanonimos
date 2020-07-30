<?php  
include('bbdd.php');


if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">CONTROL DE ACCESO DE USUARIOS</p>
</div>
<div class="contenido">
<?php 
//if ($datos!='datos'){;
?>
<!--
<table>
<form method="post" action="lusuarios.php">
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
-->
<?php 
//}else{;
/*
$sql="SELECT * from usuarios where idempresas='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
*/
?>

<table>
<tr class="subenc">
<td><?php  echo$usuarios;?></td><td><?php  echo$nombreu;?></td>
</tr>
</table>
<table>
<tr class="enctab"><td>Visitas ( Dia - Hora )</td></tr>

<?php 
$sql1="SELECT * from visitas where usuario='".$usuarios."' order by dia desc,hora desc"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$row=mysqli_num_rows($result1);
for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);
?>
<tr class="dattab">
<td>
<?php $dia=$resultado1['dia'];?><?php  echo$dia;?>-<?php $hora=$resultado1['hora'];?><?php  echo$hora;?>
</td>
</tr>
<?php };?>
</table>
</div>
</div>
<?php //};?>

<?php } else {;

include ('../cierre.php');

 };
 ?>

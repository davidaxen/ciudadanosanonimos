<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACIONES DE CLIENTES</p>
</div>
<div class="contenido">



<?php 
if ($ide==19){;?>

<?php 
$sql="SELECT * from empresas order by idempresas asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<table>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $idempresas=mysqli_result($result,$i,'idempresas');?><?php  echo$idempresas;?></td>
<td><?php $nombre=mysqli_result($result,$i,'nombre');?><?php  echo$nombre;?></td>
<td><?php $nif=mysqli_result($result,$i,'nif');?><?php  echo$nif;?></td>
<td><?php $estado=mysqli_result($result,$i,'estado');?>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="modservicios.php?idempresas=<?php  echo$idempresas;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
<?php } else {;?>
<?php 
$sql="SELECT * from empresas where idempresas='".$ide."' order by idempresas asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<table>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $idempresas=mysqli_result($result,$i,'idempresas');?><?php  echo$idempresas;?></td>
<td><?php $nombre=mysqli_result($result,$i,'nombre');?><?php  echo$nombre;?></td>
<td><?php $nif=mysqli_result($result,$i,'nif');?><?php  echo$nif;?></td>
<td><?php $estado=mysqli_result($result,$i,'estado');?>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="modservicios.php?idempresas=<?php  echo$idempresas;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
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


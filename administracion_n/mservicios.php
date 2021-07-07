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
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();*/
?>
<table>
<?php  
	//for ($i=0; $i<$row; $i++){;
	foreach ($result as $rowmos) {

	?>
<tr class="menor1">
<td><?php $idempresas=$rowmos['idempresas'];?><?php  echo$idempresas;?></td>
<td><?php $nombre=$rowmos['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$rowmos['nif'];?><?php  echo$nif;?></td>
<td><?php $estado=$rowmos['estado'];?>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="modservicios.php?idempresas=<?php  echo$idempresas;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
<?php } else {;?>
<?php 
$sql="SELECT * from empresas where idempresas='".$ide."' order by idempresas asc";
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();*/
?>
<table>
<?php  
	//for ($i=0; $i<$row; $i++){;
	foreach ($result as $rowmos) {
?>
<tr class="menor1">
<td><?php $idempresas=$rowmos['idempresas'];?><?php  echo$idempresas;?></td>
<td><?php $nombre=$rowmos['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$rowmos['nif'];?><?php  echo$nif;?></td>
<td><?php $estado=$rowmos['estado'];?>
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


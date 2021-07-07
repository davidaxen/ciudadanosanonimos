<?php  
include('bbdd.php');

if ($ide!=null){;


$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['proveedor'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['proveedor'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">
<?php 
if ($enviar==null){;?>
<form action="mproveedor.php" method="post" name="form2">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
Estado <select name="estadoe">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<?php 

$sql="SELECT * from proveedores where idempresas='".$ide."' and estado='".$estadoe."' order by idproveedor asc"; 
//echo  $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultado=$result->fetchAll();
$row=count($resultado);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
//echo  $row;
?>

<?php  
if ($row==0){
echo  "No tiene ning&uacuten proveedor dado de ";
?>
<?php if ($estadoe=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?>
<?php 
}else{
	?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
	
	<?php 
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idproveedor=$rowmos['idproveedor'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$estado=$rowmos['estado'];
?>
<tr class="menor1">
<td><?php  echo $idproveedor;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="modproveedores.php?idproveedor=<?php  echo $idproveedor;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
<?php };?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php };?>
<?php } else {;

include ('../cierre.php');

 };
 ?>

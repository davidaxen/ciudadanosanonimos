<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE PROVINCIA</p></div>
<div class="contenido">

<?php 
$datos='datos';

if ($datos!='datos'){;
?>

<table>
<form method="post" action="lprovincia.php">


<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from provincias"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>

<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Cod Provincia</td><td>Provincia</td><td>Cod Comunidad</td><td>Opciones</td></tr>
</thead>
<?php  
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$id=$resultado['id'];
$provincia=$resultado['provincia'];
$idcomunidad=$resultado['comunidad_id'];
?>
<tr class="dattab">
<td><?php  echo $id;?></td>
<td><?php  echo $provincia;?></td>
<td><?php  echo $idcomunidad;?></td>
<td><a href="modprovincia.php?id=<?php echo $id?>"><img src="../img/modificar.gif"></a></td>

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
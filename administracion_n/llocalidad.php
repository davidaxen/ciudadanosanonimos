<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE LOCALIDAD</p></div>
<div class="contenido">

<?php 
$datos='datos';

if ($datos!='datos'){;
?>

<table>
<form method="post" action="llocalidad.php">


<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from municipios"; 

$result=$conn->prepare($sql);
$resultmos=$conn->prepare($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>

<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Cod Municipio</td><td>Municipio</td><td>Provincia</td></tr>
</thead>
<?php  


foreach ($resultmos as $row1) {
	
	$id=$row1['id'];
	$municipio=$row1['municipio'];
	$idprovincia=$row1['provincia_id'];
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$id=$resultado['id'];
//$municipio=$resultado['municipio'];
//$idprovincia=$resultado['provincia_id'];
?>
<tr class="dattab">
<td><?php  echo $id;?></td>
<td><?php  echo $municipio;?></td>
<td><?php  echo $idprovincia;?></td>
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
<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">MODIFICACION DE PROYECTOS</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="mproyectos.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Proyectos</td><td><select name="estadop">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from proyectos where estado='".$estadop."' order by idproyectos asc"; 
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<?php include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>N&ordm; Proyecto</td><td>Nombre Proyecto</td><td>Web</td><td>Dias de Prueba</td><td>Logotipo</td><td>Opcion</td></tr>
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
?>
<tr class="dattab">
<td><?php $idproyectos=$rowmos['idproyectos'];?><?php  echo $idproyectos;?></td>
<td><?php $nombre=$rowmos['nombre'];?><?php  echo $nombre;?></td>
<td><?php $web=$rowmos['web'];?><?php  echo $web;?></td>
<td><?php $diasprueba=$rowmos['diasprueba'];?><?php  echo $diasprueba;?></td>
<td><?php $logo=$rowmos['logo'];?><img src="../img/<?php  echo $logo;?>" width="50px"></td>
<td><a href="modproyectos.php?idproyectos=<?php  echo $idproyectos;?>"><img src="../img/modificar.gif" width="25px"></a></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

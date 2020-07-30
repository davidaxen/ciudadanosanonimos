<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">LISTADO DE PROYECTOS</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lproyectos.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Proyectos</td><td><select name="estador">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from proyectos where estado='".$estador."' order by idproyectos asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Nº Proyecto</td><td>Nombre Proyecto</td><td>Web</td><td>Dias de Prueba</td><td>Logotipo</td><td>Empresas asociadas</td></tr>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idproyectos=$resultado['idproyectos'];
$sqlt="SELECT * from empresas where estado='1' and idproyectos='".$idproyectos."'"; 
$resultt=mysqli_query ($conn,$sqlt) or die ("Invalid result");
$rowt=mysqli_num_rows($resultt);


$nombre=$resultado['nombre'];
$web=$resultado['web'];
$diasprueba=$resultado['diasprueba'];
$logo=$resultado['logo'];
?>
<tr class="dattab">
<td><?php  echo $idproyectos;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $web;?></td>
<td><?php  echo $diasprueba;?></td>
<td><img src="../img/<?php  echo $logo;?>" width="50px"></td>
<td><a href="lempresap.php?idproyectos=<?php echo $idproyectos;?>"><?php  echo $rowt;?></a></td>
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

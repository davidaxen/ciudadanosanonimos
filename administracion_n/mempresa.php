<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE EMPRESAS</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>

<form method="post" action="mempresa.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value="todas">Todas</option>
<option value=0>Baja</option>
<option value=1>Alta</option>
</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>

<?php 
}else{;

$sql="SELECT * from empresas ";

if($estador!="todas"){;
$sql.="where estado='".$estador."'";
};
$sql.=" order by idempresas asc"; 
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?php 
switch($estador){;
case "todas": $tdf="";break;
case 0: $tdf="Baja";break;
case 1: $tdf="Alta";break;
};
?>
<h4>Listado de Empresas <?php  echo$tdf;?></h4>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="subenc"><td>N&ordm; Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Logotipo</td><td>Opciones</td></tr>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
?>
<tr class="menor1">
<td><?php $idempresas=$resultado['idempresas'];?><?php  echo$idempresas;?></td>
<td><?php $nombre=$resultado['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$resultado['nif'];?><?php  echo$nif;?></td>
<td><?php $logotipo=$resultado['logotipo'];?><img src="../img/<?php  echo$logotipo;?>" width="50"></td>
<td><a href="modempresa.php?idempresas=<?php  echo$idempresas;?>"><img src="../img/modificar.gif" border="0"></a></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

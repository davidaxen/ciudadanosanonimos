<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">LISTADO DE EMPRESAS</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lempresa.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from empresas where estado='".$estador."' order by idempresas asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nº Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Dom.</td><td>Loc.</td><td>CP.</td><td>Nº Cuenta</td><td>Logotipo</td></tr>
</thead>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idempresas=$resultado['idempresas'];
$nombre=$resultado['nombre'];
$nif=$resultado['nif'];
$domicilio=$resultado['domicilio'];
$localidad=$resultado['localidad'];
$cp=$resultado['cp'];
$ncc=$resultado['ncc'];
$logotipo=$resultado['logotipo'];
?>
<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $domicilio;?></td>
<td><?php  echo $localidad;?></td>
<td><?php  echo $cp;?></td>
<td><?php  echo $ncc;?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>
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

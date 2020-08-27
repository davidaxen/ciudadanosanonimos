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
<form method="post" action="lcempresa.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>

<tr><td>Fecha</td><td>
<select name="m">
<option value="1">Enero
<option value="2">Febrero
<option value="3">Marzo
<option value="4">Abril
<option value="5">Mayo
<option value="6">Junio
<option value="7">Julio
<option value="8">Agosto
<option value="9">Septiembre
<option value="10">Octubre
<option value="11">Noviembre
<option value="12">Diciembre
</select>

/<input type="number" name="y" maxlength=4 size=5 value="2019"></td></tr


<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from empresas where estado=:estador order by idempresas asc";
$result=$conn->prepare($sql);
$result->bindParam(':estador', $estador);
$result->execute();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab">
<td rowspan="2">Nº Empresa</td>
<td rowspan="2">Nombre Empresa</td>
<td rowspan="2">NIF</td>
<td rowspan="2">Logotipo</td>
<td colspan="2">Alta Actualmente</td><td colspan="5">Alta en <?php echo $m?>/<?php echo $y?></td></tr> 
<tr class="enctab">
<td>Clientes</td>
<td>Empleados</td>
<td>Clientes</td>
<td>Empleados</td>
<td>Servicios</td>
<td>Incidencias</td>
<td>Mensajes</td>
</tr>
</thead>
</tr>
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempresas=$rowmos['idempresas'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$domicilio=$rowmos['domicilio'];
$localidad=$rowmos['localidad'];
$cp=$rowmos['cp'];
$ncc=$rowmos['ncc'];
$logotipo=$rowmos['logotipo'];
?>
<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>
<?php
$sql10="SELECT * from clientes where idempresas=:idempresas and estado='1'";
$result10=$conn->prepare($sql10);
$result10->bindParam(':idempresas', $idempresas);
$result10->execute();
$row10=count($result10->fetchAll());

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row10=mysqli_num_rows($result10);*/

$sql11="SELECT * from empleados where idempresa=:idempresas and estado='1'";
$result11=$conn->prepare($sql11);
$result11->bindParam(':idempresas', $idempresas);
$result11->execute();
$row11=count($result11->fetchAll());

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$row11=mysqli_num_rows($result11);*/

$fi=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$ff=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));

$sql12="SELECT distinct(idpiscina) from almpc where idempresas=:idempresas and dia between :fi and :ff"; 
//echo $sql12;
$result12=$conn->prepare($sql12);
$result12->bindParam(':idempresas', $idempresas);
$result12->bindParam(':fi', $fi);
$result12->bindParam(':ff', $ff);
$result12->execute();
$row12=count($result12->fetchAll());

/*$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$row12=mysqli_num_rows($result12);*/

$sql13="SELECT distinct(idempleado) from almpc where idempresas=:idempresas and dia between '".$fi."' and '".$ff."'";
$result13=$conn->prepare($sql13);
$result13->bindParam(':idempresas', $idempresas);
$result13->bindParam(':fi', $fi);
$result13->bindParam(':ff', $ff);
$result13->execute();
$row13=count($result13->fetchAll());

/*$result13=mysqli_query ($conn,$sql13) or die ("Invalid result13");
$row13=mysqli_num_rows($result13);*/

$sql14="SELECT distinct(idpccat) from almpc where idempresas=:idempresas and dia between '".$fi."' and '".$ff."'"; 
$result14=$conn->prepare($sql14);
$result14->bindParam(':idempresas', $idempresas);
$result14->bindParam(':fi', $fi);
$result14->bindParam(':ff', $ff);
$result14->execute();
$row14=count($result14->fetchAll());

/*$result14=mysqli_query ($conn,$sql14) or die ("Invalid result13");
$row14=mysqli_num_rows($result14);*/

$sql15="SELECT * from almpcinci where idempresas=:idempresas and dia between :fi and :ff";
$result15=$conn->prepare($sql15);
$result15->bindParam(':idempresas', $idempresas);
$result15->bindParam(':fi', $fi);
$result15->bindParam(':ff', $ff);
$result15->execute();
$row15=count($result15->fetchAll());

/*$result15=mysqli_query ($conn,$sql15) or die ("Invalid result13");
$row15=mysqli_num_rows($result15);*/

$sql16="SELECT * from mensajes where idempresa=:idempresas and dia between :fi and :ff";
$result16=$conn->prepare($sql16);
$result16->bindParam(':idempresas', $idempresas);
$result16->bindParam(':fi', $fi);
$result16->bindParam(':ff', $ff);
$result16->execute();
$row16=count($result16->fetchAll());

/*$result16=mysqli_query ($conn,$sql16) or die ("Invalid result13");
$row16=mysqli_num_rows($result16);*/

?>
<td><?php echo $row10;?></td><td><?php echo $row11;?></td>
<td><?php echo $row12;?></td><td><?php echo $row13;?></td>
<td><?php echo $row14;?></td>
<td><?php if($row15>0){;?>&#x2714;<?php };?></td>
<td><?php if($row16>0){;?>&#x2714;<?php };?></td>
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

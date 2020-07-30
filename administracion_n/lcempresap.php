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

$sql="SELECT * from empresas where idempresas='".$idempresas."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
?>



<table>
<tr class="enctab">
<td rowspan="2">Nº Empresa</td>
<td rowspan="2">Nombre Empresa</td>
<td rowspan="2">NIF</td>
<td rowspan="2">Logotipo</td>
<td colspan="2">Alta Actualmente</td>
</tr>
<tr class="enctab">
<td>Clientes</td>
<td>Empleados</td>
</tr>
<?php  
$resultado=mysqli_fetch_array($result);
$idempresas=$resultado['idempresas'];
$nombre=$resultado['nombre'];
$nif=$resultado['nif'];
$domicilio=$resultado['domicilio'];
$localidad=$resultado['localidad'];
$cp=$resultado['cp'];
$ncc=$resultado['ncc'];
$logotipo=$resultado['logotipo'];
$yearalta=$resultado['yearalta'];
?>
<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>
<?php
$sql10="SELECT * from clientes where idempresas='".$idempresas."' and estado='1'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row10=mysqli_num_rows($result10);

$sql11="SELECT * from empleados where idempresa='".$idempresas."' and estado='1'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$row11=mysqli_num_rows($result11);
?>
<td><?php echo $row10;?></td>
<td><?php echo $row11;?></td>
</tr>
</table>







<?include ('../js/busqueda.php');?>
<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab">
<td>Fecha</td>
<td>Clientes</td>
<td>Empleados</td>
<td>Servicios</td>
<td>Incidencias</td>
<td>Mensajes</td>
</tr>
</thead>



<?php
$hoy=getdate();
$yi=$hoy['year']+1;

for($y=$yearalta;$y<$yi;$y++){;

for ($m=1; $m<13; $m++){;

$fi=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$ff=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));

$sql12="SELECT distinct(idpiscina) from almpc where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$row12=mysqli_num_rows($result12);

$sql13="SELECT distinct(idempleado) from almpc where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result13");
$row13=mysqli_num_rows($result13);

$sql14="SELECT distinct(idpccat) from almpc where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result14=mysqli_query ($conn,$sql14) or die ("Invalid result13");
$row14=mysqli_num_rows($result14);

$sql15="SELECT * from almpcinci where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result15=mysqli_query ($conn,$sql15) or die ("Invalid result13");
$row15=mysqli_num_rows($result15);

$sql16="SELECT * from mensajes where idempresa='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result16=mysqli_query ($conn,$sql16) or die ("Invalid result13");
$row16=mysqli_num_rows($result16);

?>
<tr>
<td><?php echo $m?>/<?php echo $y?></td>
<td><?php echo $row12;?></td>
<td><?php echo $row13;?></td>
<td><?php echo $row14;?></td>
<td><?php if($row15>0){;?>&#x2714;<?php };?></td>
<td><?php if($row16>0){;?>&#x2714;<?php };?></td>
</tr>
<?php 
};
};?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

<?php 
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();

//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();
//$row=count($num_rows);

//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['empleados'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($tipo==null){;?>
<form action="mempleados.php" method="post">
<table>
<tr><td>Estado</td><td>
<select name="tipo">
<option value="alta">Alta
<option value="baja">Baja
</select></td></tr>
<tr><td>Orden</td><td>
<select name="orden">
<option value="1">Nombre
<option value="2">Numero de <?php  echo strtoupper($nc);?>
</select></td></tr>
<tr><td colspan="2">
<input type="submit"  class="envio" name="Enviar" value="enviar">
</form></td></tr>
</table>
<?php }else{;?>
<?php 

$sql="SELECT * from empleados where idempresa='".$ide."'"; 
if ($tipo=='alta'){;
$sql.=" and estado='1'";
}else{
$sql.=" and estado='0'";
};
if ($orden=='1'){;
$sql.=" order by nombre asc";
}else{
$sql.=" order by idempleado asc";
};

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<?php  include ('../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr><td>N&ordm; Empleado</td><td>Nombre Empleado</td><td>Nif</td><td>Opcion</td></tr>
</thead>

<?php  

foreach ($resultmos as $row) {

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
$idempleado=$row['idempleado'];
$nombre=$row['nombre'];
$apellido1=$row['1apellido'];
$apellido2=$row['2apellido'];
$nif=$row['nif'];
$nempleado=$nombre.", ".$apellido1." ".$apellido2;
?>
<tr class="menor1">
<td><?php  echo $idempleado;?></td>
<td><?php  echo strtoupper($nempleado);?> </td>
<td><?php  echo strtoupper($nif);?></td>

<td><a href="modempleados.php?idempleado=<?php  echo $idempleado;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
</div>
</div>
<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>

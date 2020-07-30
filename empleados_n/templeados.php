<html>
<head>
<title>Transformacion de contrato de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">TRANSFORMACION DE CONTRATO DE EMPLEADOS</td></tr>
</table>



<?php 
if ($idc==null){;?>

<form action="templeados.php" method="post">
<table>
<tr><td>Datos del Empleado</td><td>
<?php $sql="select empleados.idempleado, nombre, 1apellido, 2apellido from empleados,altass where altass.idempresa=empleados.idempresa and altass.idempleado=empleados.idempleado and (tcontrato='401' or tcontrato='501') and fechabaja='0000-00-00' and empleados.idempresa='".$ide."' and estado='1'"; 
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);?>
<select name="idc">
<?php for ($i;$i<$row;$i++){;
$idc=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
?>
<option value="<?php  echo $idc;?>"><?php  echo $nombre;?>, <?php  echo $apellido1;?> <?php  echo $apellido2;?>
<?php };?>
</select></td></tr>

<tr><td colspan="2"><input type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="templeados">


<tr><td>Datos del Empleado</td><td><input type="hidden" name="idc" value="<?php  echo $idc;?>">

<?php $sql="select id, nombre, 1apellido, 2apellido from empleados where idempresa='".$ide."' and idempleado='".$idc."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
$id=$resultado['id'];
?>
<?php 
$sql01="select * from altass where idempresa='".$ide."' and idempleado='".$idc."' and añobaja='0'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result empleados");
$resultado01=mysqli_fetch_array($result01);
$ida=$resultado01['id'];
$rama=$resultado01['idafiliaciones'];
$tcontrato=$resultado01['tcontrato'];
$fjornada=$resultado01['fjornada'];
$nhoras=$resultado01['nhoras'];
$diaalta=$resultado01['diaalta'];
$mesalta=$resultado01['mesalta'];
$añoalta=$resultado01['añoalta'];

$sql4="select * from tipocontrato where modelo='".$tcontrato."'";
$result4=mysqli_query ($conn,$sql4) or die ("Invalid result4");
$resultado4=mysqli_fetch_array($result4);
$tjor=$resultado4['idjornada'];
$dcontrato=$resultado4['descripcion'];
$sql5="select * from jornada where idjornada='".$tjor."'";
$result5=mysqli_query ($conn,$sql5) or die ("Invalid result4");
$resultado5=mysqli_fetch_array($result5);
$tjornada=$resultado5['jornada'];

$sql02="select * from causabaja"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);?>


<?php  echo $nombre;?>, <?php  echo $apellido1;?> <?php  echo $apellido2;?></td></tr>
<tr><td>Rama de la Empresa</td><td>

<input type="hidden" name="rama" value="<?php  echo $rama;?>">
<input type="hidden" name="id" value="<?php  echo $id;?>">
<input type="hidden" name="ida" value="<?php  echo $ida;?>">
<input type="hidden" name="tcontratonuev" value="170">
<input type="hidden" name="tcontratotrans" value="183">
<input type="hidden" name="tcontratoviej" value="<?php  echo $tcontrato;?>">

<?php $sql1="select * from afiliacion where idempresa='".$ide."' and id='".$rama."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empleados");
$resultado1=mysqli_fetch_array($result1);
$nombrerama=$resultado1['nombre'];
?>
<?php  echo $nombrerama;?>

</td></tr>
<tr><td>Tipo de Contrato</td><td><?php  echo $tcontrato;?>-<?php  echo $dcontrato;?></td></tr>
<tr><td>Tipo de Jornada</td><td><?php  echo $tjornada;?></td></tr>
<tr><td>Nº Horas</td><td><?php  echo $nhoras;?></td></tr>
<tr><td>Fecha de Alta SS</td><td><?php  echo $diaalta;?> - <?php  echo $mesalta;?> - <?php  echo $añoalta;?></td></tr>

<tr><td>Fecha de transformacion</td><td><input type="text" name="dia" maxlength="2" size=2> - <input type="text" name="mes" maxlength="2" size=2> - <input type="text" name="año" maxlength="4" size=4></td></tr>


<tr><td colspan="2"><input type="submit"  class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>





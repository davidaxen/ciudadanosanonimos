<html>
<?php if ($com=="comprobacion"){;?>
<head>
<title>Modificacion de Cuadrante</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>


<body>
<table>
<tr><td><img src="../img/<?php  echo $img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Modificación de Cuadrante</font></td></tr>
</table>
<?php 
if ($enviar==null){;

$sql="select distinct(idcomunidad) as comunidad from cuadrante where idempresas='".$ide."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("invalid result");
$row=mysqli_num_rows($result);

?>
<form action="mcuadrante.php" method="post">
<table>
<tr><td>Nombre de Clientes</td></tr>
<tr><td>
<select name="clientes">
<option value=" "> 
<option value="0">sin determinar
<?php  
for ($j=0; $j<$row; $j++){;
$resultado=mysqli_fetch_array($result);
$idp=$resultado['comunidad'];
$sql0="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$idp."' and estado='1'";
$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
$row0=mysqli_num_rows($result0);
if ($row0==1){;
$resultado0=mysqli_fetch_array($result0);
$nombrep=$resulado0['nombre'];
?>
<option value="<?php  echo $idp?>"><?php  echo $nombrep;?>
<?php };?>
<?php };?>
</select></td>
</tr>
<tr><td>Turno</td></tr>
<tr>
<td><select name="turno"><option value="1">Mañana<option value="2">Tarde<option value="3">Noche</select></td>
</tr>
<tr><td>Dia</td></tr>
<tr><td><input type="text" name="dia"></td></tr>
<tr><td>Mes</td></tr>
<td>
<select size="1" name="mes" size="23">
<option value=" "> </option>
<option value="1">Enero</option>
<option value="2">Febrero</option>
<option value="3">Marzo</option>
<option value="4">Abril</option>
<option value="5">Mayo</option>
<option value="6">Junio</option>
<option value="7">Julio</option>
<option value="8">Agosto</option>
<option value="9">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select></td>
</tr>

<tr><td>Año</td></tr>
<tr>
<td>
<select name="año">
<option value=" "> 
<?php $today=getdate();
$a=$today['year'];
$b=$a+2;
for ($j=2004;$j<$b;$j++){;?>
<option value="<?php  echo $j?>"><?php  echo $j?>
<?php };?>
</select>
</td></tr>

<tr><td>¿Que es lo que quieres cambiar?</td></tr>
<tr>
<td>
<select name="fun">
<option value="1">Empleado
<option value="2">Horas
</select>
</td></tr>
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>
<?php 
}else{;
$t10=date('Y-n-j',mktime(0,0,0,$mes,$dia,$año));
$sql20="select idempleado,horas,visita from cuadrante where idcomunidad='".$clientes."' and idempresas='".$ide."' and fecha='".$t10."' and turno='".$turno."'";
//echo $sql20;

$result20=mysqli_query ($conn,$sql20) or die ("Invalid result0");
$row20=mysqli_num_rows($result20);
if ($row20==1){;
$resultado20=mysqli_fetch_array($result20);
$empleado=$resultado20['idempleado'];
$horas=$resultado20['horas'];
$visita=$resultado20['visita'];

$sql30="select idempleado, nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."' and idempleado='".$empleado."'";
//echo $sql30;
$result30=mysqli_query ($conn,$sql30) or die ("Invalid result0");
$resultado30=mysqli_fetch_array($result30);
$anombree=$resultado30['nombre'];
$aapellidope=$resultado30['pa'];
$aapellidose=$resultado30['sa'];

};


$sql11="select idempleado from datos_personal where idempresa='".$ide."' and idcliente='".$clientes."'";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result10");
$row11=mysqli_num_rows($result11);

$sql10="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$clientes."'";
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
$resultado10=mysqli_fetch_array($result10);
$nombrep=$resultado10['nombre'];
?>
<p>
<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tabla" value="mcuadrante"> 
<table border=0>
<input type="hidden" name="idcomunidad" value="<?php  echo $clientes;?>">
<input type="hidden" name="turno" value="<?php  echo $turno;?>">
<input type="hidden" name="fecha" value="<?php  echo $t10;?>">
<input type="hidden" name="antempleado" value="<?php  echo $empleado;?>">
<input type="hidden" name="anthoras" value="<?php  echo $horas;?>">
<input type="hidden" name="antvisita" value="<?php  echo $visita;?>">

<tr><td>nombre de la Comunidad</td><td><?php  echo $nombrep;?></td></tr>
<tr><td>Turno</td><td>
<?php switch ($turno){;
case 1: $d="Mañana";break;
case 2: $d="Tarde";break;
case 3: $d="Noche";break;
};
?>
<?php  echo $d;?></td></tr>
<tr><td>Dia</td><td><?php  echo $t10;?></td></tr>
<tr>
<td>Empleado<?php if ($fun==1){;?> Anterior<?php };?></td>
<td><?php  echo strtoupper($anombree)?> <?php  echo strtoupper($aapellidope)?> <?php  echo strtoupper($aapellidose)?></td></tr>
<tr>
<td>Horas<?php if ($fun==2){;?> Anterior<?php };?></td>
<td><?php  echo strtoupper($horas);?></td></tr>

<?php if ($fun==1){;?>
<input type="hidden" name="nuehoras" value="<?php  echo $horas;?>">
<tr><td>Empleado Nuevo</td>
<td>
<select name="nueempleados">
<?php if ($idempl==null){;?>
<option value="b">Borrar/Eliminar 
<?php };?>
<?php  for ($j=0; $j<$row11; $j++){;?>
<?php $idce=mysqli_result($result11,$j,idempleado);?>
<?php 
$sql0="select nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."' and idempleado='".$idce."'";
$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
$resultado0=mysqli_fetch_array($result0);
$nombree=$resultado['nombre'];
$apellidope=$resultado['pa'];
$apellidose=$resultado['sa'];?>
<option value="<?php  echo $idce?>"><?php  echo strtoupper($nombree)?> <?php  echo strtoupper($apellidope)?> <?php  echo strtoupper($apellidose)?>
<?php };?>
</select>
<?php }else{;?>
<input type="hidden" name="nueempleados" value="<?php  echo $empleado;?>">
<tr><td>Horas Nuevas</td>
<td>
<input type="text" name="nuehoras">
<?php };?>
</td>
</tr>
<tr>
<td>Necesita visita/ayuda</td>
<td><select name="nuevisita">
<option value="0" <?php if($visita=="0"){;?>selected<?php };?> >No
<option value="1" <?php if($visita=="1"){;?>selected<?php };?> >Sí
</select>
</td></tr>

</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>

<?php };

}else{;
include ('../cierre.php');
 };?>

</body>
</html>
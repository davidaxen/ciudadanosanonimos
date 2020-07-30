<?php 
include('bbdd.php');
?>


<html>
<?php if ($com=="comprobacion"){;?>
<head>
<title>Cuadrante por Empleado</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas");
$resultado1=mysqli_fetch_array($result1);
$trab=$resultado1['trabajadores'];
?>
<script>
function ComponerLista(depto, fabr, prod){
fabr.disabled=true;
prod.lenght=0;
SeleccionarEmpleados (depto, prod);
fabr.disabled=false;
}

function SeleccionarEmpleados (depto, prod){
var o;
prod.disabled=true;
prod.length=0;
if (depto == "todos"){;
o=document.createElement("OPTION");
o.value="todos";
o.text="Todos";
prod.options.add(o);
}
/*
if (depto == "0"){;
o=document.createElement("OPTION");
o.value="todos0";
o.text="Todos";
prod.options.add(o);
};
if (depto == "1"){;
o=document.createElement("OPTION");
o.value="todos1";
o.text="Todos";
prod.options.add(o);
};
*/
<?php 
$sql2="select idempleado, nombre, 1apellido as pa, 2apellido as sa, estado from empleados where idempresa='".$ide."' order by idempleado";
//$sql2="SELECT idclientes,nombre,estado from clientes where idempresas='".$ide."' order by idclientes asc";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
while ($empl = mysqli_fetch_array($result2)){;
?>

if (depto == "<?php  echo $empl['estado']?>"){
o=document.createElement("OPTION");
o.value="<?php  echo $empl['idempleado']?>";
o.text="<?php  echo $empl['nombre'];?>, <?php  echo $empl['pa'];?> <?php  echo $empl['sa'];?>";
prod.options.add(o);
}
<?php };?>
prod.disabled=false;
}

</script>

<body>
<table>
<tr><td><img src="../img/<?php  echo $img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Cuadrante por Empleado</font></td></tr>
</table>
<?php 
if ($enviar==null){;

if  ($trab=='1'){;
$sql2="select idempleado from empleados where nif='".$user."' and idempresa='".$ide."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result empleados");
$resultado2=mysqli_fetch_array($result2);
$idempl=$resultado2['idempleado'];
$sql20="select idempleado, nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."' and idempleado='".$idempl."'";
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result0");
$row20=mysqli_num_rows($result20);
}else{;
$sql20="select idempleado, nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."' and estado='1'";
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result0");
$row20=mysqli_num_rows($result20);
};
?>
<form action="calcuadranteemp.php" method="post">
<table>

<?php if  ($trab=='1'){;?>
<tr><td>Nombre de Empleado</td></tr>
<tr><td>
<input type="hidden" name="empleado" value="<?php  echo $idempl;?>">
<?php 
$resultado20=mysqli_fetch_array($result20);
$nombree=$resultado20['nombre'];
$apellidope=$resultado20['pa'];
$apellidose=$resultado20['sa'];?>
<?php  echo strtoupper($nombree)?> <?php  echo strtoupper($apellidope)?> <?php  echo strtoupper($apellidose)?>
<?php }else{;?>
<tr><td colspan=3>Estado del Empleados</td></tr>
<tr><td colspan=3><select name="estcliente" onChange="ComponerLista(this.value, estcliente, empleado)">
<option value="todos">Todos</option>
<option value="0">Baja</option>
<option value="1">Alta</option>
</select>
</td></tr>
<tr><td colspan=3>Nombre de Empleados</td></tr>
<tr><td colspan=3><select name="empleado">
<option value="todos">Todos</option>
<!--
<select name="empleado">
<option value=" "> 
<?php  for ($j=0; $j<$row20; $j++){;
mysqli_data_seek($result20,$j);
$resultado20=mysqli_fetch_array($result20);
$idempl=$resultado20['idempleado'];
$nombree=$resultado20['nombre'];
$apellidope=$resultado20['pa'];
$apellidose=$resultado20['sa'];?>
<option value="<?php  echo $idempl?>"><?php  echo strtoupper($nombree)?> <?php  echo strtoupper($apellidope)?> <?php  echo strtoupper($apellidose)?>
<?php };?>
</select>-->
<?php };?>
</td></tr>
<tr><td>Mes</td></tr>
<td>
<select size="1" name="mes" size="23">
<option value=" "> </option>
<?php if  ($trab!='1'){;?><option value="0">Todos</option><?php };?>
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
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>
<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
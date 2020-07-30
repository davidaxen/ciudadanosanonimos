<?php 
include('bbdd.php');
?>


<html>
<?php if ($com=="comprobacion"){;?>
<head>
<title>Cuadrante por Comunidad</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>


<body>
<table>
<tr><td><img src="../img/<?php  echo $img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Cuadrante por Comunidad</font></td></tr>
</table>
<?php 
if ($enviar==null){;

$sql0="select idclientes,nombre from clientes where idempresas='".$ide."' and estado='1'";
$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
$row0=mysqli_num_rows($result0);
?>
<form action="calcuadrantecom.php" method="post">
<table>
<tr><td>Nombre de Clientes</td></tr>
<tr><td>
<select name="clientes">
<option value=" "> 
<option value="0">Sin determinar
<?php  for ($j=0; $j<$row0; $j++){;
mysqli_data_seek($result0,$j);
$resultado0=mysqli_fetch_array($result0);
$idp=$resultado0['idclientes'];
$nombrep=$resultado0['nombre'];
?>
<option value="<?php  echo $idp?>"><?php  echo $nombrep?>
<?php };?>
</select></td>
</tr>
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
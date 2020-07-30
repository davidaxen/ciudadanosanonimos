<?php 
include('bbdd.php');
?>


<html>
<head>
<title>Listado de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">COMUNICACION DE CONTRATACION</td></tr>
</table>

<?php if ($ide!=null){;?>

<form action="pdfcomcont.php" method="post">
<table>
<tr><td>Fecha de Contratación:</td><td><input type="text" name="dia" maxlength="2" size=2>-<input type="text" name="mes" maxlength="2" size=2>-<input type="text" name="año" maxlength="4" size=4></td></tr>
<tr><td>Rama de la Empresa</td></td><td>
<?php $sql1="select * from afiliacion where idempresa='".$ide."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empleados");
$row1=mysqli_num_rows($result1);?>
<select name="rama">
<?php for ($j;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);
$rama=$resultado1['id'];
$nombrerama=$resultado1['nombre'];
?>
<option value="<?php  echo $rama;?>"><?php  echo $nombrerama;?>
<?php };?>
</select></td></tr>
<tr><td><input class="envio" type="submit" name="Enviar" value="enviar"></td></tr>
</form>

<?php }else{;
include ('../cierre.php');
 };?>
</body>
</html>
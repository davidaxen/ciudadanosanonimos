<html>
<head>
<title>Acciones de Cuadrantes Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">ACCIONES DE CUADRANTES EMPLEADOS</td><td rowspan="2">&nbsp;</td></tr>
<tr><td class="enc">   </td></tr>
</table>
<table>
<tr><td><a href="acuadrante.php">Alta de Datos</a></td></tr>
<tr><td><a href="mcuadrante.php">Modificación de Datos</a></td></tr>
<tr><td><a href="lcuadranteemp.php">Listado por Empleados</a></td></tr>
<tr><td><a href="lcuadrantecom.php">Listado por Comunidad</a></td></tr>

</table>




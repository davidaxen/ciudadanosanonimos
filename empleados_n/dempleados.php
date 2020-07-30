<html>
<head>
<title>Acciones con Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
if (isset($_GET[compactada]))
{
      $a=stripslashes ($_GET[compactada]);
      $mi_array=unserialize($a);
      $compactada=serialize($mi_array);
			$compactada=urlencode($compactada);
$user=$mi_array['user'];        
$pass=$mi_array['pass']; 
$com=$mi_array['com']; 
$img=$mi_array['img']; 
$ide=$mi_array['ide']; 
}
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">ACCIONES CON EMPLEADOS</td><td rowspan="2">&nbsp;</td></tr>
<tr><td class="enc">   </td></tr>
</table>
<table>
<tr><td><a href="iempleados.php">Alta de Empleados</a></td></tr>
<tr><td><a href="aempleados.php">Alta de Empleados en SS</a></td></tr>
<tr><td><a href="bempleados.php">Baja de Empleados en SS</a></td></tr>
<tr><td><a href="templeados.php">Transformacion de contratos de Empleados de Determinados a Indefinidos</a></td></tr>
<tr><td><a href="mempleados.php">Modificación de Empleados</a></td></tr>
<tr><td><a href="msalarios.php">Modificación de Salario de Empleados</a></td></tr>
<tr><td><a href="evsalarios.php">Evolución de Salario de Empleados</a></td></tr>
<tr><td><a href="lempleados.php">Listado de Empleados</a></td></tr>
<tr><td><a href="lempss.php">Listado de Seguridad Social</a></td></tr>
<tr><td><a href="lempcont.php">Listado de Contratos</a></td></tr>
<tr><td><a href="comcont.php">Comunicación de Contratación</a></td></tr>
<tr><td><a href="cartempl.php">Carta de acceso a Empleados</a></td></tr>
<tr><td><a href="cartvac.php">Carta de solicitud de Vacaciones</a></td></tr>
<tr><td><a href="datosccc.php">Comunicacion de CCC</a></td></tr>
<tr><td><a href="datosfin.php">Comunicacion Fin de Contrato</a></td></tr>
<tr><td><a href="datosbajor.php">Comunicacion de Bajo Rendimiento</a></td></tr>
<tr><td><a href="cbajalaboral.php">Comunicación de Baja Laboral</a></td></tr>
<tr><td><a href="caltalaboral.php">Comunicación de Alta Laboral</a></td></tr>
<tr><td><a href="cbajaenfermedad.php">Comunicación de Baja Enfermedad</a></td></tr>
<tr><td><a href="caltaenfermedad.php">Comunicación de Alta Enfermedad</a></td></tr>
<tr><td><a href="sobrese.php">Sobres</a></td></tr>
</table>






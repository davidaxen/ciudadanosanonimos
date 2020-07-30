<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=mensajes.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=8;


$sql1="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$ide."' and idempleado='".$idempleados."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
$apellidop=$resultado1['1apellido'];
$apellidos=$resultado1['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;




echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='1'>";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE ".strtoupper($nc)."</b></td></tr>";
echo "<tr><td colspan='2'>Nombre de la empresa</td><td>";
echo $nemp;
echo "</td></tr>";
echo "<tr><td colspan='2'>Nombre del Empleado</td><td>";
echo $nombret;
echo "</td></tr>";

echo "<tr>";
echo "<td><b>Dia Env.</b></td>";
echo "<td><b>Texto de Envio</b></td>";
echo "<td><b>Enviado por</b></td>";
echo "<td><b>Dia Resp.</b></td>";
echo "<td><b>Hora Resp.</b></td>";
echo "<td><b>Texto de Respuesta</b></td>";
echo "<td><b>Latitud</b></td>";
echo "<td><b>Longitud</b></td>";
echo "</tr>";


if ($tipo=="dia"){;
$fechaa=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, $d, $y));
$fechaf=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, $d+1, $y));
$sql="SELECT * from mensajes where idempresa='".$ide."' and idempleado='".$idempleados."' and dia between '".$fechaa."' and '".$fechaf."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);



for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$texto=$resultado['texto'];
$user=$resultado['user']
$diaresp=$resultado['diaresp'];
$horaresp=$resultado['horaresp'];
$respuesta=$resultado['respuesta'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];

echo "<tr><td>";
echo $dia;
echo "</td>";
echo "<td>";
echo $texto;
echo "</td>";
echo "<td>";
echo $user;
echo "</td>";
echo "<td>";
echo $diaresp;
echo "</td>";
echo "<td>";
echo $horaresp;
echo "</td>";
echo "<td>";
echo $respuesta;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "</tr>";

};

}else{;

$fechaa=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d H:i:s", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from mensajes where idempresa='".$ide."' and idempleado='".$idempleados."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);



for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$texto=$resultado['texto'];
$user=$resultado['user'];
$diaresp=$resultado['diaresp'];
$horaresp=$resultado['horaresp'];
$respuesta=$resultado['respuesta'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];

echo "<tr><td>";
echo $dia;
echo "</td>";
echo "<td>";
echo $texto;
echo "</td>";
echo "<td>";
echo $user;
echo "</td>";
echo "<td>";
echo $diaresp;
echo "</td>";
echo "<td>";
echo $horaresp;
echo "</td>";
echo "<td>";
echo $respuesta;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "</tr>";

};


};

echo "</table>";
?>

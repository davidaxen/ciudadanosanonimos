<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=acc_diarias.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=1;


$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch(); 

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1];*/
$nombre=$resultado1['nombre');








echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='2'>";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE ACCIONES DIARIAS</b></td></tr>";
echo "<tr><td colspan='2'>Nombre de la empresa</td><td>";
echo $nemp;
echo "</td></tr>";
echo "<tr><td colspan='2'>Datos del Cliente</td><td>";
echo $nombre;
echo "</td></tr>";

echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Hora</b></td>";
echo "<td><b>Empleado</b></td>";
echo "<td><b>Servicio</b></td>";
echo "<td><b>Latitud</b></td>";
echo "<td><b>Longitud</b></td>";
echo "<td><b>Tiempo</b></td>";
echo "</tr>";


if ($tipo=="dia"){;
$fechaa=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and dia='".$fechaa."'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$hora=$rowmos['hora'];
$idempleado=$rowmos['idempleado'];
$idpcsubcat=$rowmos['idpcsubcat'];
$tiempo=$rowmos['tiempo'];
$lat=$rowmos['lat'];
$lon=$rowmos['lon'];

echo "<tr class='subenc'><td>";
echo $fechaa;
echo "</td>";
echo "<td>";
echo $hora;
echo "</td>";
echo "<td>";

$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=$conn->query($sqlempl);
$resultadoempl=$resultempl->fetch(); 

/*$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);*/
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;

echo $nempleado;
echo "</td>";
echo "<td>";

$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=$conn->query($sqlsub);
$resultadosub=$resultsub->fetch(); 

/*$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($result);*/
$subcategoria=$resultadosub['subcategoria'];

echo $subcategoria;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "<td>";
echo $tiempo;
echo "</td>";
echo "</tr>";

};

}else{;


$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$dia=$rowmos['dia'];
$hora=$rowmos['hora'];
$idempleado=$rowmos['idempleado'];
$idpcsubcat=$rowmos['idpcsubcat'];
$tiempo=$rowmos['tiempo'];
$lat=$rowmos['lat'];
$lon=$rowmos['lon'];

echo "<tr class='subenc'><td>";
echo $dia;
echo "</td>";
echo "<td>";
echo $hora;
echo "</td>";
echo "<td>";

$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=$conn->query($sqlempl);
$resultado=$resultempl->fetch();

/*$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;

echo $nempleado;
echo "</td>";
echo "<td>";

$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sql;
$resultsub=$conn->query($sqlsub);
$resultadosub=$resultsub->fetch();

/*$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);*/
$subcategoria=$resultadosub['subcategoria'];

echo $subcategoria;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "<td>";
echo $tiempo;
echo "</td>";
echo "</tr>";

};


};

echo "</table>";
?>

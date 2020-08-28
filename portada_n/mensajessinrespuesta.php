<?php   
include('bbdd.php');
if ($ide!=null){;?>

<link rel="stylesheet" href="/estilo/estilonuevo.css" type="text/css" media="screen" charset="utf-8" >

<table>
<tr class="enctab"><td>Nombre del Empleado</td><td>Dia</td><td>Texto</td></tr>


<?php 

$sql="SELECT * from mensajes where idempresa='".$ide."' and respondido='0'";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_affected_rows();


foreach ($resultmos as $row) {

$idempleado=$row['idempleado'];
$dia=$row['dia'];
$texto=$row['texto'];

//for ($i=0;$i<$row;$i++){;
//$idempleado=mysqli_result($result,$i,'idempleado');
//$dia=mysqli_result($result,$i,'dia');
//$texto=mysqli_result($result,$i,'texto');

$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";

$result2=$conn->query($sql2);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
//$row2=mysqli_affected_rows();
//echo $row2;
if ($row2!=0){;
$nombre=mysqli_result($result2,0,'nombre');
$apellidop=mysqli_result($result2,0,'1apellido');
$apellidos=mysqli_result($result2,0,'2apellido');
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
}else{;
$nombret="sin datos";
};


?>
<tr class="dattab"><td><?php  echo $nombret;?></td><td><?php  echo $dia;?></td><td><?php  echo $texto;?></td></tr>





<?php };?>

</table>



<?php }else{;
include ('../cierre.php');
 };?>



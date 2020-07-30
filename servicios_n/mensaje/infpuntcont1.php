<?php  
include('bbdd.php');
if ($ide!=null){;


include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">SEGUIMIENTO DE <?php  echo strtoupper($nc);?> ENVIADOS</p></div>
<div class="contenido">



<table>
<tr class="enctab"><td>Nombre del Empleado</td><td>Dia</td><td>Texto</td></tr>


<?php 

$sql="SELECT * from mensajes where idempresa='".$ide."' and respondido='0'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$dia=$resultado['dia'];
$texto=$resultado['texto'];


$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
$resultado2=mysqli_fetch_array($result2);
//echo $row2;
if ($row2!=0){;
$nombre=$resultado2['nombre'];
$apellidop=$resultado2['1apellido'];
$apellidos=$resultado2['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
}else{;
$nombret="sin datos";
};


?>
<tr class="dattab"><td><?php  echo $nombret;?></td><td><?php  echo $dia;?></td><td><?php  echo $texto;?></td></tr>

<?php };?>

</table>


</div>
</div>


<?php } else {;
include ('../../cierre.php');
 };?>

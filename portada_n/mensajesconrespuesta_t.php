<?php   
include('bbdd.php');
if ($ide!=null){;?>
<script>
function refrescar1()
{
	window.location.reload();
}
</script>
<style type="text/css" media="print">
.nover {display:none}
</style>
<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
<body  onload="setTimeout('refrescar1()', 5000);">
<table>
<tr class="enctab"><td>Nombre del Empleado</td><td>Dia</td><td>Texto</td><td>Dia resp</td><td>Texto Respuesta</td></tr>


<?php 

$sql="SELECT * from mensajes where idempresa='".$ide."' and idempleado='".$idtrab."' and respondido='1' order by diaresp desc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);;

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$dia=$resultado['dia'];
$texto=$resultado['texto'];
$textoresp=$resultado['respuesta'];
$diaresp=$resultado['diaresp'];
$horaresp=$resultado['horaresp'];



$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);;
//echo $row2;
if ($row2!=0){;
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$apellidop=$resultado2['1apellido'];
$apellidos=$resultado2['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
}else{;
$nombret="sin datos";
};


?>
<tr class="dattab"><td><?php  echo $nombret;?></td><td><?php  echo $dia;?></td><td><?php  echo $texto;?></td>
<td><?php  echo $diaresp;?> - <?php  echo $horaresp;?></td><td><?php  echo $textoresp;?></td>
</tr>





<?php };?>

</table>



<?php }else{;
include ('../cierre.php');
 };?>



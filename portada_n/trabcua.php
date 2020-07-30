<?php   
include('bbdd.php');
/*
$fecha=$_GET["fecha"];
$idpccat=$_GET["idpccat"];
*/
$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$fechac=$dia.'/'.$mes.'/'.$año;

$sql1="SELECT * from cuadrante where fecha='".$fecha."' and idempresas='".$ide."'"; 
if($clivp!=0){;
$sql1.=" and idcomunidad='".$clivp."'";
};
$sql1.=" order by idempleado"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_affected_rows();
?>

<?php 
if ($ide!=null){;
?>
<?php  include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">Personal por Cuadrante, el dia: <?php  echo $fechac;?></p>
</div>
<div class="contenido">
<table border="0">
<tr class="subenc6"><td>Personal</td><td>Telefonos</td><td>Puesto de Trabajo</td><td>Hora</td><td>Turno</td></tr>
<?php for ($j=0;$j<$row1;$j++){;
$idempleado=mysqli_result($result1,$j,'idempleado');
$idcomunidad=mysqli_result($result1,$j,'idcomunidad');
$hora=mysqli_result($result1,$j,'horas');
$turno=mysqli_result($result1,$j,'turno');


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=mysqli_result($result10,0,'nombre');
$priape=mysqli_result($result10,0,'1apellido');
$segape=mysqli_result($result10,0,'2apellido');
$tele1=mysqli_result($result10,0,'tele1');
$tele2=mysqli_result($result10,0,'tele2');
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idcomunidad."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=mysqli_result($result11,0,'nombre');

?>
<tr class="subenc7"><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td>
<?php 
switch($turno){
	case 1:$vturno="mañana";break;
	case 2:$vturno="tarde";break;
	case 3:$vturno="noche";break;
	}
	?>
<?php  echo strtoupper($vturno);?>

</td>
</tr>
<?php };?>
</table>
<p>
<img border="0" alt="imprimir" class="nover" src="../img/printer.png" onclick="javascript:window.print()">
</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


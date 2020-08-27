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

$result1=$conn->query($sql1);
$result1mos=$conn->query($sql1);
$num_rows=$result1->fetchAll();
$row1=count($num_rows);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_affected_rows();
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
<?php 

foreach ($result1mos as $row1) {

//for ($j=0;$j<$row1;$j++){;
$idempleado=$row1['idempleado'];
$idcomunidad=$row1['idcomunidad'];
$hora=$row1['horas'];
$turno=$row1['turno'];

$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 

$result10=$conn->query($sql10);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$tele1=$num_rows[0]['tele1'];
$tele2=$num_rows[0]['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idcomunidad."' and idempresas='".$ide."'"; 

$result11=$conn->query($sql11);
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];

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


<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nc);?> ENVIADOS A EMPLEADOS</p></div>
<div class="contenido">
<?php 
if ($tipo=="dia"){;
$fechaant=date("d/m/Y", mktime(0, 0, 0, $m, $d-1,  $y));
$fechaact=date("d/m/Y", mktime(0, 0, 0, $m, $d,  $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, $m, $d+1,  $y));
$dant=$d-1;
$dpos=$d+1;
$mant=$m;
$mpos=$m;
$yant=$y;
$ypos=$y;
/*
$fechaant=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y-1));
$fechaact=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y+1));
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y-1;
$ypos=$y+1;
*/
}else{;
$dant=1;
$dpos=1;
$mant=$m-1;
$mpos=$m+1;
$yant=$y;
$ypos=$y;
//$fechaact=$d.'-'.$m.'-'.$y;
switch($m){;
case 1: $mant=12;$yant=$y-1;$fechaant="Diciembre ".$yant;$fechaact="Enero ".$y;$fechapos="Febrero ".$y;break;
case 2: $fechaant="Enero ".$y;$fechaact="Febrero ".$y;$fechapos="Marzo ".$y;break;
case 3: $fechaant="Febrero ".$y;$fechaact="Marzo ".$y;$fechapos="Abril ".$y;break;
case 4: $fechaant="Marzo ".$y;$fechaact="Abril ".$y;$fechapos="Mayo ".$y;break;
case 5: $fechaant="Abril ".$y;$fechaact="Mayo ".$y;$fechapos="Junio ".$y;break;
case 6: $fechaant="Mayo ".$y;$fechaact="Junio ".$y;$fechapos="Julio ".$y;break;
case 7: $fechaant="Junio ".$y;$fechaact="Julio ".$y;$fechapos="Agosto ".$y;break;
case 8: $fechaant="Julio ".$y;$fechaact="Agosto ".$y;$fechapos="Septiembre ".$y;break;
case 9: $fechaant="Agosto ".$y;$fechaact="Septiembre ".$y;$fechapos="Octubre ".$y;break;
case 10: $fechaant="Septiembre ".$y;$fechaact="Octubre ".$y;$fechapos="Noviembre ".$y;break;
case 11: $fechaant="Octubre ".$y;$fechaact="Noviembre ".$y;$fechapos="Diciembre ".$y;break;
case 12: $mpos=1;$ypos=$y+1;$fechaant="Noviembre ".$y;$fechaact="Diciembre ".$y;$fechapos="Enero ".$ypos;break;
};
};
?>
<table width="900">
<tr class="enc">
<td width="100">
<a href="infpuntcontl2.php?m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td>
<td width="300"><?php  echo $fechaact;?></td>
<td width="100">
<a href="infpuntcontl2.php?m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td><a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idempleados=<?php  echo $idempleados;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a></td>
</tr>
</table>


<table>

<tr class="subenc"><td>Datos del Empleado</td><td>Dia Env.</td><td>Hora Env.</td><td>Texto de Envio</td><td>Enviado por</td><td>Dia Resp.</td><td>Hora Resp.</td><td>Texto de Respuesta</td></tr>



<?php 
if ($tipo=="dia"){;
$fechaa=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, $d, $y));
$fechaf=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, $d+1, $y));
$sql="SELECT * from mensajes where idempresa='".$ide."' and dia between '".$fechaa."' and '".$fechaf."'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$dia=$rowmos['dia'];
$texto=$rowmos['texto'];
$user=$rowmos['user'];
$hora=$rowmos['hora'];
$diaresp=$rowmos['diaresp'];
$horaresp=$rowmos['horaresp'];
$respuesta=$rowmos['respuesta'];
$idempleados=$rowmos['idempleado'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?>
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>


<td>
<?php 

$sql1="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$ide."' and idempleado='".$idempleados."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);*/
$nombre=$resultado1['nombre'];
$apellidop=$resultado1['1apellido'];
$apellidos=$resultado1['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nombret;?>
</td>

<td><?php  echo $dia;?></td>
<td><?php  echo $hora;?></td>
<td><?php  echo $texto;?></td>
<td><?php  echo $user;?></td>
<td><?php  echo $diaresp;?></td>
<td><?php  echo $horaresp;?></td>
<td><?php  echo $respuesta;?></td>
</tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y-m-d H:i:s", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d H:i:s", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from mensajes where idempresa='".$ide."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
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
$texto=$rowmos['texto'];
$user=$rowmos['user'];
$diaresp=$rowmos['diaresp'];
$horaresp=$rowmos['horaresp'];
$respuesta=$rowmos['respuesta'];
$idempleados=$rowmos['idempleado'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?>
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>

<td>
<?php 

$sql1="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$ide."' and idempleado='".$idempleados."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetchAll();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);*/
$nombre=$resultado1['nombre'];
$apellidop=$resultado1['1apellido'];
$apellidos=$resultado1['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nombret;?>
</td>



<td><?php  echo $dia;?></td>
<td><?php  echo $hora;?></td>
<td><?php  echo $texto;?></td>
<td><?php  echo $user;?></td>
<td><?php  echo $diaresp;?></td>
<td><?php  echo $horaresp;?></td>
<td><?php  echo $respuesta;?></td>

</tr>

<?php };?>

<?php 
};
?>
</table>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
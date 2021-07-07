<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');
$datos='datos';
if (($m==null) and ($y==null)){;
$m=date("m");
$y=date("Y");
};
$m1=$m;
$y1=$y;
$fechaant=date("Y-m-d", mktime(0, 0, 0, $m1-1, 1, $y1));
$fechaact=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
$fechaact2=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));
$fechapos=date("Y-m-d", mktime(0, 0, 0, $m1+1, 1, $y1));
$mant=date("m", mktime(0, 0, 0, $m1-1, 1, $y1));
$mpos=date("m", mktime(0, 0, 0, $m1+1, 1, $y1));
$yant=date("Y", mktime(0, 0, 0, $m1-1, 1, $y1));
$ypos=date("Y", mktime(0, 0, 0, $m1+1, 1, $y1));
switch($m1){;
case 1: $tituloenc="Enero ".$y1;break;
case 2: $tituloenc="Febrero ".$y1;break;
case 3: $tituloenc="Marzo ".$y1;break;
case 4: $tituloenc="Abril ".$y1;break;
case 5: $tituloenc="Mayo ".$y1;break;
case 6: $tituloenc="Junio ".$y1;break;
case 7: $tituloenc="Julio ".$y1;break;
case 8: $tituloenc="Agosto ".$y1;break;
case 9: $tituloenc="Septiembre ".$y1;break;
case 10: $tituloenc="Octubre ".$y1;break;
case 11: $tituloenc="Noviembre ".$y1;break;
case 12: $tituloenc="Diciembre ".$y1;break;
};
?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">
COMPROBACION DE USO DE APLICACION
</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lcempresa2.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>

<tr><td>Fecha</td><td>
<select name="m">
<option value="1">Enero
<option value="2">Febrero
<option value="3">Marzo
<option value="4">Abril
<option value="5">Mayo
<option value="6">Junio
<option value="7">Julio
<option value="8">Agosto
<option value="9">Septiembre
<option value="10">Octubre
<option value="11">Noviembre
<option value="12">Diciembre
</select>

/<input type="number" name="y" maxlength=4 size=5 value="2019"></td></tr


<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sqlp="select * from proyectos where gestorproyecto='".$ide."' order by idproyectos asc"; 
$resultp=$conn->query($sqlp);
$resultpmos=$conn->query($sqlp);
$resultp1mos=$conn->query($sqlp);
$resultadop=$resultp->fetchAll();
$rowp=count($resultadop);

/*$resultp=mysqli_query ($conn,$sqlp) or die ("Invalid result idproyectos");
$rowp=mysqli_num_rows($resultp);*/


$sql="SELECT * from empresas where ";
$sql2=" estado='".$estador."'";
if ($rowp>0){;
$sql.=" idproyectos ";
if ($rowp==1){
	$resultadop=$resultpmos->fetchAll();
	//$resultadop=mysqli_fetch_array($resultp);
	$idprt=$resultadop['idproyectos'];
$sql.=" ='".$idprt."'";	
	}else{;
$sql.=" in (";		
	/*for ($j=0;$j<$rowp;$j++){
	mysqli_data_seek($resultp,$j);
	$resultadop=mysqli_fetch_array($resultp);*/
	foreach ($resultp1mos as $row1mos) {
	$idprt=$row1mos['idproyectos'];		
		$sql.=$idprt;
		$t=$j+1;
		if($t<$rowp){
		$sql.=",";	
			}
		
		}		
$sql.=")";		
		};

};

$sql.=" order by idempresas asc";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultado=$result->fetchAll();
$row=count($resultadop);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<?include ('../js/busqueda.php');?>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align:center;
}

/*
#mytable tr:nth-child(even){background-color: #f2f2f2;}
*/
#mytable tr:hover {background-color: #ddd;}

#mytable thead {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}



.col1 {display: none; } 
.col2 {display: none; } 
.col3 {display: none; } 

table.show1 .col1 { display: table-cell; } 
table.show2 .col2 { display: table-cell; } 
table.show3 .col3 { display: table-cell; }


</style>


<script>
function toggleColumn(n) 
{ var currentClass = document.getElementById("mytable").className; 
if (currentClass.indexOf("show"+n) != -1) 
{ document.getElementById("mytable").className = currentClass.replace("show"+n, ""); 
} 
else
{
 document.getElementById("mytable").className += " " + "show"+n; 
 } 
 }
</script>

<table>
<tr><td>
<a href="lcempresa2.php?m=<?php  echo $mant;?>&y=<?php  echo $yant;?>">
<img src="../../img/minor-event-icon.png" width="50px">
</a></td>
<td class="enc">DATOS DE EMPRESAS, TRABAJADORES, CLIENTES Y SERVICIOS USADOS EN
<br/> <?php echo $tituloenc;?></td>
<td>
<a href="lcempresa2.php?m=<?php  echo $mpos;?>&y=<?php  echo $ypos;?>">
<img src="../../img/add-event-icon.png" width="50px">
</a>
</td>
<td>
<a href="fcempresa2.php?m=<?php  echo $m1;?>&y=<?php  echo $y1;?>">
<img src="../../img/iconlis.png" width="40px">
</a>
</td>
</tr>
</table>

<p>
Elige los servicios que quieres ver:
<span onclick="toggleColumn(1)" style="background-color:#6af287">SERVICIOS BASICOS</span>
<span onclick="toggleColumn(2)" style="background-color:#6ad4f2">SERVICIOS ADICIONALES NUM CLIENTES</span>
<span onclick="toggleColumn(3)" style="background-color:#9d6af2">SERVICIOS ADICIONALES POR EMPRESA</span>
</p> 

<table width="800" class="table-bordered table pull-right table table-fixed" id="mytable" >
<thead>
<tr class="enctab">
<th rowspan="2">Nº Empresa</th>
<th rowspan="2">Nombre Empresa</th>
<th rowspan="2">NIF</th>
<th rowspan="2">Logotipo</th>
<th colspan="2">ACTIVOS</th>
<th colspan="2">USADOS</th>
<th colspan="3" class='col1' style="background-color:#6af287">SERVICIOS BASICOS</th>
<th colspan="5" class='col2' style="background-color:#6ad4f2">SERVICIOS ADICIONALES NUM CLIENTES</th>
<th colspan="3" class='col3' style="background-color:#9d6af2">SERVICIOS ADICIONALES POR EMPRESA</th>
</tr> 
<tr class="enctab">
<th>Clientes</th>
<th>Empleados</th>
<th>Clientes</th>
<th>Empleados</th>

<th class='col1' style="background-color:#6af287">Entrada</th>
<th class='col1' style="background-color:#6af287">Incidencias</th>
<th class='col1' style="background-color:#6af287">Mensajes</th>
<?php 
$dat=array ('Tareas Habituales','Tareas Adicionales','Niveles','Productos','Lecturas');
for ($t=0;$t<count($dat);$t++){;
echo "<th class='col2' style='background-color:#6ad4f2'>$dat[$t]</th>";
};
?>



<th class='col3' style="background-color:#9d6af2">Trabajo</th>
<th class='col3' style="background-color:#9d6af2">Siniestros</th>
<th class='col3' style="background-color:#9d6af2">Alarmas</th>

</tr>
</thead>

<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idempresas=$rowmos['idempresas'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$domicilio=$rowmos['domicilio'];
$localidad=$rowmos['localidad'];
$cp=$rowmos['cp'];
$ncc=$rowmos['ncc'];
$logotipo=$rowmos['logotipo'];

$sql10="SELECT * from clientes where idempresas='".$idempresas."' and estado='1'";
$result10=$conn->query($sql10);
$resultado10=$result10->fetchAll();
$row10=count($resultado10);

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row10=mysqli_num_rows($result10);*/

$sql11="SELECT * from empleados where idempresa='".$idempresas."' and estado='1'";
$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();
$row11=count($resultado11);

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$row11=mysqli_num_rows($result11);*/

$fi=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$ff=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));

$sql12="SELECT distinct(idpiscina) from almpc where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
//echo $sql12;
$result12=$conn->query($sql12);
$resultado12=$result12->fetchAll();
$row12=count($resultado12);

/*$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$row12=mysqli_num_rows($result12);*/

$sql13="SELECT distinct(idempleado) from almpc where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'";
$result13=$conn->query($sql13);
$resultado13=$result13->fetchAll();
$row13=count($resultado13); 

/*$result13=mysqli_query ($conn,$sql13) or die ("Invalid result13");
$row13=mysqli_num_rows($result13);*/


$sql15="SELECT * from almpcinci where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'";
$result15=$conn->query($sql15);
$resultado15=$result15->fetchAll();
$row15=count($resultado15);

/*$result15=mysqli_query ($conn,$sql15) or die ("Invalid result15");
$row15=mysqli_num_rows($result15);*/

$sql16="SELECT * from mensajes where idempresa='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result16=$conn->query($sql16);
$resultado16=$result16->fetchAll();
$row16=count($resultado16);

/*$result16=mysqli_query ($conn,$sql16) or die ("Invalid result16");
$row16=mysqli_num_rows($result16);*/

$sql17="SELECT * from trabajos where idempresa='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result17=$conn->query($sql17);
$resultado17=$result17->fetchAll();
$row17=count($resultado17);

/*$result17=mysqli_query ($conn,$sql17) or die ("Invalid result17");
$row17=mysqli_num_rows($result17);*/

$sql18="SELECT * from siniestros where idempresa='".$idempresas."' and dia between '".$fi."' and '".$ff."'"; 
$result18=$conn->query($sql18);
$resultado18=$result18->fetchAll();
$row18=count($resultado18);

/*$result18=mysqli_query ($conn,$sql18) or die ("Invalid result18");
$row18=mysqli_num_rows($result18);*/

$sql19="SELECT * from alarma where idempresas='".$idempresas."' and dia between '".$fi."' and '".$ff."'";
$result19=$conn->query($sql19);
$resultado19=$result19->fetchAll();
$row19=count($resultado19);

/*$result19=mysqli_query ($conn,$sql19) or die ("Invalid result19");
$row19=mysqli_num_rows($result19);*/

?>









<?php if($row12>0){;?>
<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td style="text-align:left;"><?php  echo strtoupper($nombre);?></td>
<td><?php  echo $nif;?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>

<td><?php echo $row10;?></td><td><?php echo $row11;?></td>
<td><?php echo $row12;?></td><td><?php echo $row13;?></td>
<?php
$sql14="SELECT distinct(idpiscina) from almpc where idempresas='".$idempresas."' and idpccat='1' and dia between '".$fi."' and '".$ff."'";
$result14=$conn->query($sql14);
$resultado14=$result14->fetchAll();
$row14=count($resultado14);

/*$result14=mysqli_query ($conn,$sql14) or die ("Invalid result14");
$row14=mysqli_num_rows($result14);*/
 echo "<td class='col1'>$row14</td>";
 ?>
<td class='col1'><?php if($row15>0){;?>&#x2714;<?php };?></td>
<td class='col1'><?php if($row16>0){;?>&#x2714;<?php };?></td>

<?php

$datv=array ('3','4','2','5','10');
for($yh=0;$yh<count($datv);$yh++){;
$sql14="SELECT distinct(idpiscina) from almpc where idempresas='".$idempresas."' and idpccat='".$datv[$yh]."' and dia between '".$fi."' and '".$ff."'";
$result14=$conn->query($sql14);
$resultado14=$result14->fetchAll();
$row14=count($resultado14);

/*$result14=mysqli_query ($conn,$sql14) or die ("Invalid result14");
$row14=mysqli_num_rows($result14);*/
 echo "<td class='col2'>$row14</td>";
 };

?>


<td class='col3'><?php if($row17>0){;?>&#x2714;<?php };?></td>
<td class='col3'><?php if($row18>0){;?>&#x2714;<?php };?></td>
<td class='col3'><?php if($row19>0){;?>&#x2714;<?php };?></td>


</tr>
<?php };?>
<?php };?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

<?php   
include('bbdd.php');
/*
$fecha=$_GET["fecha"];
$idpccat=$_GET["idpccat"];
*/
$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$diaa=$dia-1;
$diap=$dia+1;
$fechac=$dia.'/'.$mes.'/'.$año;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $mes, $diaa, $año));
$fechap=date("Y-m-d", mktime(0, 0, 0, $mes, $diap, $año));

$mesa=str_split($mes);
if ($mesa[0]==0){;
$mes=$mesa[1];
};

$sql04="SELECT * from clientes where  idgestor='".$idgestor."' and idempresas='".$ide."'"; 
$result04=mysqli_query ($conn,$sql04) or die ("Invalid result 1");
$row04=mysqli_affected_rows();
if ($row04>0){;
$datos='(';
for($ty=0;$ty<$row04;$ty++){
	if($ty>0){
		$datos.=',';	
	}
$datos.=mysqli_result($result04,0,'idclientes');
}
$datos.=')';
}




$sql01="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$categoria=mysqli_result($result01,0,'nombre');


if ($idpccat=='6'){;
$sql1a="SELECT * from almpcronda where dia='".$fecha."' and idronda='c' and idempresas='".$ide."'  and idcliente in ".$datos." order by idempresas,idcliente,dia,hora"; 
$result1a=mysqli_query ($conn,$sql1a) or die ("Invalid result 1a");
$row1a=mysqli_affected_rows();
}else{;
$sql1a="SELECT * from almpc where dia='".$fecha."' and idempresas='".$ide."' and idpiscina in ".$datos."  and idpccat='".$idpccat."' order by id,idempleado"; 
//echo $sql1a;
$result1a=mysqli_query ($conn,$sql1a) or die ("Invalid result 1a");
$row1a=mysqli_affected_rows();
};
?>

<?php 
if ($ide!=null){;
?>
<?php  include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabglobal_g.php?fecha=<?php  echo $fechaa;?>&idpccat=<?php  echo $idpccat;?>"><img src="../img/minor-event-icon.png" width="20px"></a>
<?php  echo $categoria;?>, el dia: <?php  echo $fechac;?>
<a href="trabglobal_g.php?fecha=<?php  echo $fechap;?>&idpccat=<?php  echo $idpccat;?>"><img src="../img/add-event-icon.png"  width="20px"></a>
</p>

</div>
<div class="contenido">

<table  id="tablestyle" class="tablesorter">
<thead>
<?php if ($idpccat=='6'){;?>
<tr class="subenc6">
<th>Puesto de Trabajo</th>
<th>Hora</th>
</tr>
</thead>
<tbody>
<?php for ($j=0;$j<$row1a;$j++){;
$idclientes=mysqli_result($result1a,$j,'idcliente');
$hora=mysqli_result($result1a,$j,'hora');
$idpronda=mysqli_result($result1a,$j,'id');

$sql11="SELECT * from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=mysqli_result($result11,0,'nombre');

?>

<tr class="subenc7">
<td><?php  echo strtoupper($nombrecom);?></td>
<td>
<a href="../servicios_n/pcontrol/ipcdhora.php?idpcronda=<?php  echo $idpronda;?>&hora=<?php  echo $hora;?>&d=<?php  echo $dia;?>&m=<?php  echo $mes;?>&y=<?php  echo $año;?>&idclientes=<?php  echo $idclientes;?>&ide=<?php  echo $ide;?>">
<?php  echo strtoupper($hora);?>
</a></td>
</tr>
<?php };?>
</tbody>
</table>


<?php }else{;?>
<tr class="subenc6">
<th>Personal</th>
<th>Telefonos</th>
<th>Puesto de Trabajo</th>
<th>Hora</th><th>Tipo</th>
<?php if (($idpccat=='2') or ($idpccat=='5') ){;?>
<th>Cantidad</th>
<?php };?>

<th>Mapa</th>
</tr>
</thead>

<tbody>
<?php for ($j=0;$j<$row1a;$j++){;
$idempleado=mysqli_result($result1a,$j,'idempleado');
$idpiscina=mysqli_result($result1a,$j,'idpiscina');
$hora=mysqli_result($result1a,$j,'hora');
$idpcsubcat=mysqli_result($result1a,$j,'idpcsubcat');
$tiempo=mysqli_result($result1a,$j,'tiempo');
$lat=mysqli_result($result1a,$j,'lat');
$lon=mysqli_result($result1a,$j,'lon');
$cantidad=mysqli_result($result1a,$j,'cantidad');
$otro=mysqli_result($result1a,$j,'otro');

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$subcategoria=mysqli_result($result12,0,'subcategoria');


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=mysqli_result($result10,0,'nombre');
$priape=mysqli_result($result10,0,'1apellido');
$segape=mysqli_result($result10,0,'2apellido');
$tele1=mysqli_result($result10,0,'tele1');
$tele2=mysqli_result($result10,0,'tele2');
$nombretrab=$nombre.' '.$priape.' '.$segape;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=mysqli_result($result11,0,'nombre');

?>
<tr class="subenc7"><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td>
<?php if (($idpccat=='5') and ($idpcsubcat=='0') ){;?>
<?php  echo strtoupper($subcategoria);?><br />
<?php  echo strtoupper($otro);?>
<?php }else{;?>
<?php  echo strtoupper($subcategoria);?>
<?php };?>
</td>

<?php if (($idpccat=='2') or ($idpccat=='5') ){;?>
<td><?php  echo strtoupper($cantidad);?></td>
<?php };?>

<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td></tr>
<?php };?>
</tbody>
</table>
<?php };?>

</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>



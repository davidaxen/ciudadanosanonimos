<?php   
include('bbdd.php');


if ($ide!=null){;

 include('../portada_n/cabecera2.php');
 
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

$sql04="SELECT * from clientes where  idgestor='".$idgestor."' and idempresas='".$ide."'"; 

$result04=$conn->query($sql04);
$num_rows=$result04->fetchAll();
$row04=count($num_rows);
//$result04=mysqli_query ($conn,$sql04) or die ("Invalid result 1");
//$row04=mysqli_affected_rows();
if ($row04>0){;
$datos='(';
for($ty=0;$ty<$row04;$ty++){
	if($ty>0){
		$datos.=',';	
	}
$datos.=$num_rows[0]['idclientes'];
}
$datos.=')';
}



$sql12="SELECT * from almpcinci where dia='".$fecha."' and idempresas='".$ide."' and idpiscina in ".$datos."";
if($clivp!=0){;
$sql12.=" and idpiscina='".$clivp."'";
};
$sql12.=" and texto!='0' order by id,idempleado"; 

$result12=$conn->query($sql12);
$result12mos=$conn->query($sql12);
$num_rows=$result12->fetchAll();
$row12=count($num_rows);
//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 1");
//$row12=mysqli_affected_rows();
?>
<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabinci_g.php?fecha=<?php  echo $fechaa;?>&idpccat=20"><img src="../img/minor-event-icon.png" width="20px"></a>
Incidencias enviadas el dia: <?php  echo $fechac;?>
<a href="trabinci_g.php?fecha=<?php  echo $fechap;?>&idpccat=20"><img src="../img/add-event-icon.png"  width="20px"></a>

</p>


</div>
<div class="contenido">
<table border="0">
<tr class="subenc6"><td>Personal</td><td>Texto</td><td>Puesto de Trabajo</td><td>Hora</td><td>Mapa</td><td>Imagen</td><td>Asignar</td></tr>
<?php 


foreach ($result12mos as $row12) {

//for ($j=0;$j<$row12;$j++){;
//$idempleado=mysqli_result($result12,$j,'idempleado');
$idpiscina=$row12['idpiscina'];
$hora=$row12['hora'];
$texto=$row12['texto'];
$tiempo=$row12['tiempo'];
$lat=$row12['lat'];
$lon=$row12['lon'];
$urgente=$row12['urgente'];
$imagen=$row12['imagen'];

$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 

$result10=$conn->query($sql10);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$tele1=$num_rows[0]['tele1'];
$tele2=$num_rows[0]['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

if ($idpiscina!=0){;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 

$result11=$conn->query($sql11);
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];
}else{;
$nombrecom="Fuera del puesto de Trabajo";
};
?>
<tr 

<?php 
$h=fmod($j,2);
if ($urgente=='1'){;?>class="mpar"<?php }else{;?> 

<?php if ($h=='0'){;?>class="cpar"<?php }else{;?> 
class="subenc7"
<?php };?> 

<?php };?> 

><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($texto);?></td>
<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($hora);?></td>
<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td>
<td><?php if ($imagen!=null){;?><img src="../img/<?php  echo $imagen;?>"  onmouseover="this.width=200;this.height=200;"  onmouseout="this.width=50;this.height=50;" width="50" height="50"><?php };?></td>
<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idpiscina;?>&descripcion=<?php  echo $texto;?>"><img src="../img/asignacion.png" width="32px"></a></td>
</tr>
<?php };?>
</table>
</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>



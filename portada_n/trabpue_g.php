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
$fechaa=date('Y-m-d', mktime(0,0,0, $mes,$diaa,$año));
$fechap=date('Y-m-d', mktime(0,0,0, $mes,$diap,$año));

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




$sql1p="SELECT * from almpc where dia='".$fecha."' and idempresas='".$ide."' and idpccat='1' and idpiscina in ".$datos."";
$sql1p.=" order by id,idempleado"; 
//echo $sql1;

$result1p=$conn->query($sql1p);
$result1pmos=$conn->query($sql1p);
$num_rows=$result1p->fetchAll();
$row1p=count($num_rows);
//$result1p=mysqli_query ($conn,$sql1p) or die ("Invalid result 1");
//$row1p=mysqli_affected_rows();
if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabpue_g.php?fecha=<?php  echo $fechaa;?>&idpccat=1"><img src="../img/minor-event-icon.png" width="20px"></a>
Personal en puesto, el dia: <?php  echo $fechac;?>
<a href="trabpue_g.php?fecha=<?php  echo $fechap;?>&idpccat=1"><img src="../img/add-event-icon.png"  width="20px"></a>

</p>

</div>
<div class="contenido">


<table id="tablestyle" class="tablesorter">
<thead>
<tr class="subenc6">
<th>Personal</th>
<th>Telefonos</th>
<th>Puesto de Trabajo</th>
<th>Hora</th>
<th>Tipo</th>
<th>Mapa</th>
</tr>
</thead>
<tbody>
<?php 

foreach ($result1pmos as $row1p) {

//for ($j=0;$j<$row1p;$j++){;
$idempleado=$row1p['idempleado'];
$idpiscina=$row1p['idpiscina'];
$hora=$row1p['hora'];
$idpcsubcat=$row1p['idpcsubcat'];
$tiempo=$row1p['tiempo'];
$lat=$row1p['lat'];
$lon=$row1p['lon'];

$sql12="SELECT * from pcsubcat where idpccat='1' and idpcsubcat='".$idpcsubcat."'"; 

$result12=$conn->query($sql12);

$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$subcategoria=$num_rows[0]['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";

$result10=$conn->query($sql10);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$nombre=$num_rows[0]['nombre'];
$priape=$num_rows[0]['1apellido'];
$segape=$num_rows[0]['2apellido'];
$tele1=$num_rows[0]['tele1'];
$tele2=$num_rows[0]['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
//echo $sql11;

$result11=$conn->query($sql11);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$nombrecom=$num_rows[0]['nombre'];

?>
<tr <?php if ($idpcsubcat=='1'){;?>class="fpar"<?php };?>  ><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td></tr>
<?php };?>
</tbody>
</table>
</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


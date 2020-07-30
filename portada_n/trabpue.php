<?php  
include('bbdd.php');

$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$diaa=$dia-1;
$diap=$dia+1;
$fechac=$dia.'/'.$mes.'/'.$año;
$fechaa=date('Y-m-d', mktime(0,0,0, $mes,$diaa,$año));
$fechap=date('Y-m-d', mktime(0,0,0, $mes,$diap,$año));

$sql1p="SELECT * from almpc where dia='".$fecha."' and idempresas='".$ide."' and idpccat='1'";
if($clivp!=0){;
$sql1p.=" and idpiscina='".$clivp."'";
};
$sql1p.=" order by id,idempleado"; 
//echo $sql1p;
$result1p=mysqli_query ($conn, $sql1p) or die ("Invalid result 1");
$row1p=mysqli_num_rows($result1p);
//echo $row1p;

if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabpue.php?fecha=<?php  echo $fechaa;?>&idpccat=1"><img src="../img/minor-event-icon.png" width="20px"></a>
Personal en puesto, el dia: <?php  echo $fechac;?> 
<a href="trabpue.php?fecha=<?php  echo $fechap;?>&idpccat=1"><img src="../img/add-event-icon.png"  width="20px"></a>

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
for ($j=0;$j<$row1p;$j++){;
mysqli_data_seek($result1p,$j);
$resultado1p = mysqli_fetch_array ($result1p);
$idempleado=$resultado1p['idempleado'];
$idpiscina=$resultado1p['idpiscina'];
$hora=$resultado1p['hora'];
$idpcsubcat=$resultado1p['idpcsubcat'];
$tiempo=$resultado1p['tiempo'];
$lat=$resultado1p['lat'];
$lon=$resultado1p['lon'];

$sql12="SELECT * from pcsubcat where idpccat='1' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$resultado12 = mysqli_fetch_array ($result12);
$subcategoria=$resultado12['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10 = mysqli_fetch_array ($result10);
$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$tele1=$resultado10['tele1'];
$tele2=$resultado10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'";
if ($idcli!=0){;
$sql11.=" and nif='".$gente."'";
}; 
//echo $sql11;
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$resultado11 = mysqli_fetch_array ($result11);
$row11=mysqli_num_rows($result11);
$nombrecom=$resultado11['nombre'];
if ($idpiscina=='1'){;
$nombrecom='Teletrabajo';
$row11=1;
};

 if ($row11==1){;?>
<tr <?php if ($idpcsubcat=='1'){;?>class="fpar"<?php };?>  ><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($hora);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td></tr>
<?php };
 };?>
</tbody>
</table>
</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


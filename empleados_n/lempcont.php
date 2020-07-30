<html>
<head>
<title>Listado de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">LISTADO DE CONTRATOS DE EMPLEADOS</td></tr>
</table>

<?php if ($ide!=null){;
if ($idempl==null){;
if ($tipo==null){;?>

<form action="lempcont.php" method="post">
grupo de empleados <select name="tipo">
<option value="alta">Alta
<option value="baja">Baja
</select>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>

<?php 
$sql="SELECT * from altass, empleados, tipocontrato where tipocontrato.modelo=altass.tcontrato and altass.idempresa=empleados.idempresa and altass.idempleado=empleados.idempleado and altass.idempresa='".$ide."'"; 
if ($tipo=='alta'){;
$sql.=" and altass.añobaja='0' and empleados.estado='1'";
}else{;
$sql.=" and altass.añobaja!='0' and empleados.estado='0'";
};
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<table>
<tr  class="menor1"><td>Total Trabajadores</td><td><?php  echo $row;?></td></tr>
<?php for ($i=0; $i<$row; $i++){;
mysql_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$id=$resultado['altass.id'];
$tcont=$resultado['altass.tcontrato'];
$tcontant=$resultado['altass.tcontant'];
$nombre=$resultado['empleados.nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
$nif=$resultado['nif'];
$nss=$resultado['nss'];
$ncont=$resultado['tipocontrato.descripcion'];
$tjor=$resultado['idjornada'];
$nh=$resultado['nhoras'];
$dcont=$resultado['tipocontrato.documento'];
?>
<tr class="menor1">

<td><?php  echo $nombre;?> ,
<?php  echo $apellido1;?> 
<?php  echo $apellido2;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $nss;?></td>
<td><?php $est=$resultado['estado');?></td>
<td><?php  echo $tcont;?>-<?php  echo strtoupper($ncont);?>
<?php if ($tcontant!=0){;?>-TRANSFORMADO<?php };?>
</td>
<td>
<?php if ($tjor=='1'){;?>
PARCIAL - <?php  echo $nh;?>
<?php }else{;?>
COMPLETA
<?php };?>
</td>
<td><a href="<?php  echo $dcont;?>.php?id=<?php  echo $id;?>"><img src="../img/impacrobat.gif" border=0 width=20></a></td>
</tr>
<?php };?>
</table>
<?php };?>
<?php }else{;?>

<?php 
$sql="SELECT * from altass, empleados, tipocontrato where tipocontrato.modelo=altass.tcontrato and altass.idempresa=empleados.idempresa and altass.idempleado=empleados.idempleado and altass.idempresa='".$ide."' and empleados.idempleado='".$idempl."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<table>
<?php for ($i=0; $i<$row; $i++){;
$id=$resultado['altass.id');
$tbaja=$resultado['altass.tbaja');
$idc=$resultado['empleados.idempleado');
$tcont=$resultado['altass.tcontrato');
$tcontant=$resultado['altass.tcontant');
$nombre=$resultado['empleados.nombre');
$apellido1=$resultado['1apellido');
$apellido2=$resultado['2apellido');
$nif=$resultado['nif');
$est=$resultado['estado');
$ncont=$resultado['tipocontrato.descripcion');
$dcont=$resultado['tipocontrato.documento');
$nss=$resultado['nss');
$tjor=$resultado['idjornada');
$nh=$resultado['nhoras');


?>
<tr class="menor1">

<td><?php  echo $nombre;?> ,
<?php  echo $apellido1;?> 
<?php  echo $apellido2;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $nss;?></td>
<td></td>
<td><?php  echo $tcont;?>-<?php  echo strtoupper($ncont);?>
<?php if ($tcontant!=0){;?>-TRANSFORMADO<?php };?>
</td>
<td>
<?php if ($tjor=='1'){;?>
PARCIAL - <?php  echo $nh;?>
<?php }else{;?>
COMPLETA
<?php };?>
</td>

<td><a href="<?php  echo $dcont;?>.php?id=<?php  echo $id;?>&dat=dato"><img src="../img/impacrobat.gif" border=0 width=20></a>
<?php if ($tbaja=='1'){;?>
<a href='bajavoluntaria.php?diabaja=<?php  echo $diab;?>&mesbaja=<?php  echo $mesb;?>&añobaja=<?php  echo $añob;?>&idempresa=<?php  echo $ide;?>&idempleado=<?php  echo $idc;?>'><img src="../img/ver.gif" border=0 width=20></a>
<?php };?>
</td>
</tr>
<?php };?>
</table>
<?php };?>

<?php }else{;
include ('../cierre.php');
 };?>
</body>
</html>

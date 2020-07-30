<html>
<head>
<title>Listado de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>

<body>
<?php 
if ($ide!=null){;
if ($tipo==null){;?>

<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">LISTADO DE EMPLEADOS EN SEGURIDAD SOCIAL</td></tr>
</table>

<form action="lempss.php" method="post">
grupo de empleados <select name="tipo">
<option value="alta">Alta
<option value="baja">Baja
</select>Año
<select name="año">
<option value="todos">Todos
<?php $today=getdate();
$a=$today['year'];
$b=$a+1;
for ($j=2004;$j<$b;$j++){;?>
<option value="<?php  echo $j?>"><?php  echo $j?>
<?php };?>
</select>

<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>

<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">LISTADO DE EMPLEADOS DE <?php  echo strtoupper($tipo);?> EN SEG-SOCIAL</td></tr>
</table>

<?php 

$sql="SELECT * from altass, empleados, afiliacion where afiliacion.id=altass.idafiliaciones and altass.idempleado=empleados.idempleado and altass.idempresa=empleados.idempresa and altass.idempresa='".$ide."'"; 
if ($tipo=='alta'){;
$sql.=" and altass.añobaja='0' and empleados.estado='1'";
}else{
/*
$sql.=" and empleados.estado='0'";
*/
if ($año!='todos'){;
$sql.=" and altass.añobaja='".$año."'";
}else{;
$sql.=" and altass.añobaja!='0'";
};
};
if ($tipo=='alta'){;
$sql.=" order by fechaalta";
}else{
$sql.=" order by fechabaja";
};
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<table>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$id=$resultado['altass.id');
$tbaja=$resultado['altass.tbaja');
$idc=$resultado['empleados.idempleado');
$nombre=$resultado['empleados.nombre');
$apellido1=$resultado['1apellido');
$apellido2=$resultado['2apellido');
$nif=$resultado['nif');
$nss=$resultado['nss');
$idafiliaciones=$resultado['altass.idafiliaciones');
$est=$resultado['estado');



?>
<tr class="menor1">

<td><?php  echo $nombre;?> ,
<?php  echo $apellido1;?> 
<?php  echo $apellido2;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $nss;?></td>
<td><?php  echo $est;?></td>
<td>
<?php $nombreaf=$resultado['afiliacion.nombre');?><?php  echo $nombreaf;?>
</td>


<?php  if ($tipo=='alta'){;
$dia=$resultado['altass.diatrans');
$mes=$resultado['altass.mestrans');
$año=$resultado['altass.añotrans');
$tipo2="trans";
if ($dia==0){;
$dia=$resultado['altass.diaalta'); 
$mes=$resultado['altass.mesalta');
$año=$resultado['altass.añoalta');
$tipo2="alta";
};?>

<td><?php  echo $dia;?>-<?php  echo $mes;?>-<?php  echo $año;?></td>
<td><a href="pdfalta.php?id=<?php  echo $id;?>&tipo=<?php  echo $tipo2;?>"><img src="../img/impacrobat.gif" border=0 width=20></a></a></td>
<?php }else{;
$diab=$resultado['diabaja');
$mesb=$resultado['mesbaja');
$añob=$resultado['añobaja');
?>
<td><?php  echo $diab;?>- 
<?php  echo $mesb;?>-
<?php  echo $añob;?></td>
<td><a href="pdfbaja.php?id=<?php  echo $id;?>"><img src="../img/impacrobat.gif" border=0 width=20></a>
<?php if ($tbaja=='1') {;?>
<a href='bajavoluntaria.php?diabaja=<?php  echo $diab;?>&mesbaja=<?php  echo $mesb;?>&añobaja=<?php  echo $añob;?>&idempresa=<?php  echo $ide;?>&idempleado=<?php  echo $idc;?>'><img src="../img/ver.gif" border=0 width=20></a>
<?php };?>
<?php if ( ($tbaja=='2') or ($tbaja=='3') or ($tbaja=='4') ){;?>
<a href='liquidacion.php?diabaja=<?php  echo $diab;?>&mesbaja=<?php  echo $mesb;?>&añobaja=<?php  echo $añob;?>&idempresa=<?php  echo $ide;?>&idempleado=<?php  echo $idc;?>'><img src="../img/ver.gif" border=0 width=20></a>
<?php };?>
</td>
<?php };?>

</tr>
<?php };?>
</table>
<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>
</body>
</html>
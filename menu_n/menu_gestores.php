<?php
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">GESTIONES</p></div>
<div class="contenido">

<?php 
$sql="select * from menugestores where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menugestores");
$resultado=mysqli_fetch_array($result);
$cqr[]=$resultado['entrada'];
$cqr[]=$resultado['accdiarias'];
$cqr[]=$resultado['accmantenimiento'];
$cqr[]=$resultado['productos'];
$cqr[]=$resultado['niveles'];
$cqr[]=$resultado['revision'];
$cqr[]=$resultado['envases'];

$cp[]=$resultado['trabajo'];
$cp[]=$resultado['siniestro'];
$cp[]=$resultado['mediciones'];
$cp[]=$resultado['control'];
$cp[]=$resultado['alarma'];
$cp[]=$resultado['ruta'];
$cp[]=$resultado['seguimiento'];

$cc[]=$resultado['mensaje'];
$cc[]=$resultado['incidencia'];
$cc[]=$resultado['incidenciasplus'];

$ca[]=$resultado['cuadrante'];
$ca[]=$resultado['jornadas'];

$sql31="select * from menugestoresnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menugestoresnombre");
$resultado31=mysqli_fetch_array($result31);
$ncqr[]=$resultado31['entrada'];
$ncqr[]=$resultado31['accdiarias'];
$ncqr[]=$resultado31['accmantenimiento'];
$ncqr[]=$resultado31['productos'];
$ncqr[]=$resultado31['niveles'];
$ncqr[]=$resultado31['revision'];
$ncqr[]=$resultado31['envases'];

$ncp[]=$resultado31['trabajo'];
$ncp[]=$resultado31['siniestro'];
$ncp[]=$resultado31['mediciones'];
$ncp[]=$resultado31['control'];
$ncp[]=$resultado31['alarma'];
$ncp[]=$resultado31['ruta'];
$ncp[]=$resultado31['seguimiento'];


$ncc[]=$resultado31['mensaje'];
$ncc[]=$resultado31['incidencia'];
$ncc[]=$resultado31['incidenciasplus'];

$nca[]=$resultado31['cuadrante'];
$nca[]=$resultado31['jornadas'];


$sql32="select * from menugestoresimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menugestoresimg");
$resultado32=mysqli_fetch_array($result32);
$icqr[]=$resultado32['entrada'];
$icqr[]=$resultado32['accdiarias'];
$icqr[]=$resultado32['accmantenimiento'];
$icqr[]=$resultado32['productos'];
$icqr[]=$resultado32['niveles'];
$icqr[]=$resultado32['revision'];
$icqr[]=$resultado32['envases'];

$icp[]=$resultado32['trabajo'];
$icp[]=$resultado32['siniestro'];
$icp[]=$resultado32['mediciones'];
$icp[]=$resultado32['control'];
$icp[]=$resultado32['alarma'];
$icp[]=$resultado32['ruta'];
$icp[]=$resultado32['seguimiento'];


$icc[]=$resultado32['mensaje'];
$icc[]=$resultado32['incidencia'];
$icc[]=$resultado32['incidenciasplus'];

$ica[]=$resultado32['cuadrante'];
$ica[]=$resultado32['jornadas'];

$sql33="select * from menugestoresenlace where idempresa='".$ide."'";
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menugestoresenlace");
$resultado33=mysqli_fetch_array($result33);
$encqr[]=$resultado33['entrada'];
$encqr[]=$resultado33['accdiarias'];
$encqr[]=$resultado33['accmantenimiento'];
$encqr[]=$resultado33['productos'];
$encqr[]=$resultado33['niveles'];
$encqr[]=$resultado33['revision'];
$encqr[]=$resultado33['envases'];

$encp[]=$resultado33['trabajo'];
$encp[]=$resultado33['siniestro'];
$encp[]=$resultado33['mediciones'];
$encp[]=$resultado33['control'];
$encp[]=$resultado33['alarma'];
$encp[]=$resultado33['ruta'];
$encp[]=$resultado33['seguimiento'];

$encc[]=$resultado33['mensaje'];
$encc[]=$resultado33['incidencia'];
$encc[]=$resultado33['incidenciasplus'];

$enca[]=$resultado33['cuadrante'];
$enca[]=$resultado33['jornadas'];




$valorcqr=array_count_values($cqr);
$valorcp=array_count_values($cp);
$valorcc=array_count_values($cc);
$valorca=array_count_values($ca);
?>

 <div id="main">


<?php if (count($cqr)!=$valorcqr[0]){;?>
<div id="main">
<span id="caja"><b>Tareas con QR</b></span>
<?php  for ($j=0;$j<count($cqr)+1;$j++){;
if ($cqr[$j]=='1'){;?>
<span id="caja"><a href="<?php  echo $encqr[$j];?>"><img src="../img/<?php  echo $icqr[$j];?>" width="64px"><br/>
<?php  echo $ncqr[$j];?></a></span>
<?php };
 };?>
</div>
<?php };
 if (count($cp)!=$valorcp[0]){;?>
<div id="main">
<span id="caja"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cp)+1;$j++){;
if ($cp[$j]=='1'){;?>
<span id="caja"><a href="<?php  echo $encp[$j];?>"><img src="../img/<?php  echo $icp[$j];?>" width="64px"><br/>
<?php  echo $ncp[$j];?></a></span>
<?php };
 };?>
</div>
<?php };
 if (count($cc)!=$valorcc[0]){;?>
<div id="main">
<span id="caja"><b>Comunicaciones</b></span>
<?php  for ($j=0;$j<count($cc)+1;$j++){;
 if ($cc[$j]=='1'){;?><span id="caja"><a href="<?php  echo $encc[$j];?>"><img src="../img/<?php  echo $icc[$j];?>" width="64px">
 <br/><?php  echo $ncc[$j];?></a></span>
 <?php };
  };?>
</div>
<?php };
 if (count($ca)!=$valorca[0]){;?>
<div id="main">
<span id="caja"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($ca)+1;$j++){;
 if ($ca[$j]=='1'){;?>
 <span id="caja"><a href="<?php  echo $enca[$j];?>"><img src="../img/<?php  echo $ica[$j];?>" width="64px"><br/>
 <?php  echo $nca[$j];?></a></span>
 <?php };
  };?>
</div>
<?php };?>






</div>

</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
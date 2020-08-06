<?php
include('bbdd.php');

if ($ide!=null){;
include('../portada_n/cabecera2.php');

$sql11r="select * from usuariosnombre where idempresas='".$ide."'";

$result11r=$conn->query($sql11r);
$resultado11r=$result11r->fetch();

/*$result11r=mysqli_query ($conn,$sql11r) or die ("Invalid result menucontabilidad");
$resultado11r=mysqli_fetch_array($result11r);*/
$nadr=$resultado11r['servicios'];

?>

<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nadr);?>

</p></div>
<div class="contenido">

<?php 
include('menu_servicios.php');


$valorcqr=array_count_values($cqr);
$valorcp=array_count_values($cp);
$valorcc=array_count_values($cc);
$valorca=array_count_values($ca);
?>

<?php if (count($cqr)!=$valorcqr[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Frecuentes</b></span>
<?php  for ($j=0;$j<count($cqr)+1;$j++){;?>
<?php if ($cqr[$j]=='1'){;?><a href="<?php  echo $encqr[$j];?>?dat=h"><span class="caja"><img src="../img/<?php  echo $icqr[$j];?>" width="64px"><br/><?php  echo $ncqr[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cp)!=$valorcp[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($cp[$j]=='1'){;?>

<?php if ($ncp[$j]!="Seguimiento"){;?>
<a href="<?php  echo $encp[$j];?>?dat=h"><span class="caja"><img src="../img/<?php  echo $icp[$j];?>" width="64px"><br/><?php  echo $ncp[$j];?></span></a>
<?php };
 };
  };?>
</div>
<?php };
 if (count($cc)!=$valorcc[0]){;?>
<div class="main">
<span class="caja2"><b>Comunicaciones</b></span>
<?php  
for ($j=0;$j<count($cc)+1;$j++){;
if ($cc[$j]=='1'){;
if ($ncc[$j]=='Mensaje'){;?>
<a href="<?php  echo $encc[$j];?>?dat=h"><span class="caja"><img src="../img/<?php  echo $icc[$j];?>" width="64px"><br/>
<?php  echo $ncc[$j];?></span></a>
<?php };
};
 };?>
</div>
<?php };
 if (count($ca)!=$valorca[0]){;?>
<div class="main">
<span class="caja2"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($ca)+1;$j++){;
 if ($nca[$j]=='Jornadas'){;?>
<a href="<?php  echo $enca[$j];?>?dat=h"><span class="caja"><img src="../img/<?php  echo $ica[$j];?>" width="64px"><br/>
<?php  echo $nca[$j];?></span></a>
<?php };
};?>
</div>
<?php };?>

</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
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
$nadr2=$resultado11r['informes'];
?>

<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nadr2);?>

</p></div>
<div class="contenido">

<?php 
include('menu_informes.php');


$valorcqr=array_count_values($cqr1i);
$valorcp=array_count_values($cp1i);
$valorcc=array_count_values($cc1i);
$valorca=array_count_values($ca1i);
?>

<?php if (count($cqr1i)!=$valorcqr[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Frecuentes</b></span>
<?php  for ($j=0;$j<count($cqr1i)+1;$j++){;?>
<?php if ($cqr1i[$j]=='1'){;?><a href="<?php  echo $encqri[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icqri[$j];?>" width="64px"><br/><?php  echo $ncqri[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<!--
<?php if (count($cp)!=$valorcp[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($cp[$j]=='1'){;?><a href="<?php  echo $encp[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icp[$j];?>" width="64px"><br/><?php  echo $ncp[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>
-->

<?php 
if (count($cc1i)!=$valorcc[0]){;?>
<div class="main">
<?php if ($cc1i[1]=='1' or $cc1i[2]=='1') {;?>
<span class="caja2"><b>Comunicaciones</b></span>
<?php };?>
<?php  for ($j=1;$j<count($cc1i);$j++){;?>
<?php if ($cc1i[$j]=='1'){;?><a href="<?php  echo $encci[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icci[$j];?>" width="64px"><br/><?php  echo $ncci[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($ca1i)!=$valorca[0]){;?>
<div class="main">
<span class="caja2"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($ca1i)+1;$j++){;?>
<?php if ($nca1i[$j]=='Jornadas'){;?><a href="<?php  echo $encai[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icai[$j];?>" width="64px"><br/><?php  echo $ncai[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

</div>

<?php } else {;
include ('../cierre.php');
 };?>
</body>
</html>
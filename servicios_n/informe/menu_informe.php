<?php 
include('bbdd.php');

if ($ide!=null){;
 include('../../portada_n/cabecera3.php');
 
$sql11r="select * from usuariosnombre where idempresas='".$ide."'";
$result11r=mysqli_query ($conn,$sql11r) or die ("Invalid result menucontabilidad");
$resultado11r=mysqli_fetch_array($result11r);
$nadr=$resultado11r['servicios'];
$nadr2=$resultado11r['informes'];
?>

<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nadr2);?>

</p></div>
<div class="contenido">

<?php 
include('../../menu_n/menu_informes.php');


$valorcqr=array_count_values($cqri);
$valorcp=array_count_values($cpi);
$valorcc=array_count_values($cci);
$valorca=array_count_values($cai);
?>

<?php if (count($cqri)!=$valorcqr[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Frecuentes</b></span>
<?php  for ($j=0;$j<count($cqri)+1;$j++){;?>
<?php if ($cqri[$j]=='1'){;?><a href="<?php  echo $encqri[$j];?>?dat=i"><span class="caja"><img src="../../img/<?php  echo $icqri[$j];?>" width="64px"><br/><?php  echo $ncqri[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cpi)!=$valorcp[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cpi)+1;$j++){;?>
<?php if ($cpi[$j]=='1'){;?><a href="<?php  echo $encpi[$j];?>?dat=i"><span class="caja"><img src="../../img/<?php  echo $icpi[$j];?>" width="64px"><br/><?php  echo $ncpi[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>


<?php if (count($cci)!=$valorcc[0]){;?>
<div class="main">
<span class="caja2"><b>Comunicaciones</b></span>
<?php  for ($j=0;$j<count($cci)+1;$j++){;?>
<?php if ($cci[$j]=='1'){;?><a href="<?php  echo $encci[$j];?>?dat=i"><span class="caja"><img src="../../img/<?php  echo $icci[$j];?>" width="64px"><br/><?php  echo $ncci[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cai)!=$valorca[0]){;?>
<div class="main">
<span class="caja2"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($cai)+1;$j++){;?>
<?php if ($ncai[$j]=='Jornadas'){;?><a href="<?php  echo $encai[$j];?>?dat=i"><span class="caja"><img src="../../img/<?php  echo $icai[$j];?>" width="64px"><br/><?php  echo $ncai[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

</div>

<?php } else {;
include ('../../cierre.php');
 };?>
</body>
</html>
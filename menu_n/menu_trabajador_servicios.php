<?php
include('bbdd.php');
//print_r($_COOKIE);

if ($ide!=null){;
 include('../portada_n/cabecera2.php');
 
$sql11r="select * from usuariosnombre where idempresas='".$ide."'";
$result11r=mysqli_query ($conn,$sql11r) or die ("Invalid result menucontabilidad");
$resultado11r=mysqli_fetch_array($result11r);
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


<?php if (count($cc1i)!=$valorcc[0]){;?>
<div class="main">
<span class="caja2"><b>Comunicaciones</b></span>
<?php  for ($j=0;$j<count($cc)+1;$j++){;
 if ($ncc[$j]=='Incidencias'){;?>
 <a href="<?php  echo $encc[$j];?>?dat=i"><span class="caja">
 <img src="../img/<?php  echo $icc[$j];?>" width="64px"><br/>
 <?php  echo $ncc[$j];?></span></a>
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
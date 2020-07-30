<?php
include('bbdd.php');

if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EXISTENCIAS</p></div>
<div class="contenido">

<?php 
$sql="select * from menuexistencias where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuexistencias");
$ex[1]=mysqli_result($result,0,'materiales');
$ex[2]=mysqli_result($result,0,'herramientas');
$ex[3]=mysqli_result($result,0,'vestuario');
$ex[4]=mysqli_result($result,0,'tienda');

$sql31="select * from menuexistenciasnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$nex[1]=mysqli_result($result31,0,'materiales');
$nex[2]=mysqli_result($result31,0,'herramientas');
$nex[3]=mysqli_result($result31,0,'vestuario');
$nex[4]=mysqli_result($result31,0,'tienda');

$sql32="select * from menuexistenciasimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$iex[1]=mysqli_result($result32,0,'materiales');
$iex[2]=mysqli_result($result32,0,'herramientas');
$iex[3]=mysqli_result($result32,0,'vestuario');
$iex[4]=mysqli_result($result32,0,'tienda');


$sql33="select * from menuexistenciasenlace where idempresa='".$ide."'";
$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$eex[1]=mysqli_result($result32,0,'materiales');
$eex[2]=mysqli_result($result32,0,'herramientas');
$eex[3]=mysqli_result($result32,0,'vestuario');
$eex[4]=mysqli_result($result32,0,'tienda');

?>

<div id="main">

<?php  for ($j=1;$j<count($ex)+1;$j++){;?>
<?php if ($ex[$j]=='1'){;?><span id="caja"><a href="<?php  echo $eex[$j];?>"><img src="../img/<?php  echo $iex[$j];?>" width="64px"><br/><?php  echo $nex[$j];?></a></span><?php };?>
<?php };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
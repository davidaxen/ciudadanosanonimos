<?php
include('bbdd.php');

if ($ide!=null){;

  include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">CONTABILIDAD</p></div>
<div class="contenido">

<?php 
$sql="select * from menucontabilidad where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c[1]=mysqli_result($result,0,'cobros');
$c[2]=mysqli_result($result,0,'pagos');
$c[3]=mysqli_result($result,0,'recibos');
$c[4]=mysqli_result($result,0,'asientos');
$c[5]=mysqli_result($result,0,'listados');
$c[6]=mysqli_result($result,0,'informes');

$sql31="select * from menucontabilidadnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$nc[1]=mysqli_result($result31,0,'cobros');
$nc[2]=mysqli_result($result31,0,'pagos');
$nc[3]=mysqli_result($result31,0,'recibos');
$nc[4]=mysqli_result($result31,0,'asientos');
$nc[5]=mysqli_result($result31,0,'listados');
$nc[6]=mysqli_result($result31,0,'informes');


$sql32="select * from menucontabilidadimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$ic[1]=mysqli_result($result32,0,'cobros');
$ic[2]=mysqli_result($result32,0,'pagos');
$ic[3]=mysqli_result($result32,0,'recibos');
$ic[4]=mysqli_result($result32,0,'asientos');
$ic[5]=mysqli_result($result32,0,'listados');
$ic[6]=mysqli_result($result32,0,'informes');


$sql33="select * from menucontabilidadenlace where idempresa='".$ide."'";
$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$enc[1]=mysqli_result($result33,0,'cobros');
$enc[2]=mysqli_result($result33,0,'pagos');
$enc[3]=mysqli_result($result33,0,'recibos');
$enc[4]=mysqli_result($result33,0,'asientos');
$enc[5]=mysqli_result($result33,0,'listados');
$enc[6]=mysqli_result($result33,0,'informes');






?>

<div id="main">
<?php  for ($j=1;$j<count($c)+1;$j++){;?>
<?php if ($c[$j]=='1'){;?><span id="caja"><a href="<?php  echo $enc[$j];?>"><img src="../img/<?php  echo $ic[$j];?>" width="64px"><br/><?php  echo $nc[$j];?></a></span><?php };?>
<?php };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
<?php
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">FACTURACION</p></div>
<div class="contenido">

<?php 
$sql="select * from menufacturacion where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$f[1]=mysqli_result($result,0,'facturas');
$f[2]=mysqli_result($result,0,'albaran');
$f[3]=mysqli_result($result,0,'facturasrecibidas');
$f[4]=mysqli_result($result,0,'hacienda');

$sql30="select * from menufacturacionnombre where idempresa='".$ide."'";
$result30=mysqli_query ($conn,$conn,$sql30) or die ("Invalid result menuempleados");
$nf[1]=mysqli_result($result30,0,'facturas');
$nf[2]=mysqli_result($result30,0,'albaran');
$nf[3]=mysqli_result($result30,0,'facturasrecibidas');
$nf[4]=mysqli_result($result30,0,'hacienda');


$sql31="select * from menufacturacionimg where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menuempleados");
$if[1]=mysqli_result($result31,0,'facturas');
$if[2]=mysqli_result($result31,0,'albaran');
$if[3]=mysqli_result($result31,0,'facturasrecibidas');
$if[4]=mysqli_result($result31,0,'hacienda');


$sql32="select * from menufacturacionenlace where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menuempleados");
$enf[1]=mysqli_result($result32,0,'facturas');
$enf[2]=mysqli_result($result32,0,'albaran');
$enf[3]=mysqli_result($result32,0,'facturasrecibidas');
$enf[4]=mysqli_result($result32,0,'hacienda');

?>

<div id="main">

<?php  for ($j=1;$j<count($f)+1;$j++){;?>
<?php if ($f[$j]=='1'){;?><span id="caja"><a href="<?php  echo $enf[$j];?>"><img src="../img/<?php  echo $if[$j];?>" width="64px"><br/><?php  echo $nf[$j];?></a></span><?php };?>
<?php };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
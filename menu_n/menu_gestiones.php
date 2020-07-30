<?php
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">GESTIONES</p></div>
<div class="contenido">

<?php 
$sql="select * from menufacturacion where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$f[1]=mysqli_result($result,0,'clientes');
$f[2]=mysqli_result($result,0,'gestores');
$f[3]=mysqli_result($result,0,'proveedores');
$f[4]=mysqli_result($result,0,'banco');
$f[5]=mysqli_result($result,0,'grupos');
$f[6]=mysqli_result($result,0,'hacienda');

$sql30="select * from menufacturacionnombre where idempresa='".$ide."'";
$result30=mysqli_query ($conn,$conn,$sql30) or die ("Invalid result menuempleados");
$nf[1]=mysqli_result($result30,0,'clientes');
$nf[2]=mysqli_result($result30,0,'gestores');
$nf[3]=mysqli_result($result30,0,'proveedores');
$nf[4]=mysqli_result($result30,0,'banco');
$nf[5]=mysqli_result($result30,0,'grupos');
$nf[6]=mysqli_result($result30,0,'hacienda');


$sql31="select * from menufacturacionimg where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menuempleados");
$if[1]=mysqli_result($result31,0,'clientes');
$if[2]=mysqli_result($result31,0,'gestores');
$if[3]=mysqli_result($result31,0,'proveedores');
$if[4]=mysqli_result($result31,0,'banco');
$if[5]=mysqli_result($result31,0,'grupos');
$if[6]=mysqli_result($result31,0,'hacienda');

$sql32="select * from menufacturacionenlace where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menuempleados");
$enf[1]=mysqli_result($result32,0,'clientes');
$enf[2]=mysqli_result($result32,0,'gestores');
$enf[3]=mysqli_result($result32,0,'proveedores');
$enf[4]=mysqli_result($result32,0,'banco');
$enf[5]=mysqli_result($result32,0,'grupos');
$enf[6]=mysqli_result($result32,0,'hacienda');
?>

 <div id="main">

<?php  
for ($j=1;$j<count($f)+1;$j++){;
 if ($f[$j]=='1'){;?><span id="caja"><a href="<?php  echo $enf[$j];?>"><img src="../img/<?php  echo $if[$j];?>" width="64px"><br/>
 <?php  echo $nf[$j];?></a></span>
 <?php };
 };?>

</div>

</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
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
$result=$conn->query($sql);
$resultado=$result->fetchAll();
$f[1]=$resultado[0]['clientes'];
$f[2]=$resultado[0]['gestores'];
$f[3]=$resultado[0]['proveedores'];
$f[4]=$resultado[0]['banco'];
$f[5]=$resultado[0]['grupos'];
$f[6]=$resultado[0]['hacienda'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$f[1]=mysqli_result($result,0,'clientes');
$f[2]=mysqli_result($result,0,'gestores');
$f[3]=mysqli_result($result,0,'proveedores');
$f[4]=mysqli_result($result,0,'banco');
$f[5]=mysqli_result($result,0,'grupos');
$f[6]=mysqli_result($result,0,'hacienda');*/

$sql30="select * from menufacturacionnombre where idempresa='".$ide."'";
$result30=$conn->query($sql30);
$resultado30=$result30->fetchAll();
$nf[1]=$resultado30[0]['clientes'];
$nf[2]=$resultado30[0]['gestores'];
$nf[3]=$resultado30[0]['proveedores'];
$nf[4]=$resultado30[0]['banco'];
$nf[5]=$resultado30[0]['grupos'];
$nf[6]=$resultado30[0]['hacienda'];

/*$result30=mysqli_query ($conn,$conn,$sql30) or die ("Invalid result menuempleados");
$nf[1]=mysqli_result($result30,0,'clientes');
$nf[2]=mysqli_result($result30,0,'gestores');
$nf[3]=mysqli_result($result30,0,'proveedores');
$nf[4]=mysqli_result($result30,0,'banco');
$nf[5]=mysqli_result($result30,0,'grupos');
$nf[6]=mysqli_result($result30,0,'hacienda');*/


$sql31="select * from menufacturacionimg where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();
$if[1]=$resultado31[0]['clientes'];
$if[2]=$resultado31[0]['gestores'];
$if[3]=$resultado31[0]['proveedores'];
$if[4]=$resultado31[0]['banco'];
$if[5]=$resultado31[0]['grupos'];
$if[6]=$resultado31[0]['hacienda'];

/*$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menuempleados");
$if[1]=mysqli_result($result31,0,'clientes');
$if[2]=mysqli_result($result31,0,'gestores');
$if[3]=mysqli_result($result31,0,'proveedores');
$if[4]=mysqli_result($result31,0,'banco');
$if[5]=mysqli_result($result31,0,'grupos');
$if[6]=mysqli_result($result31,0,'hacienda');*/

$sql32="select * from menufacturacionenlace where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();
$enf[1]=$resultado32[0]['clientes'];
$enf[2]=$resultado32[0]['gestores'];
$enf[3]=$resultado32[0]['proveedores'];
$enf[4]=$resultado32[0]['banco'];
$enf[5]=$resultado32[0]['grupos'];
$enf[6]=$resultado32[0]['hacienda'];

/*$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menuempleados");
$enf[1]=mysqli_result($result32,0,'clientes');
$enf[2]=mysqli_result($result32,0,'gestores');
$enf[3]=mysqli_result($result32,0,'proveedores');
$enf[4]=mysqli_result($result32,0,'banco');
$enf[5]=mysqli_result($result32,0,'grupos');
$enf[6]=mysqli_result($result32,0,'hacienda');*/
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
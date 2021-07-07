<?php
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EMPLEADOS</p></div>
<div class="contenido">

<?php 
$sql30="select * from menuempleados where user='".$user."' and idempresa='".$ide."'";
$result30=$conn->query($sql30);
$resultado30=$result30->fetchAll();

$e[1]=$resultado30[0]['empleado'];
$e[2]=$resultado30[0]['recibos'];
$e[3]=$resultado30[0]['anticipos'];
$e[4]=$resultado30[0]['nominas'];
$e[5]=$resultado30[0]['liquidacion'];
$e[6]=$resultado30[0]['ficheros'];
$e[7]=$resultado30[0]['certificados'];
$e[8]=$resultado30[0]['irpf'];
$e[9]=$resultado30[0]['segsocial'];
$e[10]=$resultado30[0]['vacaciones'];
$e[11]=$resultado30[0]['cuadrantes'];
$e[12]=$resultado30[0]['ropa'];
$e[13]=$resultado30[0]['cotizacion'];

/*$result30=mysqli_query ($conn,$conn,$sql30) or die ("Invalid result menuempleados");
$e[1]=mysqli_result($result30,0,'empleado');
$e[2]=mysqli_result($result30,0,'recibos');
$e[3]=mysqli_result($result30,0,'anticipos');
$e[4]=mysqli_result($result30,0,'nominas');
$e[5]=mysqli_result($result30,0,'liquidacion');
$e[6]=mysqli_result($result30,0,'ficheros');
$e[7]=mysqli_result($result30,0,'certificados');
$e[8]=mysqli_result($result30,0,'irpf');
$e[9]=mysqli_result($result30,0,'segsocial');
$e[10]=mysqli_result($result30,0,'vacaciones');
$e[11]=mysqli_result($result30,0,'cuadrantes');
$e[12]=mysqli_result($result30,0,'ropa');
$e[13]=mysqli_result($result30,0,'cotizacion');*/


$sql31="select * from menuempleadosnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();

$ne[1]=$resultado31[0]['empleado'];
$ne[2]=$resultado31[0]['recibos'];
$ne[3]=$resultado31[0]['anticipos'];
$ne[4]=$resultado31[0]['nominas'];
$ne[5]=$resultado31[0]['liquidacion'];
$ne[6]=$resultado31[0][,'ficheros'];
$ne[7]=$resultado31[0]['certificados'];
$ne[8]=$resultado31[0]['irpf'];
$ne[9]=$resultado31[0]['segsocial'];
$ne[10]=$resultado31[0]['vacaciones'];
$ne[11]=$resultado31[0]['cuadrantes'];
$ne[12]=$resultado31[0]['ropa'];
$ne[13]=$resultado31[0]['cotizacion'];

/*$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menuempleados");
$ne[1]=mysqli_result($result31,0,'empleado');
$ne[2]=mysqli_result($result31,0,'recibos');
$ne[3]=mysqli_result($result31,0,'anticipos');
$ne[4]=mysqli_result($result31,0,'nominas');
$ne[5]=mysqli_result($result31,0,'liquidacion');
$ne[6]=mysqli_result($result31,0,'ficheros');
$ne[7]=mysqli_result($result31,0,'certificados');
$ne[8]=mysqli_result($result31,0,'irpf');
$ne[9]=mysqli_result($result31,0,'segsocial');
$ne[10]=mysqli_result($result31,0,'vacaciones');
$ne[11]=mysqli_result($result31,0,'cuadrantes');
$ne[12]=mysqli_result($result31,0,'ropa');
$ne[13]=mysqli_result($result31,0,'cotizacion');*/


$sql32="select * from menuempleadosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();

$ie[1]=$resultado32[0]['empleado'];
$ie[2]=$resultado32[0]['recibos'];
$ie[3]=$resultado32[0]['anticipos'];
$ie[4]=$resultado32[0]['nominas'];
$ie[5]=$resultado32[0]['liquidacion'];
$ie[6]=$resultado32[0]['ficheros'];
$ie[7]=$resultado32[0]['certificados'];
$ie[8]=$resultado32[0]['irpf'];
$ie[9]=$resultado32[0]['segsocial'];
$ie[10]=$resultado32[0]['vacaciones'];
$ie[11]=$resultado32[0]['cuadrantes'];
$ie[12]=$resultado32[0]['ropa'];
$ie[13]=$resultado32[0]['cotizaion'];

/*result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menuempleados");
$ie[1]=mysqli_result($result32,0,'empleado');
$ie[2]=mysqli_result($result32,0,'recibos');
$ie[3]=mysqli_result($result32,0,'anticipos');
$ie[4]=mysqli_result($result32,0,'nominas');
$ie[5]=mysqli_result($result32,0,'liquidacion');
$ie[6]=mysqli_result($result32,0,'ficheros');
$ie[7]=mysqli_result($result32,0,'certificados');
$ie[8]=mysqli_result($result32,0,'irpf');
$ie[9]=mysqli_result($result32,0,'segsocial');
$ie[10]=mysqli_result($result32,0,'vacaciones');
$ie[11]=mysqli_result($result32,0,'cuadrantes');
$ie[12]=mysqli_result($result32,0,'ropa');
$ie[13]=mysqli_result($result32,0,'cotizacion');*/



$sql33="select * from menuempleadosenlace where idempresa='".$ide."'";
$result33=$conn->query($sql33);
$resultado33=$result33->fetchAll();

$ene[1]=$resultado33[0]['empleado'];
$ene[2]=$resultado33[0]['recibos'];
$ene[3]=$resultado33[0]['anticipos'];
$ene[4]=$resultado33[0]['nominas'];
$ene[5]=$resultado33[0]['liquidacion'];
$ene[6]=$resultado33[0]['ficheros'];
$ene[7]=$resultado33[0]['certificados'];
$ene[8]=$resultado33[0]['irpf'];
$ene[9]=$resultado33[0]['segsocial'];
$ene[10]=$resultado33[0]['vacaciones'];
$ene[11]=$resultado33[0]['cuadrantes'];
$ene[12]=$resultado33[0]['ropa'];
$ene[13]=$resultado33[0]['cotizacion'];

/*$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menuempleados");
$ene[1]=mysqli_result($result33,0,'empleado');
$ene[2]=mysqli_result($result33,0,'recibos');
$ene[3]=mysqli_result($result33,0,'anticipos');
$ene[4]=mysqli_result($result33,0,'nominas');
$ene[5]=mysqli_result($result33,0,'liquidacion');
$ene[6]=mysqli_result($result33,0,'ficheros');
$ene[7]=mysqli_result($result33,0,'certificados');
$ene[8]=mysqli_result($result33,0,'irpf');
$ene[9]=mysqli_result($result33,0,'segsocial');
$ene[10]=mysqli_result($result33,0,'vacaciones');
$ene[11]=mysqli_result($result33,0,'cuadrantes');
$ene[12]=mysqli_result($result33,0,'ropa');
$ene[13]=mysqli_result($result33,0,'cotizacion');*/



?>

<div id="main">

<?php  for ($j=1;$j<count($e)+1;$j++){;?>
<?php if ($e[$j]=='1'){;?><span id="caja"><a href="<?php  echo $ene[$j];?>"><img src="../img/<?php  echo $ie[$j];?>" width="64px"><br/><?php  echo $ne[$j];?></a></span><?php };?>
<?php };?>

</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
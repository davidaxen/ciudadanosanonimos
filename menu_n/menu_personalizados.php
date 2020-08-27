<?php
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">PERSONALIZADOS</p></div>
<div class="contenido">

<?php 
$sql="select * from menupersonalizados where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();
$p[1]=$resultado[0]['documentos'];
$p[2]=$resultado[0]['piscinas'];
$p[3]=$resultado[0]['pcontrol'];
$p[4]=$resultado[0]['carnet'];
$p[5]=$resultado[0]['contratos'];
$p[6]=$resultado[0]['asignacion'];
$p[7]=$resultado[0]['candidatos'];
$p[8]=$resultado[0]['precios'];
$p[9]=$resultado[0]['presupuesto'];
$p[10]=$resultado[0]['datos'];
$p[11]=$resultado[0]['notas'];
$p[12]=$resultado[0]['smartcbc'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$p[1]=mysqli_result($result,0,'documentos');
$p[2]=mysqli_result($result,0,'piscinas');
$p[3]=mysqli_result($result,0,'pcontrol');
$p[4]=mysqli_result($result,0,'carnet');
$p[5]=mysqli_result($result,0,'contratos');
$p[6]=mysqli_result($result,0,'asignacion');
$p[7]=mysqli_result($result,0,'candidatos');
$p[8]=mysqli_result($result,0,'precios');
$p[9]=mysqli_result($result,0,'presupuesto');
$p[10]=mysqli_result($result,0,'datos');
$p[11]=mysqli_result($result,0,'notas');
$p[12]=mysqli_result($result,0,'smartcbc');*/

$sql31="select * from menupersonalizadosnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();
$np[1]=$resultado31[0]['documentos'];
$np[2]=$resultado31[0]['piscinas'];
$np[3]=$resultado31[0]['pcontrol'];
$np[4]=$resultado31[0]['carnet'];
$np[5]=$resultado31[0]['contratos'];
$np[6]=$resultado31[0]['asignacion'];
$np[7]=$resultado31[0]['candidatos'];
$np[8]=$resultado31[0]['precios'];
$np[9]=$resultado31[0]['presupuesto'];
$np[10]=$resultado31[0]['datos'];
$np[11]=$resultado31[0]['notas'];
$np[12]=$resultado31[0]['smartcbc'];

/*$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$np[1]=mysqli_result($result31,0,'documentos');
$np[2]=mysqli_result($result31,0,'piscinas');
$np[3]=mysqli_result($result31,0,'pcontrol');
$np[4]=mysqli_result($result31,0,'carnet');
$np[5]=mysqli_result($result31,0,'contratos');
$np[6]=mysqli_result($result31,0,'asignacion');
$np[7]=mysqli_result($result31,0,'candidatos');
$np[8]=mysqli_result($result31,0,'precios');
$np[9]=mysqli_result($result31,0,'presupuesto');
$np[10]=mysqli_result($result31,0,'datos');
$np[11]=mysqli_result($result31,0,'notas');
$np[12]=mysqli_result($result31,0,'smartcbc');*/


$sql32="select * from menupersonalizadosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();
$ip[1]=$resultado32[0]['documentos'];
$ip[2]=$resultado32[0]['piscinas'];
$ip[3]=$resultado32[0]['pcontrol'];
$ip[4]=$resultado32[0]['carnet'];
$ip[5]=$resultado32[0]['contratos'];
$ip[6]=$resultado32[0]['asignacion'];
$ip[7]=$resultado32[0]['candidatos'];
$ip[8]=$resultado32[0]['precios'];
$ip[9]=$resultado32[0]['presupuesto'];
$ip[10]=$resultado32[0]['datos'];
$ip[11]=$resultado32[0]['notas'];
$ip[12]=$resultado32[0]['smartcbc'];

/*$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$ip[1]=mysqli_result($result32,0,'documentos');
$ip[2]=mysqli_result($result32,0,'piscinas');
$ip[3]=mysqli_result($result32,0,'pcontrol');
$ip[4]=mysqli_result($result32,0,'carnet');
$ip[5]=mysqli_result($result32,0,'contratos');
$ip[6]=mysqli_result($result32,0,'asignacion');
$ip[7]=mysqli_result($result32,0,'candidatos');
$ip[8]=mysqli_result($result32,0,'precios');
$ip[9]=mysqli_result($result32,0,'presupuesto');
$ip[10]=mysqli_result($result32,0,'datos');
$ip[11]=mysqli_result($result32,0,'notas');
$ip[12]=mysqli_result($result32,0,'smartcbc');*/

$sql33="select * from menupersonalizadosenlace where idempresa='".$ide."'";
$result33=$conn->query($sql33);
$resultado33=$result33->fetchAll();
$enp[1]=$resultado33[0]['documentos'];
$enp[2]=$resultado33[0]['piscinas'];
$enp[3]=$resultado33[0]['pcontrol'];
$enp[4]=$resultado33[0]['carnet'];
$enp[5]=$resultado33[0]['contratos'];
$enp[6]=$resultado33[0]['asignacion'];
$enp[7]=$resultado33[0]['candidatos'];
$enp[8]=$resultado33[0]['precios'];
$enp[9]=$resultado33[0]['presupuesto'];
$enp[10]=$resultado33[0]['datos'];
$enp[11]=$resultado33[0]['notas'];
$enp[12]=$resultado33[0]['smartcbc'];

/*$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$enp[1]=mysqli_result($result33,0,'documentos');
$enp[2]=mysqli_result($result33,0,'piscinas');
$enp[3]=mysqli_result($result33,0,'pcontrol');
$enp[4]=mysqli_result($result33,0,'carnet');
$enp[5]=mysqli_result($result33,0,'contratos');
$enp[6]=mysqli_result($result33,0,'asignacion');
$enp[7]=mysqli_result($result33,0,'candidatos');
$enp[8]=mysqli_result($result33,0,'precios');
$enp[9]=mysqli_result($result33,0,'presupuesto');
$enp[10]=mysqli_result($result33,0,'datos');
$enp[11]=mysqli_result($result33,0,'notas');
$enp[12]=mysqli_result($result33,0,'smartcbc');*/


?>

<div id="main">
<?php  for ($j=1;$j<count($p)+1;$j++){;?>
<?php if ($p[$j]=='1'){;?><span id="caja"><a href="<?php  echo $enp[$j];?>"><img src="../img/<?php  echo $ip[$j];?>" width="64px"><br/><?php  echo $np[$j];?></a></span><?php };?>
<?php };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
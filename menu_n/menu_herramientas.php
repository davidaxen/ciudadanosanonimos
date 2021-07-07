<?php
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">HERRAMIENTAS</p></div>
<div class="contenido">

<?php 
$sql="select * from menuservicios where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();
$c[1]=$resultado[0]['cuadrante'];
$c[2]=$resultado[0]['jornadas'];
$c[3]=$resultado[0]['incidencia'];
$c[4]=$resultado[0]['informes'];
$c[5]=$resultado[0]['mensaje'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c[1]=mysqli_result($result,0,'cuadrante');
$c[2]=mysqli_result($result,0,'jornadas');
$c[3]=mysqli_result($result,0,'incidencia');
$c[4]=mysqli_result($result,0,'informes');
$c[5]=mysqli_result($result,0,'mensaje');*/


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();
$nc[1]=$resultado31[0]['cuadrante'];
$nc[2]=$resultado31[0]['jornadas'];
$nc[3]=$resultado31[0]['incidencia'];
$nc[4]=$resultado31[0]['informes'];
$nc[5]=$resultado31[0]['mensaje'];

/*$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$nc[1]=mysqli_result($result31,0,'cuadrante');
$nc[2]=mysqli_result($result31,0,'jornadas');
$nc[3]=mysqli_result($result31,0,'incidencia');
$nc[4]=mysqli_result($result31,0,'informes');
$nc[5]=mysqli_result($result31,0,'mensaje');*/

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();
$ic[1]=$resultado32[0]['cuadrante'];
$ic[2]=$resultado32[0]['jornadas'];
$ic[3]=$resultado32[0]['incidencia'];
$ic[4]=$resultado32[0]['informes'];
$ic[5]=$resultado32[0]['mensaje'];

/*$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$ic[1]=mysqli_result($result32,0,'cuadrante');
$ic[2]=mysqli_result($result32,0,'jornadas');
$ic[3]=mysqli_result($result32,0,'incidencia');
$ic[4]=mysqli_result($result32,0,'informes');
$ic[5]=mysqli_result($result32,0,'mensaje');*/


$sql33="select * from menuserviciosenlace where idempresa='".$ide."'";
$result33=$conn->query($sql33);
$resultado33=$result33->fetchAll();
$enc[1]=$resultado33[0]['cuadrante'];
$enc[2]=$resultado33[0]['jornadas'];
$enc[3]=$resultado33[0]['incidencia'];
$enc[4]=$resultado33[0]['informes'];
$enc[5]=$resultado33[0]['mensaje'];

/*$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$enc[1]=mysqli_result($result33,0,'cuadrante');
$enc[2]=mysqli_result($result33,0,'jornadas');
$enc[3]=mysqli_result($result33,0,'incidencia');
$enc[4]=mysqli_result($result33,0,'informes');
$enc[5]=mysqli_result($result33,0,'mensaje');*/


?>

<div id="main">
<?php  for ($j=1;$j<count($c)+1;$j++){;
if ($c[$j]=='1'){;?>
<span id="caja"><a href="<?php  echo $enc[$j];?>"><img src="../img/<?php  echo $ic[$j];?>" width="64px"><br/>
<?php  echo $nc[$j];?></a></span>
<?php };
 };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
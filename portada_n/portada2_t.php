<?php   
include('bbdd2.php');


$adme=array('../empleados_n/pdfcartt.php?dato='.$idtrab);
$admn=array('Carta');
$admimg=array('iconlis.png');




$sql02="SELECT * from menuserviciosimg where idempresa='".$ide."'"; 
//echo $sql01;

$result02=$conn->query($sql02);
$resultado02=$result02->fetchAll();
//$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 02");
//$resultado02=mysqli_fetch_array($result02);
$datoi[]=$resultado02['entrada'];


$sql03="SELECT * from menuserviciosnombre where idempresa='".$ide."'"; 
//echo $sql01;

$result03=$conn->query($sql03);
$resultado03=$result10->fetchAll();
//$result03=mysqli_query ($conn,$sql03) or die ("Invalid result 03");
//$resultado03=mysqli_fetch_array($result03);
$valores[]=$resultado03['entrada'];

$ipcat=array('entrada');
?>

<?php 
for ($j=0;$j<count($admn);$j++){;
?>
<a href="<?php  echo $adme[$j];?>">
<span class="caja3">
<img src="../img/<?php  echo $admimg[$j];?>" width="32px" alt="<?php  echo $admn[$j];?>">
<br/><?php  echo $admn[$j];?>
</span>
</a>
<?php };?>


<?php 
for ($j=0;$j<count($valores);$j++){;
?>
<a href="../servicios_n/<?php  echo $ipcat[$j];?>/infpuntconte.php"> 
<span class="caja3">
<img src="../img/<?php  echo $datoi[$j];?>" class="cuadro" alt="<?php  echo $valores[$j];?>">
<br/><?php  echo $valores[$j];?>
</span>
</a>
<?php };?>


<?php
if ($idtrab!=null){;

$sql01="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idtrab."'"; 
//echo $sql01;

$result01=$conn->query($sql01);
$resultados01=$result01->fetchAll();
//$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 01");
//$resultados01 = mysqli_fetch_array ($result01);
$teletrabajos=$resultados01['teletrabajo'];


$sql02="SELECT * from menuserviciosimg where idempresa='".$ide."'"; 
//echo $sql01;

$result02=$conn->query($sql02);
$resultados02=$result02->fetchAll();

//$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 02");
//$resultados02 = mysqli_fetch_array ($result02);
$teletrabajoi=$resultados02['teletrabajo'];

$sql03="SELECT * from menuserviciosnombre where idempresa='".$ide."'"; 
//echo $sql01;

$result03=$conn->query($sql03);
$resultados03=$result03->fetchAll();
//$result03=mysqli_query ($conn,$sql03) or die ("Invalid result 03");
//$resultados03 = mysqli_fetch_array ($result03);
$teletrabajon=$resultados03['teletrabajo'];


if ($teletrabajos==1){;
?>
<a href="../portada_n/fichajeteletrabajo.php">
<span class="caja3">
<img src="../img/<?php  echo $teletrabajoi;?>" alt="<?php  echo $teletrabajon;?>" width="32px">
<br/>Fichaje
<br/><?php  echo $teletrabajon;?>
</span>
</a>
<?php
};

};
?>









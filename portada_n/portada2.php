<?php   
include('bbdd.php');


$adme=array('../facturacion_n/contpisc.php?tipo=1','../facturacion_n/contpisc.php?tipo=2','../empleados_n/lempleados.php?tipo=alta&estadoe=1&ano=todos&smart=si');


$sql00a="SELECT * from menuadministracion where idempresa='".$ide."'"; 
//echo $sql01a;
$result00a=mysqli_query ($conn,$sql00a) or die ("Invalid result 01a");
$resultados00a = mysqli_fetch_array ($result00a);
$adm[]=$resultados00a['clientes'];
$adm[]=$resultados00a['puestos'];
$adm[]=$resultados00a['empleados'];

$sql01a="SELECT * from menuadministracionnombre where idempresa='".$ide."'"; 
//echo $sql01a;
$result01a=mysqli_query ($conn,$sql01a) or die ("Invalid result 01a");
$resultados01a = mysqli_fetch_array ($result01a);
$admn[]=$resultados01a['clientes'];
$admn[]=$resultados01a['puestos'];
$admn[]=$resultados01a['empleados'];


$sql02a="SELECT * from menuadministracionimg where idempresa='".$ide."'"; 
//echo $sql02a;
$result02a=mysqli_query ($conn,$sql02a) or die ("Invalid result 02a");
$resultados02a = mysqli_fetch_array ($result02a);
$admimg[]=$resultados02a['clientes'];
$admimg[]=$resultados02a['puestos'];
$admimg[]=$resultados02a['empleados'];


$dia=date("j",time());
$mes=date("n",time());
$año=date("Y",time());
$fechaant=date("Y-m-d", mktime (0,0,0,$mes,$dia-1,$año));
$fechapant=date("Y-m-d", mktime (0,0,0,$mes,$dia-2,$año));
$fechaactual=date("Y-m-d", mktime (0,0,0,$mes,$dia,$año));
$fechaman=date("Y-m-d", mktime (0,0,0,$mes,$dia+1,$año));
$fechapman=date("Y-m-d", mktime (0,0,0,$mes,$dia+2,$año));




$sql01="SELECT * from portadai where idempresa='".$ide."'"; 
//echo $sql01;
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 01");
$resultados01 = mysqli_fetch_array ($result01);
$dato[]=$resultados01['cuadrante'];
$dato[]=$resultados01['entrada'];
$dato[]=$resultados01['incidencia'];
$dato[]=$resultados01['mensaje'];	
$dato[]=$resultados01['alarma'];
$dato[]=$resultados01['accdiarias'];
$dato[]=$resultados01['accmantenimiento'];
$dato[]=$resultados01['niveles'];
$dato[]=$resultados01['productos'];
$dato[]=$resultados01['revision'];
$dato[]=$resultados01['trabajo'];
$dato[]=$resultados01['siniestro'];
$dato[]=$resultados01['control'];
$dato[]=$resultados01['mediciones'];


$sql02="SELECT * from menuserviciosimg where idempresa='".$ide."'"; 
//echo $sql01;
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 02");
$resultados02 = mysqli_fetch_array ($result02);
$datoi[]=$resultados02['cuadrante'];
$datoi[]=$resultados02['entrada'];
$datoi[]=$resultados02['incidencia'];
$datoi[]=$resultados02['mensaje'];	
$datoi[]=$resultados02['alarma'];
$datoi[]=$resultados02['accdiarias'];
$datoi[]=$resultados02['accmantenimiento'];
$datoi[]=$resultados02['niveles'];
$datoi[]=$resultados02['productos'];
$datoi[]=$resultados02['revision'];
$datoi[]=$resultados02['trabajo'];
$datoi[]=$resultados02['siniestro'];
$datoi[]=$resultados02['control'];
$datoi[]=$resultados02['mediciones'];
$dtinfi=$resultados02['informes'];

$sql03="SELECT * from menuserviciosnombre where idempresa='".$ide."'"; 
//echo $sql01;
$result03=mysqli_query ($conn,$sql03) or die ("Invalid result 03");
$resultados03 = mysqli_fetch_array ($result03);
$valores[]=$resultados03['cuadrante'];
$valores[]=$resultados03['entrada'];
$valores[]=$resultados03['incidencia'];
$valores[]=$resultados03['mensaje'];	
$valores[]=$resultados03['alarma'];
$valores[]=$resultados03['accdiarias'];
$valores[]=$resultados03['accmantenimiento'];
$valores[]=$resultados03['niveles'];
$valores[]=$resultados03['productos'];
$valores[]=$resultados03['revision'];
$valores[]=$resultados03['trabajo'];
$valores[]=$resultados03['siniestro'];
$valores[]=$resultados03['control'];
$valores[]=$resultados03['mediciones'];
$dtinfv=$resultados03['informes'];

$ipcat=array('0','1','20','30','40','3','4','2','5','6','7','8','9','10');
?>

<?php // include ('estilo/menu.htm'); ?>



<?php
  for ($j=0;$j<count($admn);$j++){; ?>

<?php  if ($adm[$j]==1){;?>


<a href="<?php  echo $adme[$j];?>">
<span class="caja3">
<div style="position:relative">
<img src="../img/<?php  echo $admimg[$j];?>" width="32px" alt="<?php  echo $admn[$j];?>">
<div style="position:absolute; top:0;right:0px;">
<img border="0"  src="../img/iconqr.png" width="10" height="10" />
</div>
<br/>
<?php  echo $admn[$j];?> 
<br/>Codigo
</div>
</span>
</a>

<?php 
if ($idcli!=0){;
$j=count($admn);
};

};

};

if ($idcli!=0){;?>
<a href="../menu_n/menu_clientes.php">
<?php }else{;?>
<a href="../servicios_n/informe/menu_informe.php">
<?php };?>
<span class="caja3">
<img src="../img/<?php  echo $dtinfi;?>" width="32px" alt="<?php  echo $dtinfv;?>">
<br/>
Informes
</span>
</a>

 
 <?php 
$t=1;
for ($j=0;$j<count($valores);$j++){;

if ($dato[$j]==1){;

$idpccat=$ipcat[$j];
$sql04="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result04=mysqli_query ($conn,$sql04) or die ("Invalid result 04");
$resultados04 = mysqli_fetch_array ($result04);
//$imagen=$resultados02['imagen2'];
$pagina=$resultados04['pagina'];
?>
<a href="../portada_n/<?php  echo $pagina;?>?fecha=<?php  echo $fechaactual;?>&idpccat=<?php  echo $idpccat;?>">
<span class="caja3">
<img src="../img/<?php  echo $datoi[$j];?>" alt="<?php  echo $valores[$j];?>" width="32px">
<br/>
<?php  echo $valores[$j];?>
<br/> Dia <?php  echo $fechaactual;?>
</span>
</a>
<?php };?>



<?php };?>

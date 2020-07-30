<?php   
include('bbdd2.php');


$adme=array('../facturacion_n/contpisc.php?tipo=1','../facturacion_n/contpisc.php?tipo=2','../empleados_n/lempleados.php?tipo=alta&estado=1&ano=todos&smart=si');


$sql01a="SELECT * from menuadministracionnombre where idempresa='".$ide."'"; 
//echo $sql01a;
$result01a=mysqli_query ($conn,$sql01a) or die ("Invalid result 01a");
$admn[]=mysqli_result($result01a,0,'clientes');
$admn[]=mysqli_result($result01a,0,'puestos');
$admn[]=mysqli_result($result01a,0,'empleados');


$sql02a="SELECT * from menuadministracionimg where idempresa='".$ide."'"; 
//echo $sql02a;
$result02a=mysqli_query ($conn,$sql02a) or die ("Invalid result 02a");
$admimg[]=mysqli_result($result02a,0,'clientes');
$admimg[]=mysqli_result($result02a,0,'puestos');
$admimg[]=mysqli_result($result02a,0,'empleados');


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
$dato[]=mysqli_result($result01,0,'cuadrante');
$dato[]=mysqli_result($result01,0,'entrada');
$dato[]=mysqli_result($result01,0,'incidencia');
$dato[]=mysqli_result($result01,0,'mensaje');	
$dato[]=mysqli_result($result01,0,'alarma');
$dato[]=mysqli_result($result01,0,'accdiarias');
$dato[]=mysqli_result($result01,0,'accmantenimiento');
$dato[]=mysqli_result($result01,0,'niveles');
$dato[]=mysqli_result($result01,0,'productos');
$dato[]=mysqli_result($result01,0,'revision');
$dato[]=mysqli_result($result01,0,'trabajo');
$dato[]=mysqli_result($result01,0,'siniestro');
$dato[]=mysqli_result($result01,0,'control');
$dato[]=mysqli_result($result01,0,'mediciones');


$sql02="SELECT * from menuserviciosimg where idempresa='".$ide."'"; 
//echo $sql01;
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 02");
$datoi[]=mysqli_result($result02,0,'cuadrante');
$datoi[]=mysqli_result($result02,0,'entrada');
$datoi[]=mysqli_result($result02,0,'incidencia');
$datoi[]=mysqli_result($result02,0,'mensaje');	
$datoi[]=mysqli_result($result02,0,'alarma');
$datoi[]=mysqli_result($result02,0,'accdiarias');
$datoi[]=mysqli_result($result02,0,'accmantenimiento');
$datoi[]=mysqli_result($result02,0,'niveles');
$datoi[]=mysqli_result($result02,0,'productos');
$datoi[]=mysqli_result($result02,0,'revision');
$datoi[]=mysqli_result($result02,0,'trabajo');
$datoi[]=mysqli_result($result02,0,'siniestro');
$datoi[]=mysqli_result($result02,0,'control');
$datoi[]=mysqli_result($result02,0,'mediciones');
$dtinfi=mysqli_result($result02,0,'informes');

$sql03="SELECT * from menuserviciosnombre where idempresa='".$ide."'"; 
//echo $sql01;
$result03=mysqli_query ($conn,$sql03) or die ("Invalid result 03");
$valores[]=mysqli_result($result03,0,'cuadrante');
$valores[]=mysqli_result($result03,0,'entrada');
$valores[]=mysqli_result($result03,0,'incidencia');
$valores[]=mysqli_result($result03,0,'mensaje');	
$valores[]=mysqli_result($result03,0,'alarma');
$valores[]=mysqli_result($result03,0,'accdiarias');
$valores[]=mysqli_result($result03,0,'accmantenimiento');
$valores[]=mysqli_result($result03,0,'niveles');
$valores[]=mysqli_result($result03,0,'productos');
$valores[]=mysqli_result($result03,0,'revision');
$valores[]=mysqli_result($result03,0,'trabajo');
$valores[]=mysqli_result($result03,0,'siniestro');
$valores[]=mysqli_result($result03,0,'control');
$valores[]=mysqli_result($result03,0,'mediciones');
$dtinfv=mysqli_result($result03,0,'informes');

$ipcat=array('0','1','20','30','40','3','4','2','5','6','7','8','9','10');
?>

<!--
<?php 
for ($j=0;$j<count($admn);$j++){;
?>
<div>
<a href="<?php  echo $adme[$j];?>" 
rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $admn[$j];?> - Codigos">
<img src="../img/<?php  echo $admimg[$j];?>" class="cuadro" alt="<?php  echo $admn[$j];?>">
</a>
</div>
<?php };?>
<div>
<a href="../servicios_n/informe/menu_informe.php" 
rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $dtinfv;?>">
<img src="../img/<?php  echo $dtinfi;?>" class="cuadro" alt="<?php  echo $dtinfv;?>">
</a>
</div>
-->


<?php 
$t=1;
for ($j=0;$j<count($valores);$j++){;
?>


<?php 
if ($dato[$j]==1){;
?>
<div>
<?php 
$idpccat=$ipcat[$j];
$sql04="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result04=mysqli_query ($conn,$sql04) or die ("Invalid result 04");
//$imagen=mysqli_result($result02,0,'imagen2');
$pagina=mysqli_result($result04,0,'pagina');
$pag_pr1=strtok($pagina,'.');
$pag_pr2=strtok('.');
$pagina=$pag_pr1.'_g.'.$pag_pr2;
?>
<a href="../portada_n/<?php  echo $pagina;?>?fecha=<?php  echo $fechaactual;?>&idpccat=<?php  echo $idpccat;?>" 
rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $valores[$j];?> - Dia <?php  echo $fechaactual;?>">
<img src="../img/<?php  echo $datoi[$j];?>" class="cuadro" alt="<?php  echo $valores[$j];?>">
</a>
</div>
<?php };?>



<?php };?>

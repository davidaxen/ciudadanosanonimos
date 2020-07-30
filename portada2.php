<?php  
include('bbdd2.php');


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
$result01=mysql_query ($sql01) or die ("Invalid result 1");
$valores=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro');
$ipcat=array('0','1','20','30','40','3','4','2','5','6','7','8');
$dato[]=mysql_result($result01,0,'cuadrante');
$dato[]=mysql_result($result01,0,'entrada');
$dato[]=mysql_result($result01,0,'incidencia');
$dato[]=mysql_result($result01,0,'mensaje');	
$dato[]=mysql_result($result01,0,'alarma');
$dato[]=mysql_result($result01,0,'accdiarias');
$dato[]=mysql_result($result01,0,'accmantenimiento');
$dato[]=mysql_result($result01,0,'niveles');
$dato[]=mysql_result($result01,0,'productos');
$dato[]=mysql_result($result01,0,'revision');
$dato[]=mysql_result($result01,0,'trabajo');
$dato[]=mysql_result($result01,0,'siniestro');
$t=1;
for ($j=0;$j<count($valores);$j++){;
?>


<?php 
if ($dato[$j]==1){;
?>
<div>
<?php 
$idpccat=$ipcat[$j];
$sql02="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result02=mysql_query ($sql02) or die ("Invalid result 1");
$imagen=mysql_result($result02,0,'imagen');
$pagina=mysql_result($result02,0,'pagina');
?>
<a href="../portada/<?php  echo $pagina;?>?fecha=<?php  echo $fechaactual;?>&idpccat=<?php  echo $idpccat;?>" rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $categoria;?> - Dia <?php  echo $fechaactual;?>">
<img src="img/<?php  echo $imagen;?>" class="cuadro" >
</a>
</div>
<?php };?>



<?php };?>

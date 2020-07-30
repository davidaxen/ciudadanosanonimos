<?php 
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');
 
 include('../estilo/acordeon.php');
 
$sql11r="select * from usuariosnombre where idempresas='".$ide."'";
$result11r=mysqli_query ($conn,$sql11r) or die ("Invalid result menucontabilidad");
$resultado11r=mysqli_fetch_array($result11r);
$nadr=$resultado11r['servicios'];
$nadr2=$resultado11r['ayuda'];
?>

<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nadr2);?>

</p></div>
<div class="contenido">


<?php 
$sql="select * from menuadministracion where user='".$gente."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);
$c1[]=$resultado['empresas'];
$c1[]=$resultado['clientes'];
$c1[]=$resultado['puestos'];
$c1[]=$resultado['empleados'];
$c1[]=$resultado['proveedor'];
$c1[]=$resultado['gestores'];
$c1[]=$resultado['vecinos'];
$c1[]=$resultado['empresa'];
$c1[]=$resultado['usuario'];
$c1[]=$resultado['visita'];


$sql="select * from administrar where idempresa='".$ide."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);
$c2[]=$resultado['empresas'];
$c2[]=$resultado['clientes'];
$c2[]=$resultado['puestos'];
$c2[]=$resultado['empleados'];
$c2[]=$resultado['proveedor'];
$c2[]=$resultado['gestores'];
$c2[]=$resultado['vecinos'];
$c2[]=$resultado['empresa'];
$c2[]=$resultado['usuario'];
$c2[]=$resultado['visita'];

for($t=0;$t<count($c1);$t++){;
if (($c1[$t]==1) and ($c2[$t]==1)){;
$c[$t]=1;
}else{;
$c[$t]=0;
};

};




$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc[]=$resultado31['empresas'];
$nc[]=$resultado31['clientes'];
$nc[]=$resultado31['puestos'];
$nc[]=$resultado31['empleados'];
$nc[]=$resultado31['proveedor'];
$nc[]=$resultado31['gestores'];
$nc[]=$resultado31['vecinos'];
$nc[]=$resultado31['empresa'];
$nc[]=$resultado31['usuario'];
$nc[]=$resultado31['visita'];



$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic[]=$resultado32['empresas'];
$ic[]=$resultado32['clientes'];
$ic[]=$resultado32['puestos'];
$ic[]=$resultado32['empleados'];
$ic[]=$resultado32['proveedor'];
$ic[]=$resultado32['gestores'];
$ic[]=$resultado32['vecinos'];
$ic[]=$resultado32['empresa'];
$ic[]=$resultado32['usuario'];
$ic[]=$resultado32['visita'];



$sql33="select * from menuadministracionayuda where idempresa='".$ide."'";
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menuadministracionayuda");
$resultado33=mysqli_fetch_array($result33);
$enc[]=$resultado33['empresas'];
$enc[]=$resultado33['clientes'];
$enc[]=$resultado33['puestos'];
$enc[]=$resultado33['empleados'];
$enc[]=$resultado33['proveedor'];
$enc[]=$resultado33['gestores'];
$enc[]=$resultado33['vecinos'];
$enc[]=$resultado33['empresa'];
$enc[]=$resultado33['usuario'];
$enc[]=$resultado33['visita'];


?>
<div class="accordion">
<img src="../img/iconos/ayuda.png" width="32px" style="vertical-align:middle;">   ADMINISTRACION
</div>
<div class="panel">
<div class="main">
<span class="caja3"><b style="padding:70px">&nbsp;</b></span>
<?php  for ($j=0;$j<count($c);$j++){;
if ($c[$j]=='1'){;
?><span class="caja">
<form action="<?php  echo $enc[$j];?>" method="post">
<input type="hidden" name="tipo" value="<?php echo $j?>">
<input type="hidden" name="estadoe" value="1">
<input type="hidden" name="datos" value="datos">
<button type="submit" style="border:0px;background-color:transparent;"><img src="../img/<?php  echo $ic[$j];?>" width="64px">
<br/><label style="font-size:10px">
<?php  echo strtoupper($nc[$j]);?></label>
</button></form></span>
<?php };?>


<?php };?>

</div>
</div>





<div class="accordion">
<img src="../img/iconos/ayuda.png" width="32px" style="vertical-align:middle;">   SERVICIOS
</div>
<div class="panel">

<?php 
include('../menu_n/menu_servicios.php');


$valorcqr=array_count_values($cqr);
$valorcp=array_count_values($cp);
$valorcc=array_count_values($cc);
$valorca=array_count_values($ca);
?>

<?php if (count($cqr)!=$valorcqr[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Frecuentes</b></span>
<?php  for ($j=0;$j<count($cqr)+1;$j++){;?>
<?php if ($cqr[$j]=='1'){;?><a href="<?php  echo $encqra[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icqr[$j];?>" width="64px"><br/><?php  echo $ncqr[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cp)!=$valorcp[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($cp[$j]=='1'){;?><a href="<?php  echo $encpa[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icp[$j];?>" width="64px"><br/><?php  echo $ncp[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>


<?php if (count($cc)!=$valorcc[0]){;?>
<div class="main">
<span class="caja2"><b>Comunicaciones</b></span>
<?php  for ($j=0;$j<count($cc)+1;$j++){;?>
<?php if ($ncc[$j]=='Mensaje'){;?><a href="<?php  echo $encca[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $icc[$j];?>" width="64px"><br/><?php  echo $ncc[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($ca)!=$valorca[0]){;?>
<div class="main">
<span class="caja2"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($ca)+1;$j++){;?>
<?php if ($nca[$j]=='Jornadas'){;?><a href="<?php  echo $encaa[$j];?>?dat=i"><span class="caja"><img src="../img/<?php  echo $ica[$j];?>" width="64px"><br/><?php  echo $nca[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

</div>



<div class="accordion">
<img src="../img/iconos/ayuda.png" width="32px" style="vertical-align:middle;">   INFORMES
</div>
<div class="panel">

<?php 

include('../menu_n/menu_informes.php');


$valorcqri=array_count_values($cqri);
$valorcpi=array_count_values($cpi);
$valorcci=array_count_values($cci);
$valorcai=array_count_values($cai);
?>

<?php if (count($cqri)!=$valorcqri[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Frecuentes</b></span>
<?php  for ($j=0;$j<count($cqri)+1;$j++){;?>
<?php if ($cqri[$j]=='1'){;?><a href="<?php  echo $encqrai[$j];?>?dat=i">
<span class="caja"><img src="../img/<?php  echo $icqri[$j];?>" width="64px"><br/>
<?php  echo $ncqri[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cpi)!=$valorcpi[0]){;?>
<div class="main">
<span class="caja2"><b>Tareas Programadas</b></span>
<?php  for ($j=0;$j<count($cpi)+1;$j++){;?>
<?php if ($cpi[$j]=='1'){;?><a href="<?php  echo $encpai[$j];?>?dat=i">
<span class="caja"><img src="../img/<?php  echo $icpi[$j];?>" width="64px"><br/>
<?php  echo $ncpi[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>


<?php if (count($cci)!=$valorcci[0]){;?>
<div class="main">
<span class="caja2"><b>Comunicaciones</b></span>
<?php  for ($j=0;$j<count($cci)+1;$j++){;?>
<?php if ($cci[$j]=='1'){;?><a href="<?php  echo $enccai[$j];?>?dat=i">
<span class="caja"><img src="../img/<?php  echo $icci[$j];?>" width="64px"><br/>
<?php  echo $ncci[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

<?php if (count($cai)!=$valorcai[0]){;?>
<div class="main">
<span class="caja2"><b>Avisos de Asistencia</b></span>
<?php  for ($j=0;$j<count($cai)+1;$j++){;?>
<?php if ($ncai[$j]=='Jornadas'){;?><a href="<?php  echo $encaai[$j];?>?dat=i">
<span class="caja"><img src="../img/<?php  echo $icai[$j];?>" width="64px"><br/>
<?php  echo $ncai[$j];?></span></a><?php };?>
<?php };?>
</div>
<?php };?>

</div>


<?php  include('../js/acordeonjs.php');?>
</div>

<?php } else {;
include ('../cierre.php');
 };?>
</body>
</html>
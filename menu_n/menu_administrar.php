<?php
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera2.php');
 
$sql11r="select * from usuariosnombre where idempresas='".$ide."'";
$result11r=$conn->query($sql11r);
$resultado11r=$result11r->fetch();

/*$result11r=mysqli_query ($conn,$sql11r) or die ("Invalid result menucontabilidad");
$resultado11r=mysqli_fetch_array($result11r);*/
$nadr=$resultado11r['administracion'];
?>
<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nadr);?></p></div>
<div class="contenido">

<?php 
$sql="select * from menuadministracion where user='".$gente."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);*/
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
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);*/
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
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
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
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
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



$sql33="select * from menuadministracionenlace where idempresa='".$ide."'";
$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
$resultado33=mysqli_fetch_array($result33);*/
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

<div class="main">
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
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
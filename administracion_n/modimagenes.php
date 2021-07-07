<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php'); 
?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<div class="contenido"  style="padding-left:10px">
<script>

function mod2(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("verf"+i)
if (i==num){
elem1.style.visibility="visible"
}else{
elem1.style.visibility="hidden"
}
}
}

</script>
<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<?php 
$sql33="select * from portadai where idempresa='".$idempresas."'";
$result33=$conn->query($sql33);
$soco33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
$soco33=mysqli_fetch_array($result33);*/
$ttg=0;
for ($tg=2;$tg<count($soco33);$tg++){;
if ($soco33[$tg]==1){;
	$ttg=$ttg+1;
	//echo $ttg;
	};
};
$ttg=6-$ttg;
?>



<form action="micuenta.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="idcm" value="20">
<input type="hidden" name="subtabla" value="imagenes">
<input type="hidden" name="idempresas" value="<?php  echo $idempresas;?>">
<?php 
$sql23="select * from empresas where idempresas='".$idempresas."' ";
$result23=$conn->query($sql23);
$soco=$result23->fetch();

/*$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$soco=mysqli_fetch_array($result23);
$row=mysqli_num_rows($result23);
$col=mysqli_field_count($result23);*/

/*mysqli_field_seek($result23, 2);
$usera=mysqli_fetch_field($result23)->name;*/

for ($j=14;$j<23;$j++){;
/*mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;*/
$nomb23=$result23->getColumnMeta($j,['name']);
?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echo$nomb23;?>">
<?php };?>


<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;"> Imagenes
</div>
<div class="panel" style="display:block;">

<table>
<tr><td>Logotipo</td>
<!--<td><a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipo2"></td>-->
<td><?php $i=14;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(1,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Logotipo pequeño</td>
<!--<td><a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipop2"></td>-->
<td><?php $i=15;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(2,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Firma</td>
<!--<td><a href="../img/pl_firma.psd">Plantilla</a></td><td><input type="file" name="firma2"></td>-->
<td><?php $i=16;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(3,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla A4</td>
<!--<td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="plaa42"></td>-->
<td><?php $i=17;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(4,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja1 QR</td>
<!--<td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="hoja12"></td>-->
<td><?php $i=44;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(5,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja2 QR</td>
<!--<td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="hoja22"></td>-->
<td><?php $i=45;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(6,1,10)" width="25px"><?php };?></td></tr>
<!--<tr><td>Plantilla Sobre</td><td><a href="../img/pl_sobre.psd">Plantilla</a></td><td><input type="file" name="plasob2"></td>
<td><?php $i=18;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(7,1,10)" width="25px"><?php };?></td></tr>-->
<tr><td>Plantilla carnet</td>
<!--<td><a href="../img/pl-carnet.psd">Plantilla</a></td><td><input type="file" name="placar2"></td>-->
<td><?php $i=19;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(8,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla movil</td>
<!--<td><a href="../img/pl_fondo_movil.psd">Plantilla</a></td><td><input type="file" name="plamov2"></td>-->
<td><?php $i=20;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(9,1,10)" width="25px"><?php };?></td></tr>
<!--<tr><td colspan="2">Icono</td><td><input type="file" name="ico2"></td>
<td><?php $i=23;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(10,1,10)" width="25px"><?php };?></td></tr>-->
<tr><td colspan="2">Color</td><td>

<?php $i=21;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colortt2=$rt2.$gt2.$bt2;
?>

<input type="text" value="#<?php  echo$colortt2;?>" class="izzyColor" id="colort2" name="datosn[<?php  echo$i;?>]"></td></tr>
<tr><td colspan="2">Color movil</td><td>


<?php $i=22;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colormt2=$rt2.$gt2.$bt2;
?>
<input type="text" value="#<?php  echo$colormt2;?>" class="izzyColor" id="colorm2" name="datosn[<?php  echo$i;?>]"></td></tr>
</table>




<div class="posf1" id="verf1" ><?php $i=14;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf2" ><?php $i=15;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf3" ><?php $i=16;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf4" ><?php $i=17;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf5" ><?php $i=44;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf6" ><?php $i=45;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf7" ><?php $i=18;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf8" ><?php $i=19;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf9" ><?php $i=20;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf10" ><?php $i=23;?><img src="../img/<?php  echo$soco[$i];?>" width="100" ></div>

</div>


<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Volver
</button>
</form>
<?php  include ('../js/acordeonjs.php');?>
</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

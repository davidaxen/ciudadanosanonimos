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

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<?php 
$sql33="select * from portadai where idempresa='".$idempresas."'";
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
$soco33=mysqli_fetch_array($result33);
$ttg=0;
for ($tg=2;$tg<count($soco33);$tg++){;
if ($soco33[$tg]==1){;
	$ttg=$ttg+1;
	//echo $ttg;
	};
};
$ttg=6-$ttg;
?>



<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="datos">
<input type="hidden" name="idcm" value="20">
<?php 
$sql23="select * from empresas where idempresas='".$idempresas."' ";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$soco=mysqli_fetch_array($result23);
$row=mysqli_num_rows($result23);
$col=mysqli_field_count($result23);

mysqli_field_seek($result23, 2);
$usera=mysqli_fetch_field($result23)->name;


$sql2s="select * from servicios where idempresa='".$idempresas."' ";
$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socos=mysqli_fetch_array($result2s);
$rows=mysqli_num_rows($result2s);
$cols=mysqli_field_count($result2s);

$sql2si="select * from menuserviciosimg where idempresa='".$idempresas."' ";
$result2si=mysqli_query ($conn,$sql2si) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosi=mysqli_fetch_array($result2si);
$rowsi=mysqli_num_rows($result2si);
$colsi=mysqli_field_count($result2si);

$sql2sn="select * from menuserviciosnombre where idempresa='".$idempresas."' ";
$result2sn=mysqli_query ($conn,$sql2sn) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosn=mysqli_fetch_array($result2sn);
$rowsn=mysqli_num_rows($result2sn);
$colsn=mysqli_field_count($result2sn);


$sql2p="select * from portadai where idempresa='".$idempresas."' ";
$result2p=mysqli_query ($conn,$sql2p) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socop=mysqli_fetch_array($result2p);
$rowp=mysqli_num_rows($result2p);
$colp=mysqli_field_count($result2p);


$sql2h="select * from hoja where idempresa='".$idempresas."' ";
$result2h=mysqli_query ($conn,$sql2h) or die ("Invalid result2h");
//$bbddh=mysqli_fetch_array($result2h);
$socoh=mysqli_fetch_array($result2h);
$rowh=mysqli_num_rows($result2h);
$colh=mysqli_field_count($result2h);


$sql2e="select * from etiquetas where idempresa='".$idempresas."' ";
$result2e=mysqli_query ($conn,$sql2e) or die ("Invalid result2e");
//$bbdde=mysqli_fetch_array($result2e);
$socoe=mysqli_fetch_array($result2e);
$rowe=mysqli_num_rows($result2e);
$cole=mysqli_field_count($result2e);



$sql25="select * from usuarios where idempresas='".$idempresas."' ";
$result25=mysqli_query ($conn,$sql25) or die ("Invalid result23");
$socou=mysqli_fetch_array($result25);
$rowu=mysqli_num_rows($result25);
$colu=mysqli_field_count($result25);


for ($j=0;$j<14;$j++){;
mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;
?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echo$nomb23;?>">
<?php };?>
<?php for ($j=38;$j<41;$j++){;
mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;
?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echo$nomb23;?>">
<?php };?>


<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;"> Datos Empresa
</div>
<div class="panel" style="display:block;">
<table>
<?php $i=0;?><input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><?php $i=1;?>
<b><?php  echo$soco[$i];?></b>
</td>
<td>N.I.F.</td><td><?php $i=2;?><b><?php  echo$soco[$i];?></b>
<input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><?php $i=3;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50">
</td>
<td>C.P.</td><td><?php $i=4;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="5">
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. fijo</td><td>Tel. movil</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><?php $i=8;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=9;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=10;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=38;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="30"></td>
<td><?php $i=40;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><?php $i=12;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50" ></td>
<td><?php $i=13;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50" ></td>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Pais</td>
<td>
<?php 
$sql="select * from pais order by nombrepais asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);
?>
<?php $i=11;?>
<select name="datosn[<?php  echo$i;?>]">
<?php $idpaisa=$soco[$i];?>
<?php 
for ($i;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idpais=$resultado['idpais'];
$nombrepais=$resultado['nombrepais'];
?>
<option value="<?php  echo$idpais;?>" <?php if ($idpais==$idpaisa){;?>selected<?php };?> ><?php  echo$nombrepais;?>
<?php };?>
</select>
</td></tr>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Nombre del Representante</td><td>
<?php $i=6;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="40" maxlength="40">
</td>
<td>N.I.F. repres.</td><td><?php $i=7;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>E-mail repres.</td><td><?php $i=39;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Entidad</td><td>Sucursal</td><td>DC</td><td>Numero de Cuenta</td></tr>

<?php $i=5;
$ent = strtok($soco[$i], '-');
$suc = strtok('-');
$dc = strtok('-');
$cc = strtok('-');
?>
<tr>
<td><input type="text" name="ent2" value="<?php  echo$ent;?>" maxlength="4" size=4></td>
<td><input type="text" name="suc2" value="<?php  echo$suc;?>" maxlength="4" size=4></td>
<td><input type="text" name="dc2" value="<?php  echo$dc;?>" maxlength="2" size=2></td>
<td><input type="text" name="cc2" value="<?php  echo$cc;?>" maxlength="10" size=10></td>
</tr>
</table>
</td></tr>



</table>


</div>

<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>



</form>
<?php  include ('../js/acordeonjs.php');?>
</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

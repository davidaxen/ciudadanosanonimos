<?php 
include('bbdd.php');
if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['empleados'];

 include('../portada_n/cabecera2.php');?>
<script>
function mod(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("ver"+i)
elem2=eval("menu"+i)	
if (i==num){
elem1.style.visibility="visible"
elem2.style.background="#DEE9F7"
elem2.style.color="#016EA3"
}else{
elem1.style.visibility="hidden"
elem2.style.background="#016EA3"
elem2.style.color="#DEE9F7"
}
}
}
</script>
<style>
a {text-decoration:none}
a hover: {text-decoration:none}
</style>		
		





<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE <?php  echo strtoupper($nc);?></p></div>
<!--<div class="contenido">-->






<?php 
$sql10="select lictra from empresas where idempresas='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result lic");
$resultado10=mysqli_fetch_array($result10);
$lictra=$resultado10['lictra'];
$sql10="select count(idempleado) as tot from empleados where idempresa='".$ide."' and estado='1'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empleados");
$resultado10=mysqli_fetch_array($result10);
$tota=$resultado10['tot'];

//echo $lictra;
//echo $tota;

if ($lictra>$tota){;?>
<form action="intro2.php" method="post" enctype="multipart/form-data">
<!--<form action="iempleados.php" method="post" enctype="multipart/form-data">-->
<input type="hidden" name="tabla" value="idempleados">

<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,5)"><div class="menup" id="menu1">Datos Personales</div></a></td>
<td><a href="#" onclick="mod(2,1,5)"><div class="menup" id="menu2">Localizacion</div></a></td>
<td><a href="#" onclick="mod(3,1,5)"><div class="menup" id="menu3">Servicios</div></a></td>
<td><a href="#" onclick="mod(4,1,5)"><div class="menup" id="menu4">Fotos</div></a></td>
<td><a href="#" onclick="mod(5,1,5)"><div class="menup" id="menu5">Enviar</div></a></td>
</tr>
</table>
</div>

<div class="pos71a" id="ver1" >
<table>

<tr><td>Nombre del <?php  echo strtoupper($nc);?></td><td>Primer Apellido</td><td>Segundo Apellido</td></tr>
<tr>
<td><input type="text" name="nombre"></td>
<td><input type="text" name="apellido1"></td>
<td><input type="text" name="apellido2"></td>
</tr>

<tr><td>Num del  <?php  echo strtoupper($nc);?> en Gestnube</td><td><input type="text" name="numempleadogest"></td></tr>

<tr><td>Pais de Nacimiento</td><td colspan="2">
<?php 
$sql="select * from pais order by nombrepais asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);
?><select name="pais">
<?php for ($i;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idpais=$resultado['idpais'];
$nombrepais=$resultado['nombrepais'];
?>
<option value="<?php  echo $idpais;?>" <?php if ($idpais==724){;?>selected<?php };?> ><?php  echo $nombrepais;?>
<?php };?>
</select></td></tr>
<tr><td>Sexo</td><td colspan="2">
<select name="sexo">
<option value="1" selected>Hombre
<option value="2">Mujer
</select></td></tr>
<tr><td>Fecha de Nacimiento</td><td colspan="2">
<input type="text" name="dia4" maxlength="2" size=2> - <input type="text" name="mes4" maxlength="2" size=2> - <input type="text" name="ano4" maxlength="4" size=4></td></tr>
<tr><td>Tipo de Documento</td><td colspan="2">Documento</td></tr>
<td><select name="tnif">
<option value="1" selected>DNI
<option value="2">Pasaporte
<option value="6">NIE
</select></td>
<td><input type="text" name="nif" maxlength="9"></td>
</tr>
</table>
</div>

<div class="pos71b" id="ver2" >
<table>
<tr><td>Dirección</td><td colspan="2"><input type="text" name="direccion" size="100"></td></tr>
<tr><td>Localidad</td><td colspan="2"><input type="text" name="localidad" size="100"></td></tr>
<tr><td>Provincia</td><td colspan="2"><input type="text" name="provincia" size="100"></td></tr>
<tr><td>Código Postal</td><td colspan="2"><input type="text" name="cp" maxlength="5"></td></tr>
<tr><td>Telefonos</td><td><input type="text" name="tele1" maxlength="12"></td><td><input type="text" name="tele2" maxlength="12"></td></tr>
<tr><td>E-mail</td><td colspan="2"><input type="text" name="email1" size="100"></td></tr>
</table>
</div>



<div class="pos71c" id="ver3" >
<?php 
$sql10="select * from empresas where idempresas='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result clientes");
?>
<div id="divicolumna2">
<table>
<tr><td>Servicios</td><td>Inactivo / Activo</td></tr>

<?php 
$sql2s="select * from servicios where idempresa='".$ide."' ";
$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
$socos=mysqli_fetch_array($result2s);
$rows=mysqli_num_rows($result2s);
$cols=mysqli_num_fields($result2s);

$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
?>

<?php 
for ($t=1;$t<count($dat);$t++){;

$i=$t+2;
$y=$t+2;
$j=$t-1;

//mysqli_data_seek($result32,$j);



if($socos[$i]==1){;
$serimg=$resultado32[$dat[$j]];
$sernom=$resultado31[$dat[$j]];
?>
<tr><td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>


<?php  if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')) {;?>
<input type="hidden" name="<?php  echo $dat[$j];?>" value="1"> 
<?php };?>
<td><input type="radio" name="<?php  echo $dat[$j];?>" value="0" 
<?php  if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')){;?>
disabled="disabled"
<?php  }; ?>
>
/
<input type="radio" name="<?php  echo $dat[$j];?>" value="1" 
<?php  if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')){;?>
checked="checked" disabled="disabled"
<?php  }; ?>
></td>
</tr>
<?php };?>

<?php };?>


</table>
</div>

</div>


<div class="pos71d" id="ver4" >
<table>
<tr><td>Foto</td><td><input type="file" name="foto" accept="image/gif,image/png,image/jpg" ></td></tr>
</table>
</div>


<div class="pos71e" id="ver5" >
<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</div>





</form>
<?php }else{;?>
<div class="contenido">
<p>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">Póngase en contacto con su comercial</td></tr>
</table>
<?php };?>
<!--</div>-->
</div>
<?php }else{;
include ('../cierre.php');
 };?>

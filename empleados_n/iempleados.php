<?php 
include('bbdd.php');
if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
	$result31=$conn->query($sql31);
	$resultado31=$result31->fetch();
	$nc=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
	$result32=$conn->query($sql32);
	$resultado32=$result32->fetch();
	$ic=$resultado32['empleados'];

 include('../portada_n/cabecera2.php');

include('../estilo/acordeon.php'); 
 ?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido" style="padding-left:10px">


<?php 
$sql10="select lictra from empresas where idempresas='".$ide."'"; 
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result lic");
//$resultado10=mysqli_fetch_array($result10);
	$result10=$conn->query($sql10);
	$resultado10=$result10->fetch();
	$lictra=$resultado10['lictra'];

$sql10="select count(idempleado) as tot from empleados where idempresa='".$ide."' and estado='1'"; 
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empleados");
//$resultado10=mysqli_fetch_array($result10);
	$result10=$conn->query($sql10);
	$resultado10=$result10->fetch();
	$tota=$resultado10['tot'];


$sql11="select * from proveedores where idempresas='".$ide."'";
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result lic");
//$row11=mysqli_num_rows($result11);
	$result11=$conn->query($sql11);
	$result11mos=$conn->query($sql11);
	$num_rows=$result11->fetchAll();
	$row11=count($num_rows);

//echo $lictra;
//echo $tota;

if ($lictra>$tota){;?>
<form action="intro2.php" method="post" enctype="multipart/form-data">
<!--<form action="iempleados.php" method="post" enctype="multipart/form-data">-->
<input type="hidden" name="tabla" value="idempleados">


<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Personales
</div>
<div class="panel">
<table>

<tr><td>Nombre del <?php  echo strtoupper($nc);?></td><td>Primer Apellido</td><td>Segundo Apellido</td></tr>
<tr>
<td><input type="text" name="nombre"></td>
<td><input type="text" name="apellido1"></td>
<td><input type="text" name="apellido2"></td>
</tr>

<!--<tr><td>Num del  <?php  echo strtoupper($nc);?> en Gestnube</td><td><input type="text" name="numempleadogest"></td></tr>-->

<tr><td>Pais de Nacimiento</td><td colspan="2">
<?php 
$sql="select * from pais order by nombrepais asc"; 
//$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
//$row=mysqli_num_rows($result);
	$result=$conn->query($sql);
	$resultmos=$conn->query($sql);
	$num_rows=$result->fetchAll();
	$row=count($num_rows);
?><select name="pais">
<?php 

foreach ($resultmos as $row1) {

$idpais=$row1['idpais'];
$nombrepais=$row1['nombrepais'];
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
//$idpais=$resultado['idpais'];
//$nombrepais=$resultado['nombrepais'];
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
<tr><td><select name="tnif">
<option value="1" selected>DNI
<option value="2">Pasaporte
<option value="6">NIE
</select></td>
<td><input type="text" name="nif" maxlength="9"></td>
</tr>
<?php if($row11>0){;?>
<tr><td>Proveedores:</td><td>
<select name="proveedor">
<option value=""></option>
<?php

foreach ($result11mos as $row2) {

$idproveedor=$row2['idproveedor'];
$nombreprov=$row2['nombre'];
//for ($i=0;$i<$row11;$i++){;
//mysqli_data_seek($result11,$i);
//$resultado11=mysqli_fetch_array($result11);
//$idproveedor=$resultado11['idproveedor'];
//$nombreprov=$resultado11['nombre'];
?>
<option value="<?php  echo $idproveedor;?>"><?php  echo $nombreprov;?>
<?php };?>
</select>
</td>
</tr>
<?php };?>


</table>
</div>

<div class="accordion">
<img src="../img/iconos/localizacion.png" width="32px" style="vertical-align:middle;">  Localizacion
</div>
<div class="panel">
<table>
<tr><td>Direcci&oacute;n</td><td colspan="2"><input type="text" name="direccion" size="100"></td></tr>
<tr><td>Localidad</td><td colspan="2"><input type="text" name="localidad" size="100"></td></tr>
<tr><td>Provincia</td><td colspan="2"><input type="text" name="provincia" size="100"></td></tr>
<tr><td>C&oacute;digo Postal</td><td colspan="2"><input type="text" name="cp" maxlength="5"></td></tr>
<tr><td>Telefonos</td><td><input type="text" name="tele1" maxlength="12"></td><td><input type="text" name="tele2" maxlength="12"></td></tr>
<tr><td>E-mail</td><td colspan="2"><input type="text" name="email1" size="100"></td></tr>
</table>
</div>



<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Servicios
</div>
<div class="panel">

<?php

$sqlpr="select * from proyectos where idproyectos='".$idpr."'";

	$resultpr=$conn->query($sqlpr);
	$resultadopr=$resultpr->fetch();
//$resultpr=mysqli_query ($conn,$sqlpr) or die ("Invalid result clientes");
//$resultadopr=mysqli_fetch_array($resultpr);
$grupoprecio=$resultadopr['tipoprecios'];

if ($grupoprecio=='2'){;

echo "Precios por grupo<br/>";

echo "<table>";

$sqlprg="select * from proyectosgrupos where idproyectos='".$idpr."'";

	$resultprg=$conn->query($sqlprg);
	$resultprgmos=$conn->query($sqlprg);
	$num_rows=$result->fetchAll();
	$rowsprg=count($num_rows);
//$resultprg=mysqli_query ($conn,$sqlprg) or die ("Invalid result clientes");
//$rowsprg=mysqli_num_rows($resultprg);

echo "<tr>";

foreach ($resultprgmos as $row3) {
	
	$tipoprg=$row3['tipo'];
	$imgprg=$row3['img'];
//for($yh=0;$yh<$rowsprg;$yh++){;
//mysqli_data_seek($resultprg,$yh);
//$resultadoprg=mysqli_fetch_array($resultprg);
//$tipoprg=$resultadoprg['tipo'];
//$imgprg=$resultadoprg['img'];
$hy=$yh+1;
echo "<td class='tit'><img src='../img/".$imgprg."' width='50px'><br/>".strtoupper($tipoprg);
echo "<br/><center><input type='radio' name='grupo' value='$hy' onclick='mod($hy,1,$rowsprg)'";
if ($yh==1){;
echo "checked='checked'";
};
echo "></center>";
echo "</td>";

};
echo "</tr></table>";

$resultadoprg=$resultprg->fetch();

for($yh=0;$yh<$rowsprg;$yh++){
//mysqli_data_seek($resultprg,$yh);
//$resultadoprg=mysqli_fetch_array($resultprg);
$hy=$yh+1;
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento','teletrabajo');


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
	$result31=$conn->query($sql31);
	$resultado31=$result31->fetch();
//$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
	$result32=$conn->query($sql32);
	$resultado32=$result32->fetch();
//$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);

echo "<div id='inicioy$hy' ";
if ($yh==1){;
echo "style='visibility:visible;'";
}else{;
echo "style='visibility:hidden;'";
};
echo ">";
echo "<table>";
for ($t=0;$t<count($dat);$t++){;

$serimg=$resultado32[$dat[$t]];
$sernom=$resultado31[$dat[$t]];
$serprg=$resultadoprg[$dat[$t]];

if ($serprg==1){;
echo "<tr><td class='tit'><img src='../img/".$serimg."' width='25px'> ".$sernom."</td>";
echo "<td><input type='radio' name='".$dat[$t]."[".$yh."]' value='1' checked='checked' readonly='readonly'></td></tr>";
 }; 

 };
echo "</table></div>";

};



}else{;


$sql10="select * from empresas where idempresas='".$ide."'"; 
	$result10=$conn->query($sql10);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result clientes");

echo "<div id='divicolumna2'><table><tr><td>Servicios</td><td>Inactivo / Activo</td></tr>";

$sql2s="select * from servicios where idempresa='".$ide."' ";
//echo $sql2s;

	$result2s=$conn->query($sql2s);
	$socos=$result2s->fetch();
	$num_rows=$result2s->fetchAll();
	$rows=count($num_rows);
//$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
//$socos=mysqli_fetch_array($result2s);
//print_r($socos);
//$rows=mysqli_num_rows($result2s);
//$cols=mysqli_num_fields($result2s);

$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento','teletrabajo');


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
	$result31=$conn->query($sql31);
	$resultado31=$result31->fetch();
//$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
	$result32=$conn->query($sql32);
	$resultado32=$result32->fetch();
//$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);

 
for ($t=0;$t<count($dat);$t++){;

$i=$t+3;
$y=$t+2;
$j=$t;
//echo $dat[$t].'-'.$t.'-'.$socos[$i].'-'.$i.'<br/>';
//mysqli_data_seek($result32,$j);

if($socos[$i]==1){;
$serimg=$resultado32[$dat[$j]];
$sernom=$resultado31[$dat[$j]];

echo "<table>";
echo "<tr><td class='tit'><img src='../img/".$serimg."' width='25px'> ".$sernom."</td>";

if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')) {;
echo "<input type='hidden' name='".$dat[$j]."' value='1'>"; 
};

echo "<td><input type='radio' name='".$dat[$j]."' value='0'"; 

if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')){;
echo "disabled='disabled'";
};
echo ">/<input type='radio' name='".$dat[$j]."' value='1'"; 

if (($dat[$j]=='entrada') or ($dat[$j]=='incidencia')){;
echo "checked='checked' disabled='disabled'";
 };
echo "></td></tr>";
 };

 };

echo "</table></div>";

};


?>


</div>

<script>

function mod(num,numi,numf){


for (i=numi;i<numf+1;i++){

elem1=eval("inicioy"+i)

if (i==num){

elem1.style.visibility="visible"
elem1.style.display="initial"
}else{

elem1.style.visibility="hidden"
elem1.style.display="none"
}

}

}

</script>


<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;"> Fotos
</div>
<div class="panel">
<table>
<tr><td>Foto</td><td><input type="file" name="foto" accept="image/gif,image/png,image/jpg" ></td></tr>
</table>
</div>


<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;"> Enviar
</button>




</form>

<?php  include('../js/acordeonjs.php');?>



</div>


<?php }else{;?>
<p>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">P&oacute;ngase en contacto con su comercial</td></tr>
</table>
<?php };?>


</div>
<?php }else{;
include ('../cierre.php');
 };?>

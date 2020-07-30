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

 include('../portada_n/cabecera2.php');
 ?>
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
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<!--<div class="contenido">-->



<?php 
$sql="select * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."' order by idempleado desc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result clientes");
$resultado=mysqli_fetch_array($result);
$idc=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
$nif=$resultado['nif'];
$cp=$resultado['cp'];
$domicilio=$resultado['domicilio'];
$provincia=$resultado['provincia'];
$localidad=$resultado['localidad'];
$foto=$resultado['foto'];
$tele1=$resultado['tele1'];
$tele2=$resultado['tele2'];
$email=$resultado['email1'];
$diaa=$resultado['dia'];
$mesa=$resultado['mes'];
$anoa=$resultado['ano'];
$idpais=$resultado['nacionalidad'];
$sexo=$resultado['sexo'];
$tnif=$resultado['tnif'];
$estadoemp=$resultado['estado'];
?>
<form action="intro2.php" method="post" enctype="multipart/form-data">
<!--<form action="iempleados.php" method="post" enctype="multipart/form-data">-->
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="datos" value="modempleados">
<input type="hidden" name="nombre" value="<?php  echo $nombre;?>">
<input type="hidden" name="apellido1" value="<?php  echo $apellido1;?>">
<input type="hidden" name="apellido2" value="<?php  echo $apellido2;?>">
<input type="hidden" name="nif" value="<?php  echo $nif;?>">
<input type="hidden" name="cp" value="<?php  echo $cp;?>">
<input type="hidden" name="domicilio" value="<?php  echo $domicilio;?>">
<input type="hidden" name="localidad" value="<?php  echo $localidad;?>">
<input type="hidden" name="provincia" value="<?php  echo $provincia;?>">
<input type="hidden" name="tele1" value="<?php  echo $tele1;?>">
<input type="hidden" name="tele2" value="<?php  echo $tele2;?>">
<input type="hidden" name="email1" value="<?php  echo $email;?>">
<input type="hidden" name="foto" value="<?php  echo $foto;?>">
<input type="hidden" name="diaa" value="<?php  echo $diaa;?>">
<input type="hidden" name="mesa" value="<?php  echo $mesa;?>">
<input type="hidden" name="anoa" value="<?php  echo $anoa;?>">
<input type="hidden" name="idpais" value="<?php  echo $idpais;?>">
<input type="hidden" name="sexo" value="<?php  echo $sexo;?>">
<input type="hidden" name="tnif" value="<?php  echo $tnif;?>">
<input type="hidden" name="estadoe" value="<?php  echo $estadoemp;?>">
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



<div class="pos71" id="ver1" >
<table>
<tr><td>Num del <?php  echo strtoupper($nc);?></td><td>
<input type="hidden" name="idc" value="<?php  echo $idc;?>"><?php  echo $idc;?>
</td></tr>
<tr><td>Nombre del <?php  echo strtoupper($nc);?></td><td>Primer Apellido</td><td>Segundo Apellido</td></tr>
<tr>
<td><input type="text" name="nombre1" value="<?php  echo $nombre;?>"></td>
<td><input type="text" name="apellido11" value="<?php  echo $apellido1;?>"></td>
<td><input type="text" name="apellido21" value="<?php  echo $apellido2;?>"></td>
</tr>
<tr><td>Pais de Nacimiento</td><td colspan="2">
<?php 
$sql4="select * from pais order by nombrepais asc"; 
$result4=mysqli_query ($conn,$sql4) or die ("Invalid result empleados");
$row4=mysqli_num_rows($result4);
?>
<select name="idpais1">
<?php 
for ($i=0;$i<$row4;$i++){;
mysqli_data_seek($result4,$i);
$resultado4=mysqli_fetch_array($result4);
$idpais1=$resultado4['idpais'];
$nombrepais=$resultado4['nombrepais'];
?>
<option value="<?php  echo $idpais1;?>" <?php if ($idpais==$idpais1){;?>selected<?php };?> ><?php  echo $nombrepais;?>
<?php };?>
</select></td></tr>
<tr><td>Sexo</td><td colspan="2">
<select name="sexo1">
<option value="1" <?php if ($sexo=="1"){;?>selected<?php };?> >Hombre
<option value="2" <?php if ($sexo=="2"){;?>selected<?php };?> >Mujer
</select></td></tr>
<tr><td>Fecha de Nacimiento</td><td colspan="2">
<input type="text" name="diaa1" maxlength="2" value="<?php  echo $diaa;?>" size=2> - 
<input type="text" name="mesa1" maxlength="2" value="<?php  echo $mesa;?>" size=2> - 
<input type="text" name="anoa1" maxlength="4" value="<?php  echo $anoa;?>" size=4></td></tr>
<tr><td>Tipo de Documento</td><td colspan="2">Documento</td></tr>
<td><select name="tnif1">
<option value="1" <?php if ($tnif=="1"){;?>selected<?php };?> >DNI
<option value="2" <?php if ($tnif=="2"){;?>selected<?php };?> >Pasaporte
<option value="6" <?php if ($tnif=="6"){;?>selected<?php };?> >NIE
</select></td>
<td><input type="text" name="nif1" maxlength="9" value="<?php  echo $nif;?>" ></td>
</tr>
</table>
</div>


<div class="pos71" id="ver2" >
<table>
<tr><td>Dirección</td><td colspan="2"><input type="text" name="domicilio1" value="<?php  echo $domicilio;?>" size="100"></td></tr>
<tr><td>Localidad</td><td colspan="2"><input type="text" name="localidad1" value="<?php  echo $localidad;?>" size="100"></td></tr>
<tr><td>Provincia</td><td colspan="2"><input type="text" name="provincia1" value="<?php  echo $provincia;?>" size="100"></td></tr>
<tr><td>Código Postal</td><td colspan="2"><input type="text" name="cp1" value="<?php  echo $cp;?>" maxlength="5"></td></tr>
<tr><td>Telefonos</td><td><input type="text" name="tele1n" maxlength="12" value="<?php  echo $tele1;?>" ></td>
<td><input type="text" name="tele2n" maxlength="12" value="<?php  echo $tele2;?>" ></td></tr>
<tr><td>E-mail</td><td colspan="2"><input type="text" name="email1n" size="100" value="<?php  echo $email1;?>" ></td></tr>
</table>
</div>



<div class="pos71" id="ver3" >
<?php 
//$sql10="select * from empresas where idempresas='".$ide."'"; 
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result clientes");
?>
<div id="divicolumna2">
<table>
<tr><td>Servicios</td><td>Inactivo / Activo</td></tr>

<?php 
$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result clientes");
$resultado10=mysqli_fetch_array($result10);

$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);

for ($rt=0;$rt<count($dat);$rt++){;
$valoref=$resultado10[$dat[$rt]];
$serimg=$resultado32[$dat[$rt]];
$sernom=$resultado31[$dat[$rt]];

if ($valoref=='1'){;
?>
<tr><td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>

<td>
<?php $valortg=$resultado[$dat[$rt]];?>
<input type="hidden" name="<?php  echo $dat[$rt];?>" value="<?php  echo $valortg;?>">
<?php if (($dat[$rt]=='entrada') or ($dat[$rt]=='incidencia')){;?><input type="hidden" name="<?php  echo $dat[$rt];?>1" value="<?php  echo $valortg;?>"><?php };?>

<input type="radio" name="<?php  echo $dat[$rt];?>1" value="0" <?php if ($valortg==0){;?>checked="checked"<?php };?>  
<?php if (($dat[$rt]=='entrada') or ($dat[$rt]=='incidencia')){;?>disabled<?php };?>
> /
<input type="radio" name="<?php  echo $dat[$rt];?>1" value="1" <?php if ($valortg==1){;?>checked="checked"<?php };?>  
<?php if (($dat[$rt]=='entrada') or ($dat[$rt]=='incidencia')){;?>disabled<?php };?>
>

</td>
</tr>
<?php 
};

};
?>



</table>
</div>
</div>

<div class="pos71" id="ver4" >
<table>
<tr><td>Foto</td><td><input type="file" name="foto" accept="image/gif,image/png,image/jpg" ></td></tr>
</table>
</div>

<div class="pos71" id="ver5" >
<table>
<tr><td>Estado</td>
<td><select name="estadoemp1">
<option value="1" <?php if ($estadoemp=="1"){;?>selected<?php };?> >Alta
<option value="0" <?php if ($estadoemp=="0"){;?>selected<?php };?> >Baja
</select></td>
</tr>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</div>





</form>

<!--</div>-->
</div>
<?php }else{;
include ('../cierre.php');
 };?>
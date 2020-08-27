<?php  
include('bbdd.php');
 include('../portada_n/cabecera2.php');
 
if ($nif!=null){;

$sql="select * from usuariost where idempresa='".$ide."' and nif='".$nif."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();

$estado=$resultado[0]['estado'];
$nombre=$resultado[0]['nombre'];
$portada=$resultado[0]['portada'];
$administracion=$resultado[0]['administracion'];
$servicios=$resultado[0]['servicios'];
$documentacion=$resultado[0]['documentacion'];
$informes=$resultado[0]['informes'];

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result usuarios");
$estado=mysqli_result($result,0,'estado');
$nombre=mysqli_result($result,0,'nombre');
$portada=mysqli_result($result,0,'portada');
$administracion=mysqli_result($result,0,'administracion');
$servicios=mysqli_result($result,0,'servicios');
$documentacion=mysqli_result($result,0,'documentacion');
$informes=mysqli_result($result,0,'informes');*/
?>

<form action="intro2.php" method="post" name="form2">
<table>
<input type="hidden" name="tablas" value="modificaru">
<input type="hidden" name="nombre" value="<?php  echo$nombre;?>">
<input type="hidden" name="nif" value="<?php  echo$nif;?>">
<input type="hidden" name="estado" value="<?php  echo$estado;?>">
<input type="hidden" name="portada" value="<?php  echo$portada;?>">
<input type="hidden" name="administracion" value="<?php  echo$administracion;?>">
<input type="hidden" name="servicios" value="<?php  echo$servicios;?>">
<input type="hidden" name="documentacion" value="<?php  echo$documentacion;?>">
<input type="hidden" name="informes" value="<?php  echo$informes;?>">

<tr><td>Nombre del Usuario</td><td><input type="text" name="nombren" value="<?php  echo$nombre;?>"></td></tr>
<tr><td>NIF</td><td><?php  echo$nif;?></td></tr>
<tr><td>Estado<td>
<select name="estadon" >
<option value="0" <?php if($estado==0){?>selected <?php };?> >Baja
<option value="1" <?php if($estado==1){?>selected <?php };?> >Alta
</select>
</td></tr>

<tr><td>Servicios</td><td>Inactivo / Activo</td></tr>
<tr><td>Portada</td><td>
<input type="radio" name="portadan" value="0" <?php if ($portada=='0'){;?>checked="checked"<?php };?> >
/
<input type="radio" name="portadan" value="1" <?php if ($portada=='1'){;?>checked="checked"<?php };?> ></td></tr>

<tr><td>Administracion</td><td>
<input type="radio" name="administracionn" value="0" <?php if ($administracion=='0'){;?>checked="checked"<?php };?> >
/
<input type="radio" name="administracionn" value="1" <?php if ($administracion=='1'){;?>checked="checked"<?php };?> ></td></tr>


<tr><td>Servicios</td><td>
<input type="radio" name="serviciosn" value="0" <?php if ($servicios=='0'){;?>checked="checked"<?php };?> >
/
<input type="radio" name="serviciosn" value="1" <?php if ($servicios=='1'){;?>checked="checked"<?php };?> ></td></tr>


<tr><td>Documentacion</td><td>
<input type="radio" name="documentacionn" value="0" <?php if ($documentacion=='0'){;?>checked="checked"<?php };?> >
/
<input type="radio" name="documentacionn" value="1" <?php if ($documentacion=='1'){;?>checked="checked"<?php };?> ></td></tr>

<tr><td>Informes</td><td>
<input type="radio" name="informesn" value="0" <?php if ($informes=='0'){;?>checked="checked"<?php };?> >
/
<input type="radio" name="informesn" value="1" <?php if ($informes=='1'){;?>checked="checked"<?php };?> ></td></tr>



<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;

include ('../cierre.php');

 };
 ?>



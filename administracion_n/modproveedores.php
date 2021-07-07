<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['proveedor'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['proveedor'];


include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 

$sql="SELECT * from proveedores where idempresas='".$ide."' and idproveedor='".$idproveedor."'"; 
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
?>

<form action="intro2.php" method="get" name="form2">

<table>
<tr>
<td class="tit">C&oacute;digo de Puesto de Trabajo</td>
<td>
<input type="hidden" name="tablas" value="modificarproveedor">
<input type="hidden" name="idproveedor" value="<?php  echo $idproveedor;?>">
<?php  echo $idproveedor;?></td>
</tr>
<tr>
<td class="tit">Nombre del Proveedor</td>
<td colspan="4"><?php $nombre=$resultado['nombre'];?>
<input type="hidden" name="nombre" value="<?php  echo $nombre;?>">
<input type="text" name="nombre1" value="<?php  echo $nombre;?>" size=50></td>
</tr>
<tr>
<td class="tit">N.I.F</td>
<td colspan="4"><?php $nif=$resultado['nif'];?>
<input type="hidden" name="nif" value="<?php  echo $nif;?>"><input type="text" name="nif1" value="<?php  echo $nif;?>">
</td>
</tr>

<tr>
<td class="tit">C&oacute;digo Postal</td>
<td colspan="4"><?php $cp=$resultado['cp'];?>
<input type="hidden" name="cp" value="<?php  echo $cp;?>">
<input type="text" name="cp1" value="<?php  echo $cp;?>" maxlength="5"></td>
</tr>
<tr>
<td class="tit">Domicilio</td>
<td colspan="4"><?php $domicilio=$resultado['domicilio'];?>
<input type="hidden" name="domicilio" value="<?php  echo $domicilio;?>">
<input type="text" name="domicilio1" value="<?php  echo $domicilio;?>" size="50"></td>
</tr>
</tr>
<tr>
<td class="tit">Provincia</td>
<td colspan="4"><?php $provincia=$resultado['provincia'];?>
<input type="hidden" name="provincia" value="<?php  echo $provincia;?>">
<input type="text" name="provincia1" value="<?php  echo $provincia;?>"></td>
</tr>
<tr>
<td class="tit">Localidad</td>
<td colspan="4"><?php $localidad=$resultado['localidad'];?>
<input type="hidden" name="localidad" value="<?php  echo $localidad;?>">
<input type="text" name="localidad1" value="<?php  echo $localidad;?>"></td>
</tr>
<tr>
<td class="tit">Telefono</td>
<td colspan="4"><?php $telefonop=$resultado['telefono'];?>
<input type="hidden" name="telefonop" value="<?php  echo $telefonop;?>">
<input type="text" name="telefonop1" value="<?php  echo $telefonop;?>"></td>
</tr>
<tr>
<td class="tit">E-mail</td>
<td colspan="4"><?php $emailp=$resultado['email'];?>
<input type="hidden" name="emailp" value="<?php  echo $emailp;?>">
<input type="text" name="emailp1" value="<?php  echo $emailp;?>"></td>
</tr>
<tr>
<td class="tit">Estado</td>
<?php $estado=$resultado['estado'];?>
<td colspan="4">
<input type="hidden" name="estadopro" value="<?php  echo $estado;?>">
<select name="estadopro1">
<option value="0" <?php if ($estado=='0'){;?>selected<?php };?> >Baja
<option value="1" <?php if ($estado=='1'){;?>selected<?php };?>   >Alta
</td>
</tr>
</table>


<!--</div>-->



<table>
<tr>
<td>
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
</body>
</html>
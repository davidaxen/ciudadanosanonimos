<?php  
include('bbdd.php');

include('../portada_n/cabecera2.php');

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['proveedor'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['proveedor'];

?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
if ($idc==null){;?>

<form action="iproveedor.php" method="post" name="form2">
<table>
<input type="hidden" name="idc" value="3">
<tr><td class="tit">Nombre del Proveedor</td><td><input type="text" name="proveedor" size="80"></td></tr>
<tr><td class="tit">NIF</td><td><input type="text" name="nifp" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Direcci&oacuten</td><td><input type="text" name="direccionp" size="80"></td></tr>
<tr><td class="tit">C&oacutedigo Postal</td><td><input type="text" name="cpp" maxlength="5"  size="6"></td></tr>
<tr><td class="tit">Localidad</td><td><input type="text" name="localidadp" size="80"></td></tr>
<tr><td class="tit">Provincia</td><td><input type="text" name="provinciap" size="80"></td></tr>
<tr><td class="tit">Telefono</td><td><input type="text" name="telefonop" size="80"></td></tr>
<tr><td class="tit">E-mail</td><td><input type="text" name="emailp" size="80"></td></tr>
</table>

<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<?php } else {;?>
<?php 

$sql="select idproveedor from proveedores where idempresas='".$ide."' order by idproveedor desc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result proveedor");
$row=mysqli_num_rows($result);
?>
<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="idproveedor">


<?php 
if ($row==0){;
$idp=10;
}else{;
$resultado=mysqli_fetch_array($result);
$idp=$resultado['idproveedor'];
$idp=$idp+1;
};
?>
<tr><td class="tit">C&oacutedigo del Proveedor</td><td><input type="hidden" name="idp" value="<?php  echo $idp;?>"></td></tr>
<tr><td class="tit">Nombre del Puesto de Trabajo</td><td><input type="hidden" name="proveedor" value="<?php  echo $proveedor;?>"><?php  echo $proveedor;?></td></tr>
<tr><td class="tit">NIF</td><td><input type="hidden" name="nifp" value="<?php  echo $nifp;?>"><?php  echo $nifp;?></td></tr>
<tr><td class="tit">Direcci&oacuten</td><td><input type="hidden" name="direccionp" value="<?php  echo $direccionp;?>"><?php  echo $direccionp;?></td></tr>
<tr><td class="tit">C&oacutedigo Postal</td><td><input type="hidden" name="cpp" value="<?php  echo $cpp;?>"><?php  echo $cpp;?></td></tr>
<tr><td class="tit">Localidad</td><td><input type="hidden" name="localidadp" value="<?php  echo $localidadp;?>"><?php  echo $localidadp;?></td></tr>
<tr><td class="tit">Provincia</td><td><input type="hidden" name="provinciap" value="<?php  echo $provinciap;?>"><?php  echo $provinciap;?></td></tr>
<tr><td class="tit">Telefono</td><td><input type="hidden" name="telefonop" value="<?php  echo $telefonop;?>"><?php  echo $telefonop;?></td></tr>
<tr><td class="tit">Email</td><td><input type="hidden" name="emailp" value="<?php  echo $emailp;?>"><?php  echo $emailp;?></td></tr>
</table>

<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php };?>

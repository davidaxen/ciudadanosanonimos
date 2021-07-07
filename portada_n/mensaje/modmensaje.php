<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');

$sql="SELECT * from mensajes where id='".$id."'";
//echo $sql;
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$resultado=mysqli_fetch_array($result);*/
$idmensaje=$resultado['id'];
$fechafin=$resultado['fechafin'];
$texto=$resultado['texto'];
$provincia=$resultado['provicia'];
$localidad=$resultado['localidad'];
$cp=$resultado['cp'];
$pais=$resultado['pais'];
?>


<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<form action="intro2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tabla" value="modificar">
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="pais1" value="<?php echo $pais;?>">
<input type="hidden" name="texto1" value="<?php echo $texto;?>">
<input type="hidden" name="fechafin1" value="<?php echo $fechafin;?>">
<input type="hidden" name="provincia1" value="<?php echo $provincia;?>">
<input type="hidden" name="localidad1" value="<?php echo $localidad;?>">
<input type="hidden" name="cp1" value="<?php echo $cp;?>">
<table>
<tr><td>Pais</td><td>


<?php 
$sql="SELECT * from paises "; 
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<select name="idpais">
<option value="todos">Todos</option>
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idpais=$rowmos['idpais'];
$nombrepais=$rowmos['nombrepais'];
?>
<option value="<?php  echo $idpais;?>"
<?php 
if ($idpais==$pais){;
echo "selected";
};
?>
><?php  echo $nombrepais;?></option>
<?php };?>
</select></td></tr>

<tr><td>Localidad</td><td><input type="text" name="localidad" value="<?php echo $localidad;?>"></td></tr>
<tr><td>Provincia</td><td><input type="text" name="provincia" value="<?php echo $provincia;?>"></td></tr>
<tr><td>Código Postal</td><td><input type="text" name="cp" value="<?php echo $cp;?>"></td></tr>
<tr><td>Fecha de Finalización</td><td><input type="text" name="fechafin" value="<?php echo $fechafin;?>"></td></tr>
<tr><td colspan="2">Pregunta</td></tr>
<tr><td colspan="2"><textarea cols="50" rows="10" name="texto"><?php echo $texto;?></textarea></td></tr>
<tr><td>Ficheros</td><td><input type="file" name="fichero"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>

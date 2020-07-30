<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">TU RESPUESTA</p></div>
<div class="contenido">

<form action="introrespuesta.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>">
<?php 
$sql="SELECT * from mensajes where id='".$id."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$texto=$resultado['texto'];
$fichero=$resultado['fichero'];
$otrosmot=$resultado['otrosmot'];

$sql2="SELECT * from respuesta where idmensaje='".$id."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<table>
<tr><td><span class="caja2"><b>PREGUNTA</b></span></td></tr>
<tr><td><span class="caja3"><b><?php echo strtoupper($texto);?></b></span></td></tr>
<tr><td><span class="caja2"><b>OPCIONES DE RESPUESTA</b></span></td></tr>
<tr><td>
<div class="main">
<?php 
for ($j=0;$j<$row2;$j++){;
mysqli_data_seek($result2, $j);
$resultado2=mysqli_fetch_array($result2);
$valor=$resultado2['valor'];
$textores=$resultado2['texto'];
?>
<span class="caja">
 <b><?php echo strtoupper($textores);?></b><br/>
 <input type="radio" name="respuesta" value="<?php echo $valor;?>">
</span>

<?php };?>
<?php if($otrosmot=='1'){;?>
<span class="caja">
 <b>Otros Motivos</b><br/>
 <input type="radio" name="respuesta" value="99"><br/>
 <input type="text" name="textotro" size="20" maxlength="250">
</span>

<?php }; ?>
</div>
</td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>

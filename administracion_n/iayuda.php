<?php  
include('bbdd.php');

 include('../portada_n/cabecera2.php');?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE AYUDA</p></div>
<div class="contenido">

<?php 
if ($ide!=null){;

if ($enviar=='enviar'){;

$sql13 = "INSERT INTO ayuda(menu,seccion,subseccion,titulo) 
VALUES (:menu,:seccion,:subseccion,:texto)";
//echo $sql13;


$result13=$conn->prepare($sql13);
$result13->bindParam(':menu',$menu);
$result13->bindParam(':seccion',$seccion);
$result13->bindParam(':subseccion',$subseccion);
$result13->bindParam(':texto',$texto);
$result13->execute();

//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");
echo ("introduccida ayuda");

//$result13=$conn->query($sql13);
//$resultmos13=$conn->query($sql13);
//$num_rows=$result->fetchAll();
//$row=count($num_rows);

?>
<?php }else{;?>

<form action="iayuda.php" method="post" name="form2">
<table>
<tr><td class="tit">Menu</td>
<td>
<select name="menu">
<option value="1">Administrar</option>
<option value="2">Generador</option>
<option value="3">Herramientas</option>
<option value="4">Mi cuenta</option>
<option value="5">Ayuda</option>
</select>
</td></tr>
<tr><td class="tit">Modulo</td>
<td>
<select name="seccion">
<?php for ($t=1;$t<12;$t++){;?>
<option value="<?php  echo$t;?>"><?php  echo$t;?></option>
<?php };?>
</select>
</td></tr>

<tr><td class="tit">Seccion</td>
<td>
<select name="subseccion">
<?php for ($t=0;$t<10;$t++){;?>
<option value="<?php  echo$t;?>"><?php  echo$t;?></option>
<?php };?>
</select>
</td></tr>

<tr><td class="tit">Texto</td><td><input type="text" name="texto" maxlength="250" size="50"></td></tr>



<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php };?>


<?php } else {;

include ('../cierre.php');

 };
 ?>



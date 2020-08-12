<?php  
include('bbdd.php');

 include('../portada_n/cabecera2.php');?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE DIAS FESTIVOS DEL PAIS</p></div>
<div class="contenido">

<?php 
if ($ide!=null){;

if ($enviar=='enviar'){;
for ($j=0;$j<$valores;$j++){;
$fecha=$year[$j]."-".$mes[$j]."-".$dia[$j];
$sql13 = "INSERT INTO festivospais(dia,mes,year,pais,fecha) 
VALUES (:dia,:mes,:year,:pais,:fecha)";
//echo $sql13;
//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");

$result13=$conn->prepare($sql13);
$result13->bindParam(':dia',$dia[$j]);
$result13->bindParam(':mes',$mes[$j]);
$result13->bindParam(':year',$year[$j]);
$result13->bindParam(':pais',$pais);
$result13->bindParam(':fecha',$fecha);
$result13->execute();
//$resultadoi=$resulti->fetch();

//$result13=$conn->query($sql13);
//$resultmos=$conn->query($sql13);
//$num_rows=$result13->fetchAll();
//$row=count($num_rows);

echo ("introducida fecha: ".$fecha."<br/>");
};

?>
<?php }else{;?>

<form action="iclpaises.php" method="post" name="form2">
<input type="hidden" value="8" name="valores">
<table>
<tr><td class="tit">Pais</td>
<td>
<select name="pais">
<option value="724">Espa&ntilde;a</option>
</select>
</td></tr>
</table>
<table>
<tr><td class="tit">D&iacute;as</td><td>Mes</td><td>A&ntilde;o</td></tr>
<?php for($g=0;$g<8;$g++){;?>
<tr>
<td><select name="dia[<?php echo $g?>]">
<?php for ($t=1;$t<32;$t++){;?>
<option value="<?php  echo $t;?>"><?php  echo $t;?></option>
<?php };?>
</select>
</td>
<td><select name="mes[<?php echo $g?>]">
<?php for ($t=1;$t<13;$t++){;?>
<option value="<?php  echo $t;?>"><?php  echo $t;?></option>
<?php };?>
</select>
</td>
<td><select name="year[<?php echo $g?>]">
<?php 
$dt=date('Y');
$gt=$dt-10;
for ($t=$dt;$t>$gt;$t--){;?>
<option value="<?php  echo $t;?>"><?php  echo $t;?></option>
<?php };?>
</select>
</td>
</tr>
<?php }; ?>
</table>
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
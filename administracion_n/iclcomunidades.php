<?php  
include('bbdd.php');

 include('../portada_n/cabecera2.php');?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE DIAS FESTIVOS DE COMUNIDADES</p></div>
<div class="contenido">

<?php 
if ($ide!=null){;

if ($enviar=='enviar'){;
for ($j=0;$j<$valores;$j++){;
$fecha=$year[$j]."-".$mes[$j]."-".$dia[$j];
$sql13 = "INSERT INTO festivoscomunidad(dia,mes,year,pais,fecha,comunidad) 
VALUES (:dia,:mes,:year,:pais,:fecha,:comunidad)";
//echo $sql13;
//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");
echo ("introducida fecha: ".$fecha."<br/>");



$result13=$conn->prepare($sql13);
$result13->bindParam(':dia',$dia[$j]);
$result13->bindParam(':mes',$mes[$j]);
$result13->bindParam(':year',$year[$j]);
$result13->bindParam(':pais',$pais);
$result13->bindParam(':fecha',$fecha);
$result13->bindParam(':comunidad',$comunidad);
$result13->execute();

//$result13=$conn->query($sql13);
//$resultmos=$conn->query($sql);
//$num_rows=$result->fetchAll();
//$row=count($num_rows);

};

?>
<?php }else{;?>

<form action="iclcomunidades.php" method="post" name="form2">
<input type="hidden" value="4" name="valores">
<table>
<tr><td class="tit">Pais</td>
<td>
<select name="pais">
<option value="724">Espa&ntilde;a</option>
</select>
</td></tr>
<?php
$sql2="select * from comunidades where idpais='724'";
//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result comunidades");
//$row=mysqli_num_rows($result2);

$result2=$conn->query($sql2);
$resultmos=$conn->query($sql2);
$num_rows=$result2->fetchAll();
$row=count($num_rows);

?>
<tr><td class="tit">Comunidades</td>
<td>
<select name="comunidad">
<?php  

foreach ($resultmos as $row1) {
	
	$id=$row1['id'];
	$comunidad=$row1['comunidad'];
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result2, $i);
//$resultado=mysqli_fetch_array($result2);
//$id=$resultado['id'];
//$comunidad=$resultado['comunidad'];
?>
<option value="<?php  echo $id;?>"><?php echo $comunidad;?></option>
<?php };?>
</select>
</td></tr>


</table>
<table>
<tr><td class="tit">D&iacute;as</td><td>Mes</td><td>A&ntilde;o</td></tr>
<?php for($g=0;$g<4;$g++){;?>
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
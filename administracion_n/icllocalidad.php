<?php  
include('bbdd.php');

 include('../portada_n/cabecera2.php');?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE DIAS FESTIVOS DE MUNICIPIOS</p></div>
<div class="contenido">

<?php 
if ($ide!=null){;

if ($enviar=='enviar'){;
for ($j=0;$j<$valores;$j++){;
$fecha=$year[$j]."-".$mes[$j]."-".$dia[$j];

$idmunicipio=strtok($municipio,"-");
$idprovincia=strtok("-");

$sql13 = "INSERT INTO festivosmunicipios(dia,mes,year,idpais,fecha,idprovincia,idmunicipio) 
VALUES ('$dia[$j]','$mes[$j]','$year[$j]','$pais','$fecha','$idprovincia','$idmunicipio')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");
echo ("introducida fecha: ".$fecha."<br/>");
};

?>
<?php }else{;?>

<form action="icllocalidad.php" method="post" name="form2">
<input type="hidden" value="2" name="valores">
<table>
<tr><td class="tit">Pais</td>
<td>
<select name="pais">
<option value="724">Espa&ntilde;a</option>
</select>
</td></tr>
<?php
$sql2="select * from municipios where idpais='724'";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result comunidades");
$row=mysqli_num_rows($result2);
?>
<tr><td class="tit">Municipios</td>
<td>
<select name="municipio">
<?php  
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result2, $i);
$resultado=mysqli_fetch_array($result2);
$id=$resultado['id'];
$idprovincia=$resultado['provincia_id'];
$municipio=$resultado['municipio'];
$idt=$id."-".$idprovincia;
?>
<option value="<?php  echo $idt;?>"><? echo $municipio;?></option>
<?php };?>
</select>
</td></tr>


</table>
<table>
<tr><td class="tit">D&iacute;as</td><td>Mes</td><td>A&ntilde;o</td></tr>
<?php for($g=0;$g<2;$g++){;?>
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
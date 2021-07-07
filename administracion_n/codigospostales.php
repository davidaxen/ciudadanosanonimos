<select class="fadeIn second" name="cps" id="obj_cps">
<option value="">Seleccionar...</option>
<?php 
require('bbdd.php');
/*$sql3="SELECT * from ciudades WHERE idciudad = ".$_POST['idmun'];
$result3=$conn->query($sql3);
$resultado3=$result3->fetch(); */

//$sql4="SELECT * from codigospostales WHERE admin1_name = (SELECT ciudad FROM ciudades WHERE ) '".$resultado3['cod_pais']."' order by postal_code asc";
$sqlciu2 = "SELECT ciudad FROM ciudades WHERE idciudad = '".$_POST['idmun']."'";
$resultciu2 = $conn->query($sqlciu2);
$resultadociu2 = $resultciu2->fetch();
if ($resultadociu2['ciudad'] != '') {
	$sql4="SELECT DISTINCT postal_code from codigospostales WHERE name = '".html_entity_decode($resultadociu2['ciudad'])."' order by postal_code asc"; 
	var_dump($sql4);
	//$rs_prov=mysqli_query ($conn,$sql) or die ("Invalid result");
	$rs_cp=$conn->query($sql4);
	//$rs_prov = $mysqli->query("SELECT * FROM paises");
	while($row_cp = $rs_cp->fetch()){
	?>                        
	<option value="<?php echo $row_cp['postal_code']; ?>"><?php echo $row_cp['postal_code']; ?></option>
	
	<?php
	}

	?>

<?php } ?>                          
	</select>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<select name="pais" id="obj_provincia" onchange="mostrarMunicipios()">
<option value="">Seleccionar...</option>
<?php 
require('bbdd.php');
$sql="SELECT * from paises order by pais asc "; 
//echo $sql;
$rs_prov=mysqli_query ($conn,$sql) or die ("Invalid result");
//$rs_prov = $mysqli->query("SELECT * FROM paises");
while($row_prov = $rs_prov->fetch_assoc()){
?>                        
<option value="<?php echo $row_prov['idpais']; ?>"><?php echo $row_prov['pais']; ?></option>
<?php } ?>                          
</select>
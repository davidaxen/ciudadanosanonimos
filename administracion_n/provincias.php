<?php 
if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
    $idioma=strtolower($_COOKIE['lang']);
  }else{
    $idioma='es';
  }

  include($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");

   ?>


<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<select name="pais" id="obj_provincia" onchange="mostrarMunicipios()">
<option value=""><?php echo $SELECCIONAR ?></option>
<?php 
require('bbdd.php');
$sql="SELECT * from paises order by pais asc "; 
//echo $sql;
//$rs_prov=mysqli_query ($conn,$sql) or die ("Invalid result");
$rs_prov=$conn->query($sql);
//$rs_prov = $mysqli->query("SELECT * FROM paises");
while($row_prov = $rs_prov->fetch()){
?>                        
<option value="<?php echo $row_prov['idpais']; ?>"><?php echo $row_prov['pais']; ?></option>
<?php } ?>                          
</select>
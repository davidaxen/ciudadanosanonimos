<?php 
if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
    $idioma=strtolower($_COOKIE['lang']);
  }else{
    $idioma='es';
  }

  include($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");

   ?>

<select class="fadeIn second" name="ciudad" id="obj_municipio" onchange="mostrarCodigosPostales()">
<option value=""><?php echo $SELECCIONAR ?></option>
<?php 
require('bbdd.php');
$sql2="SELECT * FROM ciudades WHERE idpais='".$_POST['idprov']."' order by ciudad asc"; 
//echo $sql;
$rs_mun=$conn->query($sql2);
//$rs_mun=mysqli_query ($conn,$sql2) or die ("Invalid result");
while($row_mun = $rs_mun->fetch(PDO::FETCH_ASSOC)){
//while($row_mun = $rs_mun->fetch_assoc()){
?>                        
<option value="<?php echo $row_mun['idciudad']; ?>"><?php echo $row_mun['ciudad']; ?></option>
<?php } ?>                          
</select>




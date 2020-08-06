<select name="ciudad" id="obj_municipio" >
<!--onchange="mostrarConsejos()">-->
<option value="">Seleccionar...</option>
<?php 
require('bbdd.php');
if($_POST['idprov']!='todos'){;
$sql2="SELECT * FROM ciudades WHERE idpais='".$_POST['idprov']."' order by ciudad asc"; 
//echo $sql2;
$rs_mun=$conn->query($sql2);

//$rs_mun=mysqli_query ($conn,$sql2) or die ("Invalid result");

while($row_mun = $rs_mun->fetch(PDO::FETCH_ASSOC)){
?>                        
<option value="<?php echo $row_mun['idciudad']; ?>"><?php echo $row_mun['ciudad']; ?></option>
<?php }
}else{;?>
<option value="" selected>Todos</option>
<?php 
};
 ?>                          
</select>
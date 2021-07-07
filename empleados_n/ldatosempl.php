<html>
<head>
<title>Modificación de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
<script>
function mod(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("ver"+i)
elem2=eval("menu"+i)	
if (i==num){
elem1.style.visibility="visible"
elem2.style.background="#DEE9F7"
elem2.style.color="#016EA3"
}else{
elem1.style.visibility="hidden"
elem2.style.background="#016EA3"
elem2.style.color="#DEE9F7"
}
}
}
</script>
<style>
a {text-decoration:none}
a hover: {text-decoration:none}
</style>
</head>
<?php 
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">DATOS DE EMPLEADOS</td></tr>
</table>



<?php 
if ($idempl!=null){;?>

<?php 
$sql="select * from empleados where idempresa='".$ide."' and idempleado='".$idempl."' order by idempleado desc"; 

$result=$conn->query($sql);
$arrayempleado=$result10->fetchAll();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result clientes");
//$arrayempleado=mysqli_fetch_array($result);

$sql22="select * from pais where idpais='".$arrayempleado[17]."'";

$result22=$conn->query($sql22);
$resultado22=$result22->fetchAll();
//$row=count($num_rows);
//$result22=mysqli_query ($conn,$sql22) or die ("Invalid result clientes");
//$resultado22=mysqli_fetch_array($result22);
$nacionalidad1=$resultado22['nombrepais'];

$sql1="select * from estudios where idestudios='".$arrayempleado[9]."'";

$result1=$conn->query($sql1);
$row=count($num_rows);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result estudios");
//$row=mysqli_num_rows($result);
if ($row==0){;
$nombreestudios="";
}else{;
$resultado1=$result10->fetchAll();
//$resultado1=mysqli_fetch_array($result1);
$nombreestudios=$resultado1['nombreestudios'];
};

?>


<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,3)"><div class="menup" id="menu1">Datos Personales</div></a></td>
<td><a href="#" onclick="mod(2,1,3)"><div class="menup" id="menu2">Localizacion</div></a></td>
<td><a href="#" onclick="mod(3,1,3)"><div class="menup" id="menu3">Imagenes</div></a></td>
<!--
<td><a href="#" onclick="mod(3,1,5)"><div class="menup" id="menu3">Otros Datos</div></a></td>
<td><a href="#" onclick="mod(4,1,5)"><div class="menup" id="menu4">Datos Bancarios</div></a></td>
-->

</tr>
</table>
</div>

<div class="pos71" id="ver1" >
<table>
<tr><td>Codigo Empleados</td><td colspan="2"><?php  echo $arrayempleado[1];?></td></tr>
<tr><td>Nombre del Empleado</td><td>Primer Apellido</td><td>Segundo Apellido</td></tr>
<tr>
<td><?php  echo $arrayempleado[3];?></td>
<td><?php  echo $arrayempleado[4];?></td>
<td><?php  echo $arrayempleado[5];?></td>
</tr>
<tr><td>Pais de Nacimiento</td><td colspan="2"><?php  echo $nacionalidad1;?></td></tr>
<tr><td>Sexo</td><td colspan="2">
<?php  switch ($arrayempleado[31]){; 
case '1': echo "Hombre";break;
case '2': echo "Mujer";break;
};?>
</td></tr>
<tr><td>Fecha de Nacimiento</td><td colspan="2">
<?php  echo $arrayempleado[10];?>- <?php  echo $arrayempleado[11];?> - <?php  echo $arrayempleado[12];?></td></tr>
<tr><td>Tipo de Documento</td><td colspan="2">Documento</td></tr>
<td>
<?php  switch ($arrayempleado[6]){; 
case '1': echo "DNI";break;
case '2': echo "Pasaporte";break;
case '6': echo "NIE";break;
};?>
</td>
<td><?php  echo $arrayempleado[7];?></td>
</tr>
<tr><td>Nº Seg Social</td><td><?php  echo $arrayempleado[8];?></td></tr>
<tr><td>Grado de Minusvalia</td><td colspan="2"><?php  echo $arrayempleado[32];?></td></tr>
</table>
</div>

<div class="pos71" id="ver2" >
<table>
<tr><td>Dirección</td><td colspan="2"><?php  echo $arrayempleado[14];?></td></tr>
<tr><td>Localidad</td><td colspan="2"><?php  echo $arrayempleado[16];?></td></tr>
<tr><td>Provincia</td><td colspan="2"><?php  echo $arrayempleado[15];?></td></tr>
<tr><td>Código Postal</td><td colspan="2"><?php  echo $arrayempleado[13];?></td></tr>
<tr><td>Telefonos</td><td><?php  echo $arrayempleado[28];?></td><td><?php  echo $arrayempleado[29];?></td></tr>
<tr><td>E-mail</td><td colspan="2"><?php  echo $arrayempleado[30];?></td></tr>
</table>
</div>



<div class="pos71" id="ver3" >
<table>
<tr><td>DNI - cara a</td><td><img  onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=50;this.height=50" src="<?php echo '../img/emp/'.$arrayempleado[23];?>" width="50"></td></tr>
<tr><td>DNI - cara b</td><td><img onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=50;this.height=50" src="<?php echo '../img/emp/'.$arrayempleado[24];?>" width="50"></td></tr>
<tr><td>DNI - ss</td><td><img onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=50;this.height=50" src="<?php echo '../img/emp/'.$arrayempleado[25];?>" width="50"></td></tr>
<tr><td>Foto Carnet</td><td><img onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=50;this.height=50" src="<?php echo '../img/emp/'.$arrayempleado[26];?>" width="50"></td></tr>
<tr><td>Otro Foto</td><td><img onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=50;this.height=50" src="<?php echo '../img/emp/'.$arrayempleado[27];?>" width="50"></td></tr>
</table>
</div>

<div class="pos71" id="ver4" >
<table>
<tr><td>Entidad</td><td>Sucursal</td><td>DC</td><td>Numero de Cuenta</td></tr>
<tr>
<td><?php  echo $arrayempleado[19];?></td>
<td><?php  echo $arrayempleado[20];?></td>
<td><?php  echo $arrayempleado[21];?></td>
<td><?php  echo $arrayempleado[22];?></td>
</tr>
</table>
</div>
<div class="pos71" id="ver5" >
<table>
<tr><td>Estudios/Formación</td><td><?php  echo substr($nombreestudios,0,50);?></td></tr>
</table>
</div>

<?php }else{;
include ('../cierre.php');
 };?>

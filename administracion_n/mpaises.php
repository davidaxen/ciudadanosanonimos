<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PAISES</p></div>
<div class="contenido">

<?php 
$datos='datos';

if ($datos!='datos'){;
?>

<table>
<form method="post" action="lpaises.php">


<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from pais"; 
//$result=mysqli_query ($conn,$sql) or die ("Invalid result");

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>

<table width="600" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Cod Pais</td><td>Pais</td><td>Opciones</td></tr>
</thead>
<?php  

foreach ($resultmos as $row1) {

	$idpais=$row1['idpais'];
$nombrepais=$row1['nombrepais'];
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idpais=$resultado['idpais'];
//$nombrepais=$resultado['nombrepais'];
?>
<tr class="dattab">
<td><?php  echo $idpais;?></td>
<td><?php  echo $nombrepais;?></td>
<td><a href="modpais.php?idpais=<?php echo $idpais?>"><img src="../img/modificar.gif"></a></td>
</tr>
<?php };?>
</table>

<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
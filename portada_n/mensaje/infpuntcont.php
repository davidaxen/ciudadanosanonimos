<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');

include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">RESPUESTAS AL MENSAJE</p></div>
<div class="contenido">


<table>
<tr><td>Pregunta</td><td>


<?php 
$sql="SELECT * from mensajes where idempresa='".$ide."' and id='".$id."' ";
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
$texto=$resultado['texto'];

$sql10="SELECT * from respuestamensajes where idempresa='".$ide."' and idmensaje='".$id."'";
//echo $sql10;

$result10=$conn->query($sql10);
$num_rows=$result->fetchAll();
$row10=count($num_rows);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
//$row10=mysqli_num_rows($result10);
?>

<span class="caja">
<?php echo strtoupper($texto);?>
</span>
<br/>
Hemos recibido un total de: <?php echo strtoupper($row10);?> 

<p>&nbsp;</p>
<?php
$sql11="SELECT * from respuesta where idempresa='".$ide."' and idmensaje='".$id."'";
//echo $sql10;

$result11=$conn->query($sql11);
$result11mos=$conn->query($sql11);
$num_rows=$result->fetchAll();
$row10=count($num_rows);
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
//$row11=mysqli_num_rows($result11);

foreach ($result11mos as $row2) {
	
$valor=$row2['valor'];
$textovalor=$row2['texto'];

//for ($i=0;$i<$row11;$i++){;
//mysqli_data_seek($result11, $i);
//$resultado11=mysqli_fetch_array($result11);
//$valor=$resultado11['valor'];
//$textovalor=$resultado11['texto'];
$sql12="SELECT * from respuestamensajes where idempresa='".$ide."' and idmensaje='".$id."' and respuesta='".$valor."'";
//echo $sql10;

$result12=$conn->query($sql12);
$num_rows=$result->fetchAll();
$row12=count($num_rows);

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result10");
//$row12=mysqli_num_rows($result12);

echo strtoupper($textovalor)." - ".$row12;

};
?>




</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>
<?php  
include('bbdd.php');

if ($ide!=null){;


 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE RESPUESTA</p></div>
<div class="contenido">


<?php  

$sql1 = "INSERT INTO respuestamensajes (idempresa,idempleado,idmensaje,respuesta,textorespuesta) VALUES 
('$ide','$idtrab','$id','$respuesta','$textotro')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont1");



?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>


<a href="/inicio1.php" target="_parent">Volver a menu</a>
</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>
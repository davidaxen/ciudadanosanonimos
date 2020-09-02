<?php  
include('bbdd.php');

if ($ide!=null){;


 //include('../../portada_n/cabecera3.php');?>

<!--<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE RESPUESTA</p></div>
<div class="contenido">-->


<?php  

$sql1 = "INSERT INTO respuestamensajes (idempresa,idempleado,idmensaje,respuesta,textorespuesta) VALUES 
(:ide,:idtrab,:id,:respuesta,:textotro)";
//echo $sql1;

$result1=$conn->prepare($sql1);
$result1->bindParam(':ide', $ide);
$result1->bindParam(':idtrab', $idtrab);
$result1->bindParam(':id', $id);
$result1->bindParam(':respuesta', $respuesta);
$result1->bindParam(':textotro', $textotro);
$result1->execute();
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont1");


header("location:../../portada_n/ultimasentradas_t.php");
?>



<!--LOS DATOS HAN SIDO INTRODUCCIDOS<p>


<a href="/inicio1.php" target="_parent">Volver a menu</a>
</div>
</div>


<script>
	window.location.replace("../../portada_n/ultimasentradas_t.php");
</script>-->

<?php } else {;
include ('../../cierre.php');
 };?>
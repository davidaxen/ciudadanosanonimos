<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA SE HA ACABADO</p>
</div>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,6)"><div class="menup" id="menu1">Comprar</div></a></td>
</tr>
</table>
</div>

<div class="pos71" id="ver1" >


<h4>Estimado Cliente:</h4>
<h5>Ya se ha superado el periodo de prueba que tenia asignado para poder continuar debe de adquirir las licencias que le interesan.</h5>

En este caso tiene las siguientes opciones de producto:<br/>


	
<?php 

$opcion = $_POST['opcion'];


$precio = 0;

if($opcion == "basico"){
	$precio = 39 + 39*0.21;
	$producto = "Paquete basico AppMiFinca";
}else if($opcion == "avanzado"){
	$precio = 50 + 50*0.21;
	$producto = "Paquete avanzado AppMiFinca";
}

session_start();
//if (!$_SESSION["precio"] && !$_SESSION["producto"]){
	$_SESSION["precio"] = $precio;
	$_SESSION["producto"] = $producto;
//}




echo $producto." ".$precio;
?>

<form action="comser.php" method="post">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>





</div>



</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

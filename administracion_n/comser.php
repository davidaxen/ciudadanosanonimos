<?php  
include('bbdd.php');

if ($ide!=null){;


 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LE ESTAMOS TRANSFIENDO A LA PLATAFORMA DE PAGO</p>
</div>

<?php 

session_start();

if ($_SESSION["precio"] && $_SESSION["producto"]){
	$precio = $_SESSION["precio"];
	$producto = $_SESSION["producto"];

	?>


<div class="contenido">

<center>
<table>
<tr><td><center><img src="../img/paypal.png"></center></td></tr>
<tr><td><center><img src="../img/loading.gif" width="25px"></center></td></tr>
</table>
</center>




<?php 

$licadm=$admin;
$lictra=$numtrab+$paqtrabajadores;
$liccli=$numcli+$paqclientes;

$sql1 = "INSERT INTO previopago 
(idempresas,idproyectos,tprecios,opcion,licadm,lictrab,liccli,estado,personalizacion,
precio,cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,
accmantenimiento,niveles,productos,revision,trabajo,siniestro,
control,mediciones,jornadas,informes,ruta,envases,incidenciasplus)

VALUES 
('$ide','$idpr','$tprecios','$opcion','$licadm','$lictra','$liccli','1','$personalizacion',
'$precio','$cuadrante','$entrada','$incidencia','$mensaje','$alarma','$accdiarias',
'$accmantenimiento','$niveles','$productos','$revision','$trabajo','$siniestro',
'$control','$mediciones','$jornadas','$informes','$ruta','$envases','$incidenciaplus')";
//echo $sql1.'<br/>';

/*
echo $tprecios;
print_r($_COOKIE);
print_r($_GET);
print_r($_POST);
*/

$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
?>



<!--
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title></title>
		-->
			<script type="text/javascript">
				function finishPayment(){
					document.getElementById('payImageButton').click();
				}
			</script>
			<style>
				form{
					display: none;
				}
			</style>
		
		
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="BSG3TRTJPPRDS">
				<input type="hidden" name="lc" value="ES">
				<input type="hidden" name="item_name" value="<?php  echo$producto?>">
				<input type="hidden" name="amount" value="<?php  echo$precio?>">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="button_subtype" value="services">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="rm" value="1">
				<input type="hidden" name="cpp_logo_image" value="https://control.nativecbc.com/img/<?php  echo$imgprpaypal;?>">
				<input type="hidden" name="return" value="https://control.nativecbc.com/administracion_n/comfin.php">
				<input type="hidden" name="cancel_return" value="https://control.nativecbc.com/administracion_n/comcan.php">
				<input type="hidden" name="tax_rate" value="0.000">
				<input type="hidden" name="shipping" value="0.00">
				<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
				<input id="payImageButton" type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
				<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
			</form>

<!-- Insertar mensaje que se quiera -->

			<script type="text/javascript">
				finishPayment();
			</script>

<?php  
}else{ ?>
	Por favor, no tiene acceso a esta opci&oacute;n,<br>
	vuelva a la p&aacute;gina inicial pinchando <a href="http://facturacion.admiservi.es">aqu&iacute;</a>
<?php 
}
?>

</div>

</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
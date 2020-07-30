<?php  
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA SE HA ACABADO</p>
</div>
<div class="contenido">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TPFL6JW7R6WGQ">
<table>
<tr><td><input type="hidden" name="on0" value="Appmifinca">Appmifinca</td></tr><tr><td><select name="os0">
	<option value="Paquete Basico">Paquete Basico €39,00 EUR</option>
	<option value="Paquete Avanzado">Paquete Avanzado €50,00 EUR</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2FK5Q2AX5CV4J">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>




<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TPFL6JW7R6WGQ">
<input type="hidden" name="ide" value="<?php  echo$ide;?>">
<input type="hidden" name="idpr" value="<?php $idpr;?>">
<input type="hidden" name="opcion" value="<?php  echo$opcion;?>">
<input type="hidden" name="amount" value="<?php $precio;?>">
Importe: <?php  echo$precio;?>
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>




</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>
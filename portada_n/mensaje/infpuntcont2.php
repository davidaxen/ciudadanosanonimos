<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nc);?> ENVIADOS EN FECHA</p></div>
<div class="contenido">


<form action="infpuntcontl2.php" method="post">
<table>

<tr><td>Tipo de Informe</td><td><select name="tipo">
<!--<option value="anual">Anual-->
<option value="mes">Mensual
<option value="dia">Diario
</select></td></tr>
<tr><td>Fecha</td><td>
<input type="number" name="d" maxlength=2 size=3 min="1" max="31">
/

<select name="m">
<option value="1">Enero
<option value="2">Febrero
<option value="3">Marzo
<option value="4">Abril
<option value="5">Mayo
<option value="6">Junio
<option value="7">Julio
<option value="8">Agosto
<option value="9">Septiembre
<option value="10">Octubre
<option value="11">Noviembre
<option value="12">Diciembre
</select>

/<input type="number" name="y" maxlength=4 size=5 value="<?php  echo date("Y",time());?>"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>

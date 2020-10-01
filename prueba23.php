<?php
extract($_GET);

print_r($prueba);
?>

<div class="colocacion derecha" id="imprimir">
<div class="titulo">
<p class="enc">INFORME DE ENTRADA / SALIDA POR EMPLEADO</p></div>
<div class="contenido">


<form action="infpuntcontle.php" method="post"  name="form1">
<table>


<tr><td>Tipos de Informe</td><td><select id="tipo" name="tipo" onchange="mod(1,4)">
<option value="mes">Mensual</option>
<option value="dia">Diario</option>
<option value="anual">Anual</option>
<option value="entre">Bloque de fechas</option>
</select></td></tr>
</table>



<div id="ver1" style="visibility: hidden;">
<table>
<tr><td>Fecha</td><td>
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
/<input type="number" name="y" maxlength=4 size=5 value="2019"></td></tr>
</table>
</div>

<div id="ver2" style="visibility: hidden;">
<table>
<tr><td>Fecha</td><td><input type="number" name="d" maxlength=2 size=3>/
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
/<input type="number" name="y" maxlength=4 size=5 value="2019"></td></tr>
</table>
</div>

<div id="ver3" style="display:none;visibility:hidden;">
<table>
<tr><td>Fecha</td><td><input type="number" name="y" maxlength=4 size=5 value="2019"></td></tr>
</table>
</div>

<div id="ver4" style="visibility: hidden;" >
<table>
<tr><td>Fecha Inicial</td><td><input type="number" name="d1" maxlength=2 size=3>/
<select name="m1">
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
<input type="number" name="y1" maxlength=4 size=5 value="2019"></td></tr>

<tr><td>Fecha Final</td><td><input type="number" name="d2" maxlength=2 size=3>/
<select name="m2">
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
/<input type="number" name="y2" maxlength=4 size=5 value="2019"></td></tr>
</table>
</div>

<table>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
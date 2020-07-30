<?php  
include('bbdd.php');
$idpccat=1;
if ($ide!=null){; include('../../portada_n/cabecera3.php');
 include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">INFORME DE SEMANAL</p></div>
<div class="contenido">


<form action="infsemanall.php" method="post">
<table>
<tr><td>Datos del Empleado</td><td>


<?php 
$sql="SELECT * from empleados where idempresa='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<select name="idempleado" id="combobox">
<option></option>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$papellido=$resultado['1apellido'];
$sapellido=$resultado['2apellido'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $papellido;?> <?php  echo $sapellido;?>
<?php };?>
</select></td></tr>


<tr><td>Fecha inicial</td>
<td><input type="number" name="di" maxlength=2 size=3>/

<select name="mi">
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

/<input type="number" name="yi" maxlength=4 size=5 value="<?php  echo date("Y",time());?>"></td></tr>

<tr><td>Fecha final</td>
<td><input type="number" name="df" maxlength=2 size=3>/

<select name="mf">
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

/<input type="number" name="yf" maxlength=4 size=5 value="<?php  echo date("Y",time());?>"></td></tr>



<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
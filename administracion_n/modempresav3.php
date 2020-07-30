<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA SE HA ACABADO</p>
</div>
<!--<div class="contenido">-->


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

En este caso tiene las siguientes opciones de producto:

<?php 
$sqlopc="select * from precioopc where idpr='".$idpr."'";
//echo $sqlopc;
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
$rowopc=mysqli_affected_rows();
?>

<form action="administracion_n/compra2.php" method="get" enctype="multipart/form-data" name="formulario22" id="formulario">
<input type="hidden" name="tablas" value="modificaropc">
<input type="hidden" name="idcm" value="20">
<input type="hidden" name="ide" value="<?php  echo$ide;?>">
<input type="hidden" name="idpr" value="<?php $idpr;?>">

<table>
<tr><td>Opción</td><td>
<select name="opcion" onchange="myFuncion22()">
<option value=""></option>
<?php for ($jopc=0;$jopc<$rowopc;$jopc++){;
$nombreopc=mysqli_result($resultopc,$jopc,'nombre');
$idopc=mysqli_result($resultopc,$jopc,'idopcion');
?>

<option value="<?php  echo$idopc;?>"><?php  echo$nombreopc;?></option>

<?php };?>
</select>

</td>
  <td><input type="submit" value="Comprar Ahora" name="enviar" disabled></td></tr>
<tr><td colspan="3">
<p id="demo"></p>
</td></tr>
<script>
function myFuncion22(){
var text1;
var text2;	
var valor=formulario22.opcion.value;


switch(valor){
<?php for ($jopc=0;$jopc<$rowopc;$jopc++){;
$idopc2=mysqli_result($resultopc,$jopc,'idopcion');
$caracopc=mysqli_result($resultopc,$jopc,'caracteristicas');
$precioopc=mysqli_result($resultopc,$jopc,'precio');
$caracprecioopc=mysqli_result($resultopc,$jopc,'caracprecio');
?>	
	case "<?php  echo$idopc2;?>":
	   text1="<input type='hidden' name='precio' value='<?php  echo$precioopc;?>'> <h3>Precio:<?php  echo$precioopc;?> <?php  echo$caracprecioopc;?></h3>";
	   text2="<?php  echo$caracopc;?>";
	   formulario22.enviar.disabled=false;
		break;
<?php };?>	
default: 
		text1="No has seleccionado ningun paquete";
		text2="";
		formulario22.enviar.disabled=true;
}
document.getElementById("demo").innerHTML = text1+text2;
//document.write(text);
}
</script>

</table>





</form>

<!--
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" name="formulario2">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E5WNQ3R8S2CJS">
<table>

<tr><td>Numero de Administradores</td><td><input type="text" name="administrador" value="1" onchange="calculo()"></td></tr>
<tr><td>Numero de Puestos de Trabajo</td><td><input type="text" name="puestos" value="3" onchange="calculo()"></td></tr>
<tr><td>Numero de Empleados</td><td><input type="text" name="empleados" value="3" onchange="calculo()"></td></tr>

<tr><td><input type="hidden" name="on0" value="APP NATIVE CBC">Importe 1&deg; A&ntilde;o</td><td><input type="text" name="os0"></td></tr>
<tr><td>Importe 2&deg; A&ntilde;o y sucesivos</td><td><input type="text" name="amount" value="175"></td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">

</form>
-->








</div>





<!--</div>-->
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

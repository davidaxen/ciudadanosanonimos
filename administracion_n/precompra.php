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
<?php 
if ($modificar=='Modificar Compra'){;

$sqlborrar="DELETE FROM previopago WHERE idempresas ='".$ide."'";
$resultborrar=$conn->exec($sqlborrar);

//$resultborrar=mysqli_query ($conn,$sqlborrar) or die ("Invalid resultborrar");

};
?>

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
$resultopc=$conn->query($sqlopc);

/*$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
$rowopc=mysqli_affected_rows();*/
?>

	<form action="administracion_n/vercompra.php" method="post" name="formulario22" id="formulario">
	
<input type="hidden" name="tablas" value="modificaropc">
<input type="hidden" name="idcm" value="20">


<table>
<tr><td>Opci&oacute;n</td><td>
<select name="opcion" onchange="myFuncion22()">
<option value=""></option>
<?php //for ($jopc=0;$jopc<$rowopc;$jopc++){;
	foreach ($resultopc as $rowopcmos) {
$nombreopc=$rowopcmos['nombre'];
$idopc=$rowopcmos['idopcion'];
?>

<option value="<?php  echo$idopc;?>"><?php  echo$nombreopc;?></option>

<?php };?>
</select>




</td>
  <td><input type="submit" value="Comprar Ahora" name="enviar" disabled></td></tr>
<tr><td colspan="3">
<p id="demo"></p>
</td></tr>

<?php 

$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');



$sqlpn="select * from proyectosnombre where idproyectos='".$idpr."'";
//echo $sqlpn;
$resultpn=$conn->query($sqlpn);
$resultadopn=$resultpn->fetchAll();

//$resultpn=mysqli_query ($conn,$sqlpn) or die ("Invalid resultpn");
for ($pn=0;$pn<count($dat);$pn++){;
$encab[$pn]=$resultadopn[0][$dat[$pn]];
};
//print_r($encab);
?>



<script>
function myFuncion22(){
var text1;
var text2;	
var valor=formulario22.opcion.value;


switch(valor){
<?php 
//for ($jopc=0;$jopc<$rowopc;$jopc++){;
foreach ($resultopc as $rowopmos2) {
$idopc2=rowopmos2'idopcion'];
$caracopc=$rowopmos2['caracteristicas'];
$precioopc=$rowopmos2['precio'];
$caracprecioopc=$rowopmos2['caracprecio'];


$caracopc="Servicios Incluidos:<br/>";
$caracopc.="<div id='divicolumna22'><ul>";
for ($t=0;$t<count($encab);$t++){;
$vcar=rowopmos2[$dat[$t]];
if($vcar=='1'){
$caracopc.="<li>".$encab[$t]."</li>";
};
};
$caracopc.="</ul></div>";
?>	
	case "<?php  echo$idopc2;?>":
	   text1="<h3>Precio:<?php  echo$precioopc;?> <?php  echo$caracprecioopc;?> sin iva.</h3>";
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

</div>



</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

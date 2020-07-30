<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;

 include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php'); 
 ?>


<div id="main">
<div class="titulo">
<p class="enc">CONFIGURACION DE LA CUENTA</p>
</div>


<script>
//Número máximo de casillas marcadas por cada fila
var maxi=1;

//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir mas de '+maxi+' casillas a la vez, durante el periodo de prueba.');
			//desmarco la casilla, porque no se puede permitir marcar
			check.checked=false;
			//resto una unidad al contador de grupo, porque he desmarcado una casilla
			contador[grupo]--;
		}
	}else {
		//si la casilla no estaba marcada, resto uno al contador de grupo
		contador[grupo]--;
	}
}
</script>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<?php 
if ($idprt==null){;
?>
<div class="pos5">
<form action="iempresa.php" method="post" enctype="multipart/form-data" name="formulario2" id="formulario2">
<table>
<tr>
<td>Proyectos</td>
<td>
<?php 
$sql="select * from proyectos order by idproyectos asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result idproyectos");
$row=mysqli_num_rows($result);
?>
<select name="idprt">
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idproyectos=$resultado['idproyectos'];
$nombrep=$resultado['nombre'];
?>
<option value="<?php  echo $idproyectos;?>" ><?php  echo $nombrep;?>
<?php };?>
</select></td>
</tr>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>

<?php 
}else{;
?>
<div class="contenido"  style="padding-left:10px">
<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tabla" value="iempresav">
<input type="hidden" name="idc" value="0">
<input type="hidden" name="idpr" value="<?php  echo $idprt;?>">


<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Empresa
</div>
<div class="panel">

<table>

<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><input type="text" name="nombre2" size="50" ></td>
<td>N.I.F.</td><td><input type="text" name="nif2" size="9" maxlength="9" ></td>
<td>Password</td><td><input type="text" name="clave2" size="8" maxlenght="8"></td></tr>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><input type="text" name="domicilio2" size="50"></td>
<td>C.P.</td><td><input type="text" name="cp2" size="5"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. contacto 1</td><td>Tel. contacto 2</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><input type="text" name="tfijo2" size="9" maxlength="9"></td>
<td><input type="text" name="tmovil2" size="9" maxlength="9"></td>
<td><input type="text" name="tfax2" size="9" maxlength="9"></td>
<td><input type="text" name="email2" size="30" ></td>
<td><input type="text" name="web2" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><input type="text" name="provincia2" size="50"></td>
<td><input type="text" name="localidad2" size="50"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Pais</td>
<td>
<?php 
$sql="select * from pais order by nombrepais asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);
?>
<select name="pais2">
<?php 
for ($i;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idpais=$resultado['idpais'];
$nombrepais=$resultado['nombrepais'];
?>
<option value="<?php  echo $idpais;?>" <?php if ($idpais==724){;?>selected<?php };?> ><?php  echo $nombrepais;?>
<?php };?>
</select></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Nombre del Representante</td><td><input type="text" name="nombrer" ></td>
<td>N.I.F. repres.</td><td><input type="text" name="nifr" size="9" maxlength="9"></td>
</tr>
</table>
</td></tr>
</table>
</div>



<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;">  Imagenes
</div>
<div class="panel" style="column-count:2">

<ul>
<li>Logotipo&nbsp;<a href="../img/pl_logo.psd">Plantilla</a>&nbsp;<input type="file" name="logotipo2"></li>
<li>Logotipo pequeño&nbsp;<a href="../img/pl_logo.psd">Plantilla</a>&nbsp;<input type="file" name="logotipop2"></li>
<li>Firma&nbsp;<a href="../img/pl_firma.psd">Plantilla</a>&nbsp;<input type="file" name="firma2"></li>
<li>Plantilla A4&nbsp;<a href="../img/pl_a4.psd">Plantilla</a>&nbsp;<input type="file" name="plaa42"></li>
<li>Plantilla Hoja1 QR&nbsp;<a href="../img/pl_a4.psd">Plantilla</a>&nbsp;<input type="file" name="hoja12"></li>
<li>Plantilla Hoja2 QR&nbsp;<a href="../img/pl_a4.psd">Plantilla</a>&nbsp;<input type="file" name="hoja22"></li>
<li>Plantilla Sobre&nbsp;<a href="../img/pl_sobre.psd">Plantilla</a>&nbsp;<input type="file" name="plasob2"></li>
<li>Plantilla carnet&nbsp;<a href="../img/pl-carnet.psd">Plantilla</a>&nbsp;<input type="file" name="placar2"></li>
<li>Plantilla movil&nbsp;<a href="../img/pl_fondo_movil.psd">Plantilla</a>&nbsp;<input type="file" name="plamov2"></li>
<li>Icono&nbsp;<input type="file" name="ico2"></li>
<li>Color&nbsp;
<?php $i=21;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colortt2=$rt2.$gt2.$bt2;
?>

<input type="text" value="#<?php  echo $colortt2;?>" class="izzyColor" name="colort2" id="datosn[<=$i;?>]"></li>


<li>Color movil&nbsp;
<?php $i=22;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colormt2=$rt2.$gt2.$bt2;
?>
<input type="text" value="#<?php  echo $colormt2;?>" class="izzyColor" name="colorm2" id="datosn<?php  echo $i;?>"></li>
</ul>


</div>

<div class="accordion">
<img src="../img/iconos/licencias.png" width="32px" style="vertical-align:middle;">  Licencias
</div>
<div class="panel">
<table>

<tr><td>
<table>
<tr><td>Administradores</td><td><input type="text" name="licadm" size="4" ></td></tr>
<tr><td>Puestos de Trabajo - Clientes</td><td><input type="text" name="liccli" size="4" ></td></tr>
<tr><td>Trabajadores</td><td><input type="text" name="lictra" size="4" ></td></tr>
</table>


</td></tr>


</table>
</div>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;">  Servicios Administrar
</div>
<div class="panel" style="column-count:2">


<table>
<thead class="enctab">
<tr><td>Servicio</td>

<td>Activo</td></tr>
</thead>
<?php 
$encaba=array('Clientes','Gestores','Empleados','Empresas','Empresa','Usuarios','Visitas','Proveedores','Puesto de Trabajo','Vecinos');
?>
<?php for ($t=0;$t<count($encaba);$t++){;
$i=$t+2;
$y=$t+2;
?>


<tr><td><?php  echo $encaba[$t];?></td>

<td>
<input type="checkbox" name="datosaan[<?php  echo $y;?>]" 
value="1"
<?php if($socoa[$y]==1){?>checked="checked"<?php };?>

></td>


</tr>

<?php };?>


</table>


</div>






<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;">  Servicios Herramientas
</div>
<div class="panel">
<!--<div id="divicolumna2">-->
<?php 

$camposqr=array('accdiarias','accmantenimiento','productos','niveles','revision','envases');
$camposp=array('trabajo','siniestro','mediciones','control','alarma','ruta');
$camposc=array('mensaje','incidenciasplus');
$camposa=array('cuadrante','jornadas');

$sqlopc="select * from precioproyectos where idproyectos='".$idprt."' and estado='1'";
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");

for($numqr=0;$numqr<count($camposqr);$numqr++){;
mysqli_data_seek($resultopc,$numqr);
$resultadoopc=mysqli_fetch_array($resultopc);
$pqr[]=$resultadoopc[$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
mysqli_data_seek($resultopc,$nump);
$resultadoopc=mysqli_fetch_array($resultopc);
$pp[]=$resultadoopc[$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
mysqli_data_seek($resultopc,$numc);
$resultadoopc=mysqli_fetch_array($resultopc);
$pc[]=$resultadoopc[$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
mysqli_data_seek($resultopc,$numa);
$resultadoopc=mysqli_fetch_array($resultopc);
$pa[]=$resultadoopc[$camposa[$numa]];
};


$sql="select * from proyectos where idproyectos='".$idprt."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menuproyectos");
$resultado=mysqli_fetch_array($result);
$tipoprecios=$resultado['tipoprecios'];
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$cqr[]=$resultado[$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$cp[]=$resultado[$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$cc[]=$resultado[$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$ca[]=$resultado[$camposa[$numa]];
};



$sql31="select * from proyectosnombre where idproyectos='".$idprt."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$ncqr[]=$resultado31[$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$ncp[]=$resultado31[$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$ncc[]=$resultado31[$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$nca[]=$resultado31[$camposa[$numa]];
};


$sql32="select * from proyectosimg where idproyectos='".$idprt."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$icqr[]=$resultado32[$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$icp[]=$resultado32[$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$icc[]=$resultado32[$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$ica[]=$resultado32[$camposa[$numa]];
};


$valorcqr=array_count_values($cqr);
$valorcp=array_count_values($cp);
$valorcc=array_count_values($cc);
$valorca=array_count_values($ca);
?>




<?php 
$tipoprecios=1;
if ($tipoprecios==1){;
?>
	<ul>
	
		<li><b>Sistema</b></li>
	
		<input type="checkbox" readonly disabled checked value="basico">
		<input type="hidden" name="pbasico" checked value="1">
		Paquete b&aacute;sico: 
		<?php $pbasico=$resultadoopc['pbasico'];?> <?php  echo $pbasico;?> &euro;/a&ntilde;o sin iva
		<br>
		<ul>
		<li>Incluye:
				<ul>
				<li>Entrada/Salida</li>
				<li>Incidencias</li>
				<input type="hidden" name="entrada" value="1">
				<input type="hidden" name="incidencia" value="1">
				<?php $numadm=$resultado['numadm'];?>
				<?php $numtrab=$resultado['numtrab'];?>
				<?php $numcli=$resultado['numcli'];?>
				<input type="hidden" name="numadm" value="<?php  echo $numadm;?>">
				<input type="hidden" name="numtrab" value="<?php  echo $numtrab;?>">
				<input type="hidden" name="numcli" value="<?php  echo $numcli;?>">
				<li>Licencias</li>
					<ul>
					<li>Administradores: <?php  echo $numadm;?> lic.</li>		
					<li>Trabajadores: <?php  echo $numtrab;?> lic.</li>	
					<li>Puestos de Trabajo / Clientes: <?php  echo $numcli;?> lic.</li>		
					</ul>
				</ul>

		</ul>
	<li><b>Servicios</b></li>

<ul>
<?php if (count($cqr)!=$valorcqr[0]){;?>
<table>
<tr><td><i>Tareas con QR</i></td>
<?php  for ($j=0;$j<count($cqr)+1;$j++){;?>
<?php if ($cqr[$j]=='1'){;?><td><input type="checkbox" name="camposqr[<?php  echo $j;?>]" value="1"><img src="../img/<?php  echo $icqr[$j];?>" width="25px">
<br/>
<?php  echo $ncqr[$j];?><br/>
<?php  echo $pqr[$j];?> &euro;/a&ntilde;o sin iva
</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>
<?php if (count($cp)!=$valorcp[0]){;?>
<table>
<tr><td><i>Tareas Programadas</i></td>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($cp[$j]=='1'){;?><td><input type="checkbox" name="camposp[<?php  echo $j;?>]" value="1"><img src="../img/<?php  echo $icp[$j];?>" width="25px">
<br/>
<?php  echo $ncp[$j];?><br/>
<?php  echo $pp[$j];?> &euro;/a&ntilde;o sin iva</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>

<?php if (count($cc)!=$valorcc[0]){;?>
<table>
<tr><td><i>Comunicaciones</i></td>
<?php  for ($j=0;$j<count($cc)+1;$j++){;?>
<?php if ($cc[$j]=='1'){;?><td><input type="checkbox" name="camposc[<?php  echo $j;?>]" value="1"><img src="../img/<?php  echo $icc[$j];?>" width="25px">
<br/>
<?php  echo $ncc[$j];?><br/>
<?php  echo $pc[$j];?> &euro;/a&ntilde;o sin iva
</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>
<?php if (count($ca)!=$valorca[0]){;?>
<table>
<tr><td><i>Avisos de Asistencia</i></td>
<?php  for ($j=0;$j<count($ca)+1;$j++){;?>
<?php if ($ca[$j]=='1'){;?><td><input type="checkbox" name="camposa[<?php  echo $j;?>]" value="1"><img src="../img/<?php  echo $ica[$j];?>" width="25px">
<br/>
<?php  echo $nca[$j];?><br/>
<?php  echo $pa[$j];?> &euro;/a&ntilde;o sin iva</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
</ul>

<!--

		<li><b>Paquetes adicionales de trabajadores</b></li>
<ul>
<?php 		
$sqlemp="select * from precioempleados where idproyectos='".$idprt."' and estado='1'";
$resultemp=mysqli_query ($conn,$sqlemp) or die ("Invalid result precioempleados");
$rowemp=mysqli_num_rows($resultemp);
for ($j=0;$j<$rowemp;$j++){;
mysqli_data_seek($resultemp,$j);
$resultadoemp=mysqli_fetch_array($resultemp);
$nombregrupo=$resultadoemp['nombregrupo'];
$numempleados=$resultadoemp['numempleados'];
$preciogrupo=$resultadoemp['preciogrupo'];
?>
<input type="radio" name="paqtrabajadores" value="<?php  echo $numempleados;?>" onclick="myFuncion22()"><?php  echo $nombregrupo;?> - <?php  echo $preciogrupo;?>  &euro;/a&ntilde;o
<?php 
};
?>
<br/>
<input type="radio" name="paqtrabajadores" value="otros" onclick="myFuncion22()">Otros
<input type="number" name="numempleados" disabled> 
</ul>

<script>
function myFuncion22(){
	var valor=formulario.paqtrabajadores.value;
	//alert (valor+" trabajadores");
	if (valor=='otros'){
	formulario.numempleados.disabled=false;
		}else{;
	formulario.numempleados.disabled=true;
	};
	
	};

function myFuncion23(){
	var valor=formulario.paqclientes.value;
	//alert(valor+" clientes");
	if (valor=='otros'){
	formulario.numclientes.disabled=false;
		}else{;
	formulario.numclientes.disabled=true;
	};
	
	};

</script>		
		
		
		<li><b>Paquetes adicionales de clientes/puestos de trabajo</b></li>
<ul>
<?php 		
$sqlcli="select * from preciocliente where idproyectos='".$idprt."' and estado='1'";
$resultcli=mysqli_query ($conn,$sqlcli) or die ("Invalid result preciocliente");
$rowcli=mysqli_num_rows($resultcli);
for ($j=0;$j<$rowcli;$j++){;
mysqli_data_seek($resultcli,$j);
$resultadocli=mysqli_fetch_array($resultcli);
$nombregrupo=$resultadocli['nombregrupo'];
$numclientes=$resultadocli['numcliente'];
$preciogrupo=$resultadocli['preciogrupo'];
?>
<input type="radio" name="paqclientes" value="<?php  echo $numclientes;?>" onclick="myFuncion23()"><?php  echo $nombregrupo;?> - <?php  echo $preciogrupo;?>  &euro;/a&ntilde;o
<?php 
};
?>
<br/>
<input type="radio" name="paqclientes" value="otros" onclick="myFuncion23()">Otros
<input type="number" name="numclientes" disabled> 		
</ul>

		<li><b>Paquetes de Personalizaci&oacute;n</b></li>
<ul>
<?php 		
$sqlperso="select * from preciopersonalizacion where idproyectos='".$idprt."' and estado='1'";
$resultperso=mysqli_query ($conn,$sqlperso) or die ("Invalid result precioperso");
$rowperso=mysqli_num_rows($resultperso);
for ($j=0;$j<$rowperso;$j++){;
mysqli_data_seek($resultperso,$j);
$resultadoperso=mysqli_fetch_array($resultperso);
$nombregrupo=$resultadoperso['nombregrupo'];
$nomvar=$resultadoperso['nombrevariable'];
$preciogrupo=$resultadoperso['preciogrupo'];
?>
<input type="checkbox" name="nomvar[<?php  echo $j;?>]" value="1"><?php  echo $nombregrupo;?> - <?php  echo $preciogrupo;?>  &euro;/a&ntilde;o
<?php 
};
?>
</ul>		
<br/>
-->		
	
		</ul>




<?php }else{;?>

<?php 
$sqlopc="select * from precioopc where idpr='".$idprt."'";
//echo  $sqlopc;
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
$rowopc=mysqli_num_rows($resultopc);
?>
<table>
<tr><td>Opci&oacute;n</td><td>
<select name="opcion" onchange="myFuncion24()">
<option value=""></option>
<?php for ($jopc=0;$jopc<$rowopc;$jopc++){;
mysqli_data_seek($resultopc,$jopc);
$resultadoopc=mysqli_fetch_array($resultopc);
$nombreopc=$resultadoopc['nombre'];
$idopc=$resultadoopc['idopcion'];
?>

<option value="<?php  echo $idopc;?>"><?php  echo $nombreopc;?></option>

<?php };?>
</select>
</td>
</tr>


<?php 

$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');



$sqlpn="select * from proyectosnombre where idproyectos='".$idprt."'";
//echo  $sqlpn;
$resultpn=mysqli_query ($conn,$sqlpn) or die ("Invalid resultpn");
$resultadopn=mysqli_fetch_array($resultpn);
for ($pn=0;$pn<count($dat);$pn++){;
$encab[$pn]=$resultadopn[$dat[$pn]];
};
//print_r($encab);
?>



<script>
function myFuncion24(){
var text1;
var text2;	
var valor=formulario.opcion.value;


switch(valor){
<?php for ($jopc=0;$jopc<$rowopc;$jopc++){;
mysqli_data_seek($resultopc,$jopc);
$resultadoopc=mysqli_fetch_array($resultopc);
$idopc2=$resultadoopc['idopcion'];
$caracopc=$resultadoopc['caracteristicas'];
$precioopc=$resultadoopc['precio'];
$caracprecioopc=$resultadoopc['caracprecio'];


$caracopc="Servicios Incluidos:<br/>";
$caracopc.="<div id='divicolumna22'><ul>";
for ($t=0;$t<count($encab);$t++){;
$vcar=$resultadoopc[$dat[$t]];
if($vcar=='1'){
$caracopc.="<li>".$encab[$t]."</li>";
};
};
$caracopc.="</ul></div>";
?>	
	case "<?php  echo $idopc2;?>":
	   text1="<h3>Precio:<?php  echo $precioopc;?> <?php  echo $caracprecioopc;?> sin iva.</h3>";
	   text2="<?php  echo $caracopc;?>";
	   formulario.enviar.disabled=false;
		break;
<?php };?>	
default: 
		text1="No has seleccionado ningun paquete";
		text2="";
		formulario.enviar.disabled=true;
}
document.getElementById("demo").innerHTML = text1+text2;
//document.write(text);
}
</script>

</table>


		

<?php };?>



<!--</div>-->

</div>



<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Datos Empresa
</button>


</form>
<?php  include ('../js/acordeonjs.php');?>
</div>
<?php 
};

 } else {;

include ('../cierre.php');

 };
 ?>

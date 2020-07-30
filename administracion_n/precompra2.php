<?php  
include('bbdd.php');

if ($ide!=null){;
if ($devuelto==1){;
include('../portada_n/cabecera4p.php');
}else{;
 include('portada_n/cabecera4p.php');
 };?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA SE HA ACABADO</p>
</div>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
ul li {
  list-style-type: square;
}
</style>
<?php 
if ($modificar=='Modificar Compra'){;

$sqlborrar="DELETE FROM previopago WHERE idempresas ='".$ide."'";
$resultborrar=mysqli_query ($conn,$sqlborrar) or die ("Invalid resultborrar");

};
?>

<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,6)"><div class="menup" id="menu1">Comprar</div></a></td>
</tr>
</table>
</div>

<div class="pos72" id="ver1" >

<h4>Estimado Cliente:</h4>
<h5>Ya se ha superado el periodo de prueba que tenia asignado para poder continuar debe de adquirir las licencias que le interesan.</h5>

En este caso tiene las siguientes opciones de producto:

<?php 
$camposqr=array('accdiarias','accmantenimiento','productos','niveles','revision','envases');
$camposp=array('trabajo','siniestro','mediciones','control','alarma','ruta');
$camposc=array('mensaje','incidenciasplus');
$camposa=array('cuadrante','jornadas');

$sqlopc="select * from precioproyectos where idproyectos='".$idpr."' and estado='1'";
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$pqr[]=mysqli_result($resultopc,0,$camposqr[$numqr]);
};
for($nump=0;$nump<count($camposp);$nump++){;
$pp[]=mysqli_result($resultopc,0,$camposp[$nump]);
};

for($numc=0;$numc<count($camposc);$numc++){;
$pc[]=mysqli_result($resultopc,0,$camposc[$numc]);
};

for($numa=0;$numa<count($camposa);$numa++){;
$pa[]=mysqli_result($resultopc,0,$camposa[$numa]);
};


$sql="select * from proyectos where idproyectos='".$idpr."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menuproyectos");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$cqr[]=mysqli_result($result,0,$camposqr[$numqr]);
};
for($nump=0;$nump<count($camposp);$nump++){;
$cp[]=mysqli_result($result,0,$camposp[$nump]);
};

for($numc=0;$numc<count($camposc);$numc++){;
$cc[]=mysqli_result($result,0,$camposc[$numc]);
};

for($numa=0;$numa<count($camposa);$numa++){;
$ca[]=mysqli_result($result,0,$camposa[$numa]);
};



?>



<?php if ($devuelto==1){;?>
	<form action="vercompra2.php" method="post" name="formulario22">
<?php }else{;?>
	<form action="administracion_n/vercompra2.php" method="post" name="formulario22">
<?php };?>

	<form action="administracion_n/vercompra2.php" method="post" name="formulario22">
	
<input type="hidden" name="tablas" value="modificaropc">
<input type="hidden" name="idcm" value="20">
<input type="hidden" name="ide" value="<?php  echo$ide;?>">
<input type="hidden" name="idpr" value="<?php $idpr;?>">	
	
	<ul>
	
		<li><b>Sistema</b></li>
	
		<input type="checkbox" readonly disabled checked value="basico">
		<input type="hidden" name="pbasico" checked value="1">
		Paquete b&aacute;sico: 
		<?php $pbasico=mysqli_result($resultopc,0,'pbasico');?> <?php  echo$pbasico;?> &euro;/a&ntilde;o sin iva
		<br>
		<ul>
		<li>Incluye:
				<ul>
				<li>Entrada/Salida</li>
				<li>Incidencias</li>
				<input type="hidden" name="entrada" value="1">
				<input type="hidden" name="incidencia" value="1">
				<?php $numadm=mysqli_result($result,0,'numadm');?>
				<?php $numtrab=mysqli_result($result,0,'numtrab');?>
				<?php $numcli=mysqli_result($result,0,'numcli');?>
				<input type="hidden" name="numadm" value="<?php  echo$numadm;?>">
				<input type="hidden" name="numtrab" value="<?php  echo$numtrab;?>">
				<input type="hidden" name="numcli" value="<?php  echo$numcli;?>">
				<li>Licencias</li>
					<ul>
					<li>Administradores: <?php  echo$numadm;?> lic.</li>		
					<li>Trabajadores: <?php  echo$numtrab;?> lic.</li>	
					<li>Puestos de Trabajo / Clientes: <?php  echo$numcli;?> lic.</li>		
					</ul>
				</ul>

		</ul>
	<li><b>Servicios</b></li>

<?php 




$sql31="select * from proyectosnombre where idproyectos='".$idpr."'";
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$ncqr[]=mysqli_result($result31,0,$camposqr[$numqr]);
};
for($nump=0;$nump<count($camposp);$nump++){;
$ncp[]=mysqli_result($result31,0,$camposp[$nump]);
};

for($numc=0;$numc<count($camposc);$numc++){;
$ncc[]=mysqli_result($result31,0,$camposc[$numc]);
};

for($numa=0;$numa<count($camposa);$numa++){;
$nca[]=mysqli_result($result31,0,$camposa[$numa]);
};


$sql32="select * from proyectosimg where idproyectos='".$idpr."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$icqr[]=mysqli_result($result32,0,$camposqr[$numqr]);
};
for($nump=0;$nump<count($camposp);$nump++){;
$icp[]=mysqli_result($result32,0,$camposp[$nump]);
};

for($numc=0;$numc<count($camposc);$numc++){;
$icc[]=mysqli_result($result32,0,$camposc[$numc]);
};

for($numa=0;$numa<count($camposa);$numa++){;
$ica[]=mysqli_result($result32,0,$camposa[$numa]);
};


$valorcqr=array_count_values($cqr);
$valorcp=array_count_values($cp);
$valorcc=array_count_values($cc);
$valorca=array_count_values($ca);
?>
<ul>
<?php if (count($cqr)!=$valorcqr[0]){;?>
<table>
<tr><td><i>Tareas con QR</i></td>
<?php  for ($j=0;$j<count($cqr)+1;$j++){;?>
<?php if ($cqr[$j]=='1'){;?><td><input type="checkbox" name="camposqr[<?php  echo$j;?>]" value="1"><img src="../img/<?php  echo$icqr[$j];?>" width="25px">
<br/>
<?php  echo$ncqr[$j];?><br/>
<?php  echo$pqr[$j];?> &euro;/a&ntilde;o sin iva
</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>
<?php if (count($cp)!=$valorcp[0]){;?>
<table>
<tr><td><i>Tareas Programadas</i></td>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($cp[$j]=='1'){;?><td><input type="checkbox" name="camposp[<?php  echo$j;?>]" value="1"><img src="../img/<?php  echo$icp[$j];?>" width="25px">
<br/>
<?php  echo$ncp[$j];?><br/>
<?php  echo$pp[$j];?> &euro;/a&ntilde;o sin iva</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>

<?php if (count($cc)!=$valorcc[0]){;?>
<table>
<tr><td><i>Comunicaciones</i></td>
<?php  for ($j=0;$j<count($cc)+1;$j++){;?>
<?php if ($cc[$j]=='1'){;?><td><input type="checkbox" name="camposc[<?php  echo$j;?>]" value="1"><img src="../img/<?php  echo$icc[$j];?>" width="25px">
<br/>
<?php  echo$ncc[$j];?><br/>
<?php  echo$pc[$j];?> &euro;/a&ntilde;o sin iva
</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>
<?php if (count($ca)!=$valorca[0]){;?>
<table>
<tr><td><i>Avisos de Asistencia</i></td>
<?php  for ($j=0;$j<count($ca)+1;$j++){;?>
<?php if ($ca[$j]=='1'){;?><td><input type="checkbox" name="camposa[<?php  echo$j;?>]" value="1"><img src="../img/<?php  echo$ica[$j];?>" width="25px">
<br/>
<?php  echo$nca[$j];?><br/>
<?php  echo$pa[$j];?> &euro;/a&ntilde;o sin iva</td><?php };?>
<?php };?>
</tr></table>
<?php };?>
</ul>

		<li><b>Paquetes adicionales de trabajadores</b></li>
<ul>
<?php 		
$sqlemp="select * from precioempleados where idproyectos='".$idpr."' and estado='1'";
$resultemp=mysqli_query ($conn,$sqlemp) or die ("Invalid result precioempleados");
$rowemp=mysqli_affected_rows();
for ($j=0;$j<$rowemp;$j++){;
$nombregrupo=mysqli_result($resultemp,$j,'nombregrupo');
$numempleados=mysqli_result($resultemp,$j,'numempleados');
$preciogrupo=mysqli_result($resultemp,$j,'preciogrupo');
?>
<input type="radio" name="paqtrabajadores" value="<?php  echo$numempleados;?>" onclick="myFuncion22()"><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?>  &euro;/a&ntilde;o
<?php 
};
?>
<br/>
<input type="radio" name="paqtrabajadores" value="otros" onclick="myFuncion22()">Otros
<input type="number" name="numempleados" disabled> 
</ul>

<script>
function myFuncion22(){
	var valor=formulario22.paqtrabajadores.value;
	//alert (valor+" trabajadores");
	if (valor=='otros'){
	formulario22.numempleados.disabled=false;
		}else{;
	formulario22.numempleados.disabled=true;
	};
	
	};

function myFuncion23(){
	var valor=formulario22.paqclientes.value;
	//alert(valor+" clientes");
	if (valor=='otros'){
	formulario22.numclientes.disabled=false;
		}else{;
	formulario22.numclientes.disabled=true;
	};
	
	};

</script>		
		
		
		<li><b>Paquetes adicionales de clientes/puestos de trabajo</b></li>
<ul>
<?php 		
$sqlcli="select * from preciocliente where idproyectos='".$idpr."' and estado='1'";
$resultcli=mysqli_query ($conn,$sqlcli) or die ("Invalid result preciocliente");
$rowcli=mysqli_affected_rows();
for ($j=0;$j<$rowcli;$j++){;
$nombregrupo=mysqli_result($resultcli,$j,'nombregrupo');
$numclientes=mysqli_result($resultcli,$j,'numcliente');
$preciogrupo=mysqli_result($resultcli,$j,'preciogrupo');
?>
<input type="radio" name="paqclientes" value="<?php  echo$numclientes;?>" onclick="myFuncion23()"><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?>  &euro;/a&ntilde;o
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
$sqlperso="select * from preciopersonalizacion where idproyectos='".$idpr."' and estado='1'";
$resultperso=mysqli_query ($conn,$sqlperso) or die ("Invalid result precioperso");
$rowperso=mysqli_affected_rows();
for ($j=0;$j<$rowperso;$j++){;
$nombregrupo=mysqli_result($resultperso,$j,'nombregrupo');
$nomvar=mysqli_result($resultperso,$j,'nombrevariable');
$preciogrupo=mysqli_result($resultperso,$j,'preciogrupo');
?>
<input type="checkbox" name="nomvar[<?php  echo$j;?>]" value="1"><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?>  &euro;/a&ntilde;o
<?php 
};
?>
</ul>		
<br/>
		
		<input type="submit" name="submit" value="Seguir con la compra">
		
		</ul>
	</form>


</div>



</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

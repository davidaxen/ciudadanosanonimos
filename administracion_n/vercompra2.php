<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA SE HA ACABADO</p>
</div>



<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,6)"><div class="menup" id="menu1">Comprar</div></a></td>
</tr>
</table>
</div>

<div class="pos72" id="ver1" >


<h4>Estimado Cliente:</h4>
<h5>Ha seleccionado el siguiente Producto:</h5>

<?php 
$producto = "";
$precio = 0;

$camposqrp=array('accdiarias','accmantenimiento','productos','niveles','revision','envases');
$campospp=array('trabajo','siniestro','mediciones','control','alarma','ruta');
$camposcp=array('mensaje','incidenciasplus');
$camposap=array('cuadrante','jornadas');

$sqlopc="select * from precioproyectos where idproyectos='".$idpr."' and estado='1'";
$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
for($numqr=0;$numqr<count($camposqrp);$numqr++){;
$pqr[]=mysqli_result($resultopc,0,$camposqrp[$numqr]);
};
for($nump=0;$nump<count($campospp);$nump++){;
$pp[]=mysqli_result($resultopc,0,$campospp[$nump]);
};

for($numc=0;$numc<count($camposcp);$numc++){;
$pc[]=mysqli_result($resultopc,0,$camposcp[$numc]);
};

for($numa=0;$numa<count($camposap);$numa++){;
$pa[]=mysqli_result($resultopc,0,$camposap[$numa]);
};



$sql="select * from proyectos where idproyectos='".$idpr."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result menuproyectos");
for($numqr=0;$numqr<count($camposqrp);$numqr++){;
$cqr[]=mysqli_result($result,0,$camposqrp[$numqr]);
};
for($nump=0;$nump<count($campospp);$nump++){;
$cp[]=mysqli_result($result,0,$campospp[$nump]);
};

for($numc=0;$numc<count($camposcp);$numc++){;
$cc[]=mysqli_result($result,0,$camposcp[$numc]);
};

for($numa=0;$numa<count($camposap);$numa++){;
$ca[]=mysqli_result($result,0,$camposap[$numa]);
};






?>
<form action="comser.php" method="post">


	<ul>
	
		<li><b>Sistema</b></li>
	
		<input type="checkbox" readonly disabled checked value="basico">
		<input type="hidden" name="pbasico" checked value="1">
		Paquete b&aacute;sico: 
		<?php $pbasico=mysqli_result($resultopc,0,'pbasico');?> <?php  echo$pbasico;?> &euro;/a&ntilde;o sin iva
		<?php $precio=$precio+$pbasico;?>
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
for($numqr=0;$numqr<count($camposqrp);$numqr++){;
$ncqr[]=mysqli_result($result31,0,$camposqrp[$numqr]);
};
for($nump=0;$nump<count($campospp);$nump++){;
$ncp[]=mysqli_result($result31,0,$campospp[$nump]);
};

for($numc=0;$numc<count($camposcp);$numc++){;
$ncc[]=mysqli_result($result31,0,$camposcp[$numc]);
};

for($numa=0;$numa<count($camposap);$numa++){;
$nca[]=mysqli_result($result31,0,$camposap[$numa]);
};


$sql32="select * from proyectosimg where idproyectos='".$idpr."'";
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
for($numqr=0;$numqr<count($camposqrp);$numqr++){;
$icqr[]=mysqli_result($result32,0,$camposqrp[$numqr]);
};
for($nump=0;$nump<count($campospp);$nump++){;
$icp[]=mysqli_result($result32,0,$campospp[$nump]);
};

for($numc=0;$numc<count($camposcp);$numc++){;
$icc[]=mysqli_result($result32,0,$camposcp[$numc]);
};

for($numa=0;$numa<count($camposap);$numa++){;
$ica[]=mysqli_result($result32,0,$camposap[$numa]);
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
<?php if ($camposqr[$j]=='1'){;?><td><input type="hidden" name="<?php  echo$camposqrp[$j];?>" value="1">
<input type="checkbox" name="" value="1" checked disabled>
<img src="../img/<?php  echo$icqr[$j];?>" width="25px">
<br/><?php  echo$ncqr[$j];?> <?php  echo$pqr[$j];?></td>
<?php $precio=$precio+$pqr[$j];?>
<?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>



<?php if (count($cp)!=$valorcp[0]){;?>
<table>
<tr><td><i>Tareas Programadas</i></td>
<?php  for ($j=0;$j<count($cp)+1;$j++){;?>
<?php if ($camposp[$j]=='1'){;?><td><input type="hidden" name="<?php  echo$campospp[$j];?>" value="1">
<input type="checkbox" name="" value="1"  checked disabled>
<img src="../img/<?php  echo$icp[$j];?>" width="25px">
<br/><?php  echo$ncp[$j];?> <?php  echo$pp[$j];?></td>
<?php $precio=$precio+$pp[$j];?>
<?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>




<?php if (count($cc)!=$valorcc[0]){;?>
<table>
<tr><td><i>Comunicaciones</i></td>
<?php  for ($j=0;$j<count($cc)+1;$j++){;?>
<?php if ($camposc[$j]=='1'){;?><td><input type="hidden" name="<?php  echo$camposcp[$j];?>" value="1">
<input type="checkbox" name="" value="1" checked disabled>
<img src="../img/<?php  echo$icc[$j];?>" width="25px">
<br/><?php  echo$ncc[$j];?> <?php  echo$pc[$j];?></td>
<?php $precio=$precio+$pc[$j];?>
<?php };?>
<?php };?>
</tr></table>
<?php };?>
<br/>




<?php if (count($ca)!=$valorca[0]){;?>
<table>
<tr><td><i>Avisos de Asistencia</i></td>
<?php  for ($j=0;$j<count($ca)+1;$j++){;?>
<?php if ($camposa[$j]=='1'){;?><td><input type="hidden" name="<?php  echo$camposap[$j];?>" value="1">
<input type="checkbox" name="" value="1" checked disabled>
<img src="../img/<?php  echo$ica[$j];?>" width="25px">
<br/><?php  echo$nca[$j];?><br/><?php  echo$pa[$j];?></td>
<?php $precio=$precio+$pa[$j];?>
<?php };?>
<?php };?>
</tr></table>
<?php };?>
</ul>

		<li><b>Paquetes adicionales de trabajadores</b></li>
<ul>
<?php 	
if ($paqtrabajadores=='otros'){;
if($numempleados<=5){;
$nume=5;
}else{;
$nume=$numempleados;
};
$sqlemp="select * from precioempleados where idproyectos='".$idpr."' and estado='1' and numempleados<='".$nume."' order by numempleados desc";
$resultemp=mysqli_query ($conn,$sqlemp) or die ("Invalid result precioempleados");
$nombregrupo=strtoupper($paqtrabajadores).": numero de licencias adicionales ".$numempleados;
$numempleados2=mysqli_result($resultemp,0,'numempleados');
$preciog=mysqli_result($resultemp,0,'preciogrupo');
$preciogrupo=($preciog/$numempleados2)*$numempleados;
}else{;
$sqlemp="select * from precioempleados where idproyectos='".$idpr."' and estado='1' and numempleados='".$paqtrabajadores."'";
$resultemp=mysqli_query ($conn,$sqlemp) or die ("Invalid result precioempleados");
$nombregrupo=mysqli_result($resultemp,0,'nombregrupo');
$numempleados=mysqli_result($resultemp,0,'numempleados');
$preciogrupo=mysqli_result($resultemp,0,'preciogrupo');
};
?>
<input type="hidden" name="paqtrabajadores" value="<?php  echo$numempleados;?>">
<input type="radio" name="paqtrabajadores" value="<?php  echo$numempleados;?>" checked disabled><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?> &euro;/a&ntilde;o
<?php $precio=$precio+$preciogrupo;?>
</ul>


		<li><b>Paquetes adicionales de Clientes/Puestos de Trabajo</b></li>
<ul>
<?php 	
if ($paqclientes=='otros'){;
if($numclientes<=50){;
$numc=50;
}else{;
$numc=$numclientes;
};
$sqlcli="select * from preciocliente where idproyectos='".$idpr."' and estado='1' and numcliente<='".$numc."' order by numcliente desc";
$resultcli=mysqli_query ($conn,$sqlcli) or die ("Invalid result preciocliente");
$nombregrupo=strtoupper($paqclientes).": numero de licencias adicionales ".$numclientes;
$numclientes2=mysqli_result($resultcli,0,'numcliente');
$preciog=mysqli_result($resultcli,0,'preciogrupo');
$preciogrupoc=($preciog/$numclientes2)*$numclientes;
}else{;
$sqlcli="select * from preciocliente where idproyectos='".$idpr."' and estado='1' and numcliente='".$paqclientes."'";
$resultcli=mysqli_query ($conn,$sqlcli) or die ("Invalid result precioempleados");
$nombregrupo=mysqli_result($resultcli,0,'nombregrupo');
$numclientes=mysqli_result($resultcli,0,'numcliente');
$preciogrupoc=mysqli_result($resultcli,0,'preciogrupo');
};
?>
<input type="hidden" name="paqclientes" value="<?php  echo$numclientes;?>">
<input type="radio" name="paqclientes" value="<?php  echo$numclientes;?>" checked disabled><?php  echo$nombregrupo;?> - <?php  echo$preciogrupoc;?> &euro;/a&ntilde;o
<?php $precio=$precio+$preciogrupoc;?>
</ul>

		<li><b>Paquetes de Personalizaci&oacute;n</b></li>
<ul>
<?php 		
$sqlperso="select * from preciopersonalizacion where idproyectos='".$idpr."' and estado='1'";
$resultperso=mysqli_query ($conn,$sqlperso) or die ("Invalid result precioperso");
$rowperso=mysqli_affected_rows();
for ($j=0;$j<$rowperso;$j++){;
$nombregrupo=mysqli_result($resultperso,$j,'nombregrupo');
$preciogrupo=mysqli_result($resultperso,$j,'preciogrupo');
?>
<?php if ($nomvar[$j]=='1'){;?>
<input type="hidden" name="personalizacion" value="1">
<input type="checkbox" name="nomvar[<?php  echo$j;?>]" value="1" checked disabled><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?> &euro;/a&ntilde;o
<?php $precio=$precio+$preciogrupo;?>
<?php 
};
?>
<?php 
};
?>
</ul>		


	<h3>Precio sin IVA:	<?php  echo$precio;?> &euro;/a&ntilde;o</h3>
<?php 
$sqliva="select * from iva order by fecha desc";
$resultiva=mysqli_query ($conn,$sqliva) or die ("Invalid resultiva");
$jiva=0;
$iva=mysqli_result($resultiva,$jiva,'iva');
?>	
IVA aplicable: <?php  echo$iva;?>%<br/>
	<?php 
$precioiva=($precio*($iva/100))+$precio;
?>
<h3>Precio con IVA: <?php  echo$precioiva;?> &euro;/a&ntilde;o</h3> 
		</ul>

<?php 
$sqlpro="select * from proyectos where idproyectos='".$idpr."'";
$resultpro=mysqli_query ($conn,$sqlpro) or die ("Invalid resultpro");
$nombrepro=mysqli_result($resultpro,0,'nombre');
$producto=strtoupper($nombrepro).' con caracteristicas seleccionadas';

session_start();
$_SESSION["precio"] = $precioiva;
$_SESSION["producto"] = $producto;
//}




//echo $producto." ".$precioiva;

?>


<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>








</div>



</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

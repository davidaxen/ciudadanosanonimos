<?php 
$producto = "";
$precio = 0;

$camposqr=array('accdiarias','accmantenimiento','productos','niveles','revision','envases');
$camposp=array('trabajo','siniestro','mediciones','control','alarma','ruta');
$camposc=array('mensaje','incidenciasplus');
$camposa=array('cuadrante','jornadas');

$sqlopc="select * from precioproyectos where idproyectos='".$idpr."' and estado='1'";
$resultopc=$conn->query($sqlopc);
$resultadoopc=$resultopc->fetchAll();

//$resultopc=mysqli_query ($conn,$sqlopc) or die ("Invalid resultopc");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$pqr[]=$resultadoopc[0][$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$pp[]=$resultadoopc[0][$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$pc[]=$resultadoopc[0][$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$pa[]=$resultadoopc[0][$camposa[$numa]];
};

?>



	
<input type="hidden" name="tablas" value="modificaropc">
<input type="hidden" name="idcm" value="20">
<input type="hidden" name="ide" value="<?php  echo$ide;?>">
<input type="hidden" name="idpr" value="<?php $idpr;?>">	
	
	<ul>
	
		<li><b>Sistema</b></li>
	
		<input type="checkbox" readonly disabled checked value="basico">
		<input type="hidden" name="pbasico" checked value="1">
		Paquete básico: 
		<?php $pbasico=$resultadoopc[0]['pbasico'];?> <?php  echo$pbasico;?> €/año sin iva
		<?php $precio=$precio+$pbasico;?>
		<br>
		<ul>
		<?php $tbasico=$resultadoopc[0]['tbasico'];?> 
		<?php  echo$tbasico;?> 
		</ul>
	<li><b>Servicios</b></li>

<?php 

$sql="select * from proyectos where idproyectos='".$idpr."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result menuproyectos");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$cqr[]=$resultado[0][$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$cp[]=$resultado[0][$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$cc[]=$resultado[0][$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$ca[]=$resultado[0][$camposa[$numa]];
};


$sql31="select * from proyectosnombre where idproyectos='".$idpr."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetchAll();
//$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$ncqr[]=$resultado31[0][$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$ncp[]=$resultado31[0][$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$ncc[]=$resultado31[0][$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$nca[]=$resultado31[0][$camposa[$numa]];
};


$sql32="select * from proyectosimg where idproyectos='".$idpr."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetchAll();
//$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
for($numqr=0;$numqr<count($camposqr);$numqr++){;
$icqr[]=$resultado32[0][$camposqr[$numqr]];
};
for($nump=0;$nump<count($camposp);$nump++){;
$icp[]=$resultado32[0][$camposp[$nump]];
};

for($numc=0;$numc<count($camposc);$numc++){;
$icc[]=$resultado32[0][$camposc[$numc]];
};

for($numa=0;$numa<count($camposa);$numa++){;
$ica[]=$resultado32[0][$camposa[$numa]];
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
<?php if ($camposqr[$j]=='1'){;?><td><input type="checkbox" name="<?php  echo$camposqr[$j];?>" value="1" checked disabled><img src="../img/<?php  echo$icqr[$j];?>" width="25px">
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
<?php if ($camposp[$j]=='1'){;?><td><input type="checkbox" name="<?php  echo$camposp[$j];?>" value="1"  checked disabled>><img src="../img/<?php  echo$icp[$j];?>" width="25px">
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
<?php if ($camposc[$j]=='1'){;?><td><input type="checkbox" name="<?php  echo$camposc[$j];?>" value="1" checked disabled><img src="../img/<?php  echo$icc[$j];?>" width="25px">
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
<?php if ($camposa[$j]=='1'){;?><td><input type="checkbox" name="<?php  echo$camposa[$j];?>" value="1" checked disabled><img src="../img/<?php  echo$ica[$j];?>" width="25px">
<br/><?php  echo$nca[$j];?><br/><?php  echo$pa[$j];?></td>
<?php $precio=$precio+$pa[$j];?>
<?php };?>
<?php };?>
</tr></table>
<?php };?>
</ul>





		<li><b>Paquetes adicionales de trajadores</b></li>
<ul>
<?php 		
$sqlemp="select * from precioempleados where idproyectos='".$idpr."' and estado='1'";
$resultemp=$conn->query($sqlemp);


/*$resultemp=mysqli_query ($conn,$sqlemp) or die ("Invalid result precioempleados");
$rowemp=mysqli_affected_rows();
for ($j=0;$j<$rowemp;$j++){;*/
foreach ($resultemp as $rowempmos) {
$nombregrupo=$rowempmos['nombregrupo'];
$numempleados=$rowempmos['numempleados'];
$preciogrupo=$rowempmos['preciogrupo'];
?>
<input type="radio" name="paqtrabajadores" value="<?php  echo$numempleados;?>" onclick="myFuncion22()"><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?> €/año
<?php 
};
?>
<br/>
<input type="radio" name="paqtrabajadores" value="otros" onclick="myFuncion22()">Otros
<input type="number" name="numempleados" disabled> 
</ul>

		
		
		<li><b>Paquetes adicionales de clientes/puestos de trabajo</b></li>
<ul>
<?php 		
$sqlcli="select * from preciocliente where idproyectos='".$idpr."' and estado='1'";
$resultcli=$conn->query($sqlcli);
/*$resultcli=mysqli_query ($conn,$sqlcli) or die ("Invalid result preciocliente");
$rowcli=mysqli_affected_rows();
for ($j=0;$j<$rowcli;$j++){;*/
foreach ($resultcli as $rowclimos) {
$nombregrupo=$rowclimos['nombregrupo'];
$numclientes=$rowclimos['numcliente'];
$preciogrupo=$rowclimos['preciogrupo'];
?>
<input type="radio" name="paqclientes" value="<?php  echo$numclientes;?>" onclick="myFuncion23()"><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?> €/año
<?php 
};
?>
<br/>
<input type="radio" name="paqclientes" value="otros" onclick="myFuncion23()">Otros
<input type="number" name="numclientes" disabled> 		
</ul>

		<li><b>Paquetes de Personalización</b></li>
<ul>
<?php 		
$sqlperso="select * from preciopersonalizacion where idproyectos='".$idpr."' and estado='1'";
$resultperso=$conn->query($sqlperso);

/*$resultperso=mysqli_query ($conn,$sqlperso) or die ("Invalid result precioperso");
$rowperso=mysqli_affected_rows();
for ($j=0;$j<$rowperso;$j++){;*/
foreach ($resultperso as $rowpersomos) {
$nombregrupo=$rowpersomos['nombregrupo'];
$nomvar=$rowpersomos['nombrevariable'];
$preciogrupo=$rowpersomos['preciogrupo'];
?>
<?php if ($nomvar=='1'){;?><input type="checkbox" name="<?php  echo$nomvar;?>" value="1" checked disabled><?php  echo$nombregrupo;?> - <?php  echo$preciogrupo;?> €/año
<?php $precio=$precio+$pa[$j];?>
<?php 
};
?>
</ul>		
<br/>


	<br/>
	<h3>Precio sin IVA:	<?php  echo$precio;?> €/año</h3>
<?php 
$sqliva="select * from iva order by fecha desc";
$resultiva=$conn->query($sqliva);
$resultadoiva=$resultiva->fetchAll();
//$resultiva=mysqli_query ($conn,$sqliva) or die ("Invalid resultiva");
$jiva=0;
$iva=$resultadoiva[$jiva]['iva'];
?>	
IVA aplicable: <?php  echo$iva;?>%<br/>
	<?php 
$precioiva=($precio*($iva/100))+$precio;
?>
<h3>Precio con IVA: <?php  echo$precioiva;?> €/año</h3> 
		</ul>

<?php 
session_start();
//if (!$_SESSION["precio"] && !$_SESSION["producto"]){
$_SESSION["precio"] = $precioiva;
$_SESSION["producto"] = $producto;
//}




//echo $producto." ".$precio;

?>

<form action="comser.php" method="post">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>


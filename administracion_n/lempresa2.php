<?php  
include('bbdd.php');

if ($ide!=null){;
$ic="iconos/empresa.png";
$nc="Empresas";

if ($estador==null){
$estador=1;
};

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">LISTADO DE EMPRESAS
<?php
if ($estador==1){;
echo "ALTA";
}else{;
echo "BAJA";
};
?>
</p>
</div>
<div class="contenido">

<?php 
$datos="datos";


if ($datos!='datos'){;
?>
<form method="post" action="lempresa2.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;


$sqlp="select * from proyectos where gestorproyecto='".$ide."' order by idproyectos asc"; 
$resultp=$conn->query($sqlp);
$resultpmos1=$conn->query($sqlp);
$resultpmos2=$conn->query($sqlp);
$resultadoprow=$resultp->fetchAll();
$rowp=count($resultadoprow);

/*$resultp=mysqli_query ($conn,$sqlp) or die ("Invalid result idproyectos");
$rowp=mysqli_num_rows($resultp);*/




$sql="SELECT * from empresas where estado='".$estador."' ";
if ($rowp>0){;
$sql.=" and idproyectos ";
if ($rowp==1){
	$resultadop=$resultpmos1->fetch();
	//$resultadop=mysqli_fetch_array($resultp);
	$idprt=$resultadop['idproyectos'];
$sql.=" ='".$idprt."'";	
	}else{;
$sql.=" in (";		
	/*for ($j=0;$j<$rowp;$j++){
	mysqli_data_seek($resultp,$j);
	$resultadop=mysqli_fetch_array($resultp);*/
	foreach ($resultpmos2 as $rowpmos) {
	$idprt=$rowpmos['idproyectos'];		
		$sql.=$idprt;
		$t=$j+1;
		if($t<$rowp){
		$sql.=",";	
			}
		
		}		
$sql.=")";		
		};

};


$sql.=" order by idempresas asc"; 
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<table><tr><td><?php include ('../js/busqueda.php');?></td>

<?php if ($estador==1){;?>
<td width="150px" align="center"><a href="lempresa2.php?tipo=<?php  echo $tipo;?>&estador=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lempresa2.php?tipo=<?php  echo $tipo;?>&estador=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>


<td width="150px" align="center"><a href="iempresa2.php">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>


<td width="150px" align="center"><a href="lcempresa2.php">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Comprobacion de Uso <br/><?php  echo strtoupper($nc);?></span>
</a></td>

</tr>
</table>


<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nº Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Dom.</td><td>Loc.</td><td>CP.</td><td>Nº Cuenta</td><td>Logotipo</td></tr>
</thead>
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempresas=$rowmos['idempresas'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$domicilio=$rowmos['domicilio'];
$localidad=$rowmos['localidad'];
$cp=$rowmos['cp'];
$ncc=$rowmos['ncc'];
$logotipo=$rowmos['logotipo'];
?>
<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($nif);?></td>
<td><?php  echo strtoupper($domicilio);?></td>
<td><?php  echo strtoupper($localidad);?></td>
<td><?php  echo strtoupper($cp);?></td>
<td><?php  echo strtoupper($ncc);?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>
<td><a href="modempresa.php?idempresas=<?php echo $idempresas;?>"><img src="../img/iconlis.png" border="0" width="25px"></a></td>
<td><a href="modiconos.php?idempresas=<?php echo $idempresas;?>"><img src="../img/iconos/iconos.png" border="0" width="25px"></a></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

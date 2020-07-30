<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE EMPRESAS</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>

<form method="post" action="mempresa2.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estador">
<option value="todas">Todas</option>
<option value=0>Baja</option>
<option value=1>Alta</option>
</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>

<?php 
}else{;


$sqlp="select * from proyectos where gestorproyecto='".$ide."' order by idproyectos asc"; 
$resultp=mysqli_query ($conn,$sqlp) or die ("Invalid result idproyectos");
$rowp=mysqli_num_rows($resultp);


$sql="SELECT * from empresas where";

if($estador!="todas"){;
$sql.=" estado='".$estador."' and";
};
if ($rowp>0){;
$sql.=" idproyectos ";
if ($rowp==1){
	$resultadop=mysqli_fetch_array($resultp);
	$idprt=$resultadop['idproyectos'];
$sql.=" ='".$idprt."'";	
	}else{;
$sql.=" in (";		
	for ($j=0;$j<$rowp;$j++){
		mysqli_data_seek($resultp,$j);
	$resultadop=mysqli_fetch_array($resultp);
	$idprt=$resultadop['idproyectos'];		
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
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?php 
switch($estador){;
case "todas": $tdf="";break;
case 0: $tdf="Baja";break;
case 1: $tdf="Alta";break;
};
?>
<h4>Listado de Empresas <?php  echo$tdf;?></h4>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="subenc"><td>Nº Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Logotipo</td><td>Opciones</td></tr>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
?>
<tr class="menor1">
<td><?php $idempresas=$resultado['idempresas'];?><?php  echo$idempresas;?></td>
<td><?php $nombre=$resultado['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$resultado['nif'];?><?php  echo$nif;?></td>
<td><?php $logotipo=$resultado['logotipo'];?><img src="../img/<?php  echo$logotipo;?>" width="50"></td>
<td><a href="modempresa.php?idempresas=<?php  echo$idempresas;?>"><img src="../img/modificar.gif" border="0"></a></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

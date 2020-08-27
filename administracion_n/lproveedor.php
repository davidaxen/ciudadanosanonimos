<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['proveedor'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['proveedor'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?> 
<?php 
switch($estadoe){;
case null: echo  "";break;
case 0: echo  "<font color='red'>Baja</font>";break;
case 1: echo  "<font color='green'>Alta</font>";break;
};
?>
</p></div>
<div class="contenido">

<?php if ($datos!='datos'){;?>
<form method="post" action="lproveedor.php">
<table>
<input type="hidden" name="datos" value="datos">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
<tr><td>Estado de Puestos de Trabajo</td><td><select name="estadoe">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
</table>
<?php 
}else{;

$sql="SELECT * from proveedores where idempresas='".$ide."' and estado='".$estadoe."'";
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultado=$result->fetchAll();
$row=count($resultado);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<!--<a href="pdfcartt.php?dato=todo">Carta para todos los clientes</a><br/>-->

<?php  
if ($row==0){
echo  "No tiene ning&uacuten proveedor dado de ";
?>
<?php if ($estadoe=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?>
<?php 
}else{
	?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Nº Proveedor</td><td>Nombre Proveedor</td><td>NIF</td><td>Telefono</td><td>E-mail</td></tr>

<?php 
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idproveedor=$rowmos['idproveedor'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$telefonop=$rowmos['telefono'];
$emailp=$rowmos['email'];
?>
<tr class="dattab">
<td><?php  echo $idproveedor;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $telefonop;?></td>
<td><?php  echo $emailp;?></td>
</tr>

<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
<?php };?>
<?php };?>

<?php } else {;

include ('../cierre.php');

 };
 ?>

<?php  
include('bbdd.php');

if ($idempresas!=null){;
 include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php');  
 ?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<div class="contenido"  style="padding-left:10px">


<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="titulos">



<?php 
$sql02="SELECT * from menuadministracion where idempresa='".$ide."' and user='".$gente."'"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result admin02");
$resultado02=mysqli_fetch_array($result02);

$sql="SELECT * from menuadministracionimg where idempresa='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result admin");
$resultado=mysqli_fetch_array($result);

$sql01="SELECT * from menuadministracionnombre where idempresa='".$ide."'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result admin01");
$resultado01=mysqli_fetch_array($result01);


$dat=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos');

?>

<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;">  Titulos Administracion
</div>
<div class="panel" style="column-count:2;">

<?php 
for ($t=0;$t<count($dat);$t++){;

$servi=$resultado02[$dat[$t]];
  if ($servi==1){;?>
<span>
<table>
<tr>
<td width="100px">
<?php $encab=$resultado01[$dat[$t]];?>
<?php  echo $encab;?>
</td>
<td>
<input type="hidden" name="encadminant<?php  echo $t;?>" value="<?php echo $encab;?>">
<input type="text" name="encadmin<?php  echo $t;?>" value="<?php echo $encab;?>">
</td>
</tr>



</table></span>

<?php };?>

<?php };?>



</div>








<?php 
$sql02="SELECT * from menuservicios where idempresa='".$ide."' and user='".$gente."'"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result iconos02");
$resultado02=mysqli_fetch_array($result02);

$sql="SELECT * from menuserviciosimg where idempresa='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result iconos ");
$resultado=mysqli_fetch_array($result);

$sql01="SELECT * from menuserviciosnombre where idempresa='".$ide."'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result iconos01");
$resultado01=mysqli_fetch_array($result01);

$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');


?>

<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;">  Titulos Servicios
</div>
<div class="panel" style="column-count:2;">

<?php 
for ($t=0;$t<count($dat);$t++){;

$servi=$resultado02[$dat[$t]];
  if ($servi==1){;?>
<span>
<table>
<tr>
<td width="100px">
<?php $encab=$resultado01[$dat[$t]];?>
<?php  echo $encab;?>
</td>
<td>
<input type="hidden" name="enciconosant<?php  echo $t;?>" value="<?php echo $encab;?>">
<input type="text" name="enciconos<?php  echo $t;?>" value="<?php echo $encab;?>">
</td>
</tr>



</table></span>

<?php };?>

<?php };?>


</div>







<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>

</form>

<?php  include ('../js/acordeonjs.php');?>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
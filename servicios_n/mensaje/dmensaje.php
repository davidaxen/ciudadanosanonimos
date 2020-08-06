<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<table><tr><td><?php include ('../../js/busqueda.php');?></td>
<td>
<div class="main">

<?php if ($dat=="h"){;?>
<a href="dpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Creacion</span></a>
</td></tr>
</table>

<?php
$fechac=date('Y/m/d',time());
?>
<p>
Listado de <?php echo ucfirst($nc);?>
<table class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Fecha Finalizacion</td><td>Texto</td><td>Opciones</td></tr>
<?php 
$sql="SELECT * from mensajes where idempresa='".$ide."' and fechafin>'".$fechac."' or fechafin is null order by fechafin desc";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idmensaje=$rowmos['id'];
$fechafin=$rowmos['fechafin'];
$texto=$rowmos['texto'];

?>
<tr class="dattab"><td><?php  echo $fechafin;?></td><td><?php  echo $texto;?></td><td>
<?php
$sql10="SELECT * from respuestamensajes where idempresa='".$ide."' and idmensaje='".$idmensaje."'";
//echo $sql10;
$result10=$conn->query($sql10);
$row10=count($result10->fetchAll());

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
$row10=mysqli_num_rows($result10);*/
if ($row10==0){;?>
<a href="modmensaje.php?id=<?php echo $idmensaje;?>"><img src="../../img/pencil.png" width="25px"></a>
<?php };?>
</td>
</tr>

<?php };?>

</table>
<?php };?>

<?php if ($dat=="i"){;?>
</table>
<?php
$fechac=date('Y/m/d',time());
?>
<p>
Listado de <?php echo ucfirst($nc);?>
<table class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Fecha Finalizacion</td><td>Texto</td><td>Opciones</td></tr>
<?php 
$sql="SELECT * from mensajes where idempresa='".$ide."' and fechafin>'".$fechac."' or fechafin is null order by fechafin desc";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idmensaje=$rowmos['id'];
$fechafin=$rowmos['fechafin'];
$texto=$rowmos['texto'];

?>
<tr class="dattab"><td><?php  echo $fechafin;?></td><td><?php  echo $texto;?></td><td>
<?php
$sql10="SELECT * from respuestamensajes where idempresa='".$ide."' and idmensaje='".$idmensaje."'";
//echo $sql10;
$result10=$conn->query($sql10);
$row10=count($result10->fetchAll());

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
$row10=mysqli_num_rows($result10);*/
?>
<a href="infpuntcont.php?id=<?php echo $idmensaje;?>"><img src="../../img/pencil.png" width="25px"></a>
</td>
</tr>

<?php }; ?>

</table>

<?php }; ?>







</div>

</div>


<?php } else {;
include ('../../cierre.php');
 }; ?>

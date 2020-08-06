<?php 
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);

	$result31=$conn->query($sql31);
	$resultado31=$result31->fetch();
	$nc=$resultado31['empleados'];
    //$result2mos1=$conn->query($sql2);
    //$fetchAll2=$result2->fetchAll();
    //$row2=count($fetchAll2);


$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
	$result32=$conn->query($sql32);
	$resultado32=$result32->fetch();
	$ic=$resultado32['empleados'];


include('../portada_n/cabecera2.php');

if (isset($estadoe)==false){
$estadoe=null;
}
?>

<style>
tr:nth-child(even) {
  background-color: #f2f2f2;
}
/*
tr:nth-child(odd) {
  background-color: #fff;
}
*/
</style>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?> <?php if ($estadoe=="0"){;?>DE BAJA<?php };?><?php if ($estadoe=="1"){;?>DE ALTA<?php };?></p></div>
<div class="contenido">


<?php if ($estadoe==null){;?>
<form action="lempleados.php" method="post">
<table>
<tr><td>Estado</td><td>
<select name="estadoe">
<option value="todos">Todos
<option value="1">Alta
<option value="0">Baja
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>


<?php 

if (isset($smart)==false){
$smart=null;
}


$sql1="SELECT * from empleados";
$sql1.=" where idempresa='".$ide."' ";
if ($estadoe!='todos'){;
$sql1.=" and estado='".$estadoe."' ";
};
$sql1.=" order by idempleado asc";
//echo $sql1;

	$result=$conn->query($sql1);
	$resultmos=$conn->query($sql1);
	$num_rows=$result->fetchAll();
	$row=count($num_rows);
//$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$row=mysqli_num_rows($result);
?>
<table><tr><td><?php include ('../js/busqueda.php');?></td>

<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="lempleados2.php?tipo=<?php  echo $tipo;?>&estadoe=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lempleados2.php?tipo=<?php  echo $tipo;?>&estadoe=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>


<td width="150px" align="center"><a href="iempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>
<!--
<td width="150px" align="center"><a href="fempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a></td>
-->
</tr>
</table>




<?php if ($smart!='si'){;?>
<a href="pdfcartt.php?dato=todo">Carta para todos los empleados</a>
<?php };?>



<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab">
<td>Id</td><td>E-mail</td><td>Pais</td><td>Localidad</td><td>Provincia</td><td>Código Postal</td>
</tr>
</thead>


<?php 

foreach ($resultmos as $row1) {
	$idempleado=$row1['idempleado'];
	$email1=$row1['email1'];
	$pais=$row1['nacionalidad'];
	$localidad=$row1['localidad'];
	$provincia=$row1['provincia'];
	$cp=$row1['cp'];
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
?>
<tr class="dattab">
<?php 
//$idempleado=$resultado['idempleado'];
//$email1=$resultado['email1'];
//$pais=$resultado['nacionalidad'];
//$localidad=$resultado['localidad'];
//$provincia=$resultado['provincia'];
//$cp=$resultado['cp'];
?>
<td><?php  echo strtoupper($idempleado);?></td>
<td><?php  echo strtoupper($email1);?></td>
<td><?php  echo strtoupper($pais);?></td>
<td><?php  echo strtoupper($localidad);?></td>
<td><?php  echo strtoupper($provincia);?></td>
<td><?php  echo strtoupper($cp);?></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>

<?php };?>


<?php }else{;
include ('../cierre.php');
 };?>

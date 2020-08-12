<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">LISTADO DE EMPRESAS QUE HAN SOLICITADO PRUEBA</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lvalidar.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Empresas</td><td><select name="estadovalidar">
<option value="todos">Todos
<option value="0">Sin validar
<option value="1">En prueba
<option value="2">En contrato
<option value="3">Sin contrato
</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>

<?php 
}else{;

$sql="SELECT * from validar"; 
if($estadovalidar!="todos"){;
$sql.=" where validar=:estadovalidar"; 
};
$sql.=" order by idvalidar asc"; 
//echo $sql;

$result=$conn->prepare($sql);
$resultmos=$conn->prepare($sql);
$result->bindParam(':estadovalidar',$estadovalidar);
$result->execute();
//$resultado11r=$result11r->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="enctab">
<?php if ($estadovalidar=="todos"){;?>
<td>Tipo</td>
<?php };?>
<td>Nº Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Per.Con.</td><td>Tel.Con.</td><td>Email</td><td>Proyecto</td></tr>
<?php 

foreach ($resultmos as $row1) {


//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
$validar=$row1['validar'];
$idvalidar=$row1['idvalidar'];
$nombreemp=$row1['nombreemp'];
$nifemp=$row1['nifemp'];
$percontacto=$row1['percontacto'];
$telcontacto=$row1['telcontacto'];
$emailemp=$row1['email'];
$idpremp=$row1['idpr'];


?>
<tr class="dattab">
<?php if ($estadovalidar=="todos"){;?>
<td>
<?php 
switch($validar){;
case 0:$nvalidar="Sin validar";break;
case 1:$nvalidar="En pruebas";break;
case 2:$nvalidar="En contrato";break;
case 3:$nvalidar="Sin contrato";break;
};
?>
<?php  echo$nvalidar;?>
</td>
<?php };?>
<td><?php  echo$idvalidar;?></td>
<td><?php  echo$nombreemp;?></td>
<td><?php  echo$nifemp;?></td>
<td><?php  echo$percontacto;?></td>
<td><?php  echo$telcontacto;?></td>
<td><?php  echo$email;?></td>
<td>
<?php 
$sqli="SELECT * from proyectos where idproyectos=:idpremp"; 


$resulti=$conn->prepare($sqli);
$resulti->bindParam(':idpremp',$idpremp);
$resulti->execute();
$resultadoi=$resulti->fetch();

//$resulti=mysqli_query ($conn,$sqli) or die ("Invalid resulti");
//$resultadoi=mysqli_fetch_array($resulti);
$logopremp=$resultadoi['logo'];
?>
<img src="images/<?php  echo$logopremp;?>" width="50">

</td>

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

<?php  
include('bbdd.php');

if ($ide!=null){;
include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ADMINISTRADORES</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>

<table>
<form method="post" action="musuario.php">


<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from usuariost where idempresa='".$ide."' and estado='".$estado."'";
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultado=$result->fetchAll();
$row=count($resultado);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<?php if ($row==0){?>
Si usuarios
<?php }else{;?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="subenc"><td>Nº Usuario</td><td>Nombre Usuario</td><td>NIF</td><td>Doc.</td>
</tr>
<?php };

/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
?>
<tr class="menor1">
<td><?php $idclientes=$rowmos['idusuario'];?><?php  echo$idclientes;?></td>
<td><?php $nombre=$rowmos['nombre'];?><?php  echo$nombre;?></td>
<td><?php $nif=$rowmos['nif'];?><?php  echo$nif;?></td>
<td>
<a href="modusuario.php?nif=<?php  echo$nif;?>">
<img src="../img/modificar.gif" border=0></a>
</td>


</tr>
<?php };?>
</table>

<?php };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
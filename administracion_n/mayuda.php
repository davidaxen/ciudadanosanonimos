<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">MODIFICACION DE AYUDA</p>
</div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="mayuda.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Menu</td><td><select name="menu">
<option value="1">Administrar
<option value="2">Generador
<option value="3">Herramientas
<option value="4">Mi cuenta
<option value="5">Ayuda
</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from ayuda where menu='".$menu."' order by seccion asc,subseccion asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);

switch($menu){;
case '1':$valormenu="Administrar";break;
case '2':$valormenu="Generador";break;
case '3':$valormenu="Herramientas";break;
case '4':$valormenu="Mi cuenta";break;
case '5':$valormenu="Ayuda";break;
};
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr><td>Menu</td><td colspan="3"><h3><?php  echo$valormenu;?></h3></td></tr>

<tr class="enctab">
<td width="100">Opciones</td>
<td>Modulo</td><td>Seccion</td><td>Texto</td></tr>
<?php 
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$seccion=$resultado['seccion'];
$subseccion=$resultado['subseccion'];
$titulo=$resultado['titulo'];
?>
<tr class="dattab">
<td>
<a href=""><img src="../img/papelera.gif"></a>
<a href=""><img src="../img/modificar.gif"></a>
</td>
<td><?php  echo$seccion;?></td>
<td><?php  echo$subseccion;?></td>
<td><?php  echo$titulo;?></td>
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

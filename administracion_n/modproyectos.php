<?php  
include('bbdd.php');

if ($idproyectos!=null){;
include('../portada_n/cabecera2.php');
include('../estilo/acordeon.php');
?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PROYECTOS</p>
</div>
<div class="contenido"  style="padding-left:10px">

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificarproyectos">
<input type="hidden" name="idproyectos" value="<?php  echo $idproyectos;?>">

<?php 
$sql="SELECT * from proyectos where idproyectos='".$idproyectos."'";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
$web=$resultado['web'];
$diasprueba=$resultado['diasprueba'];
$estadop=$resultado['estado'];
$gestorp=$resultado['gestorproyecto'];

$colorfp=$resultado['colorfondo'];
$colorap=$resultado['colorarriba'];
$colorlp=$resultado['colorlateral'];
$colorcp=$resultado['colorcentral'];

$pagweb=$resultado['pagina'];
?>




<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Proyecto
</div>
<div class="panel">

<input type="hidden" name="nombrea[0]" value="nombre">
<input type="hidden" name="nombrea[1]" value="diasprueba">
<input type="hidden" name="nombrea[2]" value="web">
<input type="hidden" name="nombrea[3]" value="estado">
<input type="hidden" name="nombrea[4]" value="gestorproyecto">
<input type="hidden" name="nombrea[5]" value="pagina">

<input type="hidden" name="datosa[0]" value="<?php  echo $nombre;?>">
<input type="hidden" name="datosa[1]" value="<?php  echo $diasprueba;?>">
<input type="hidden" name="datosa[2]" value="<?php  echo $web;?>">
<input type="hidden" name="datosa[3]" value="<?php  echo $estadop;?>">
<input type="hidden" name="datosa[4]" value="<?php  echo $gestorp;?>">

<input type="hidden" name="colora[0]" value="<?php  echo $colorfp;?>">
<input type="hidden" name="colora[1]" value="<?php  echo $colorap;?>">
<input type="hidden" name="colora[2]" value="<?php  echo $colorlp;?>">
<input type="hidden" name="colora[3]" value="<?php  echo $colorcp;?>">


<table>

<tr><td>
<table>
<tr><td>Nombre del Proyecto</td><td>
<input type="text" name="datosn[0]" value="<?php  echo $nombre;?>" size="100"></td></tr>

</table>
</td></tr>

<?php 
$sqle="SELECT * from empresas where estado='1'";
$resulte=$conn->query($sqle);
/*$resulte=mysqli_query ($conn,$sqle) or die ("Invalid result");
$rowe=mysqli_num_rows($resulte);*/
?>
<tr><td>
<table>
<tr><td>Empresa Gestora del Proyecto</td><td>
<select name="datosn[4]">
<?php if ($gestorp==null){;?>
<option value="">Elige un gestor</option>
<?php };?>

<?php
/*for($t=0;$t<$rowe;$t++){;
mysqli_data_seek($resulte,$t);
$resultadoe=mysqli_fetch_array($resulte);*/
foreach ($resulte as $rowemos) {
$idemp=$rowemos['idempresas'];
$nombreemp=$rowemos['nombre'];
?>
<option value="<?php echo $idemp;?>" <?php if ($idemp==$gestorp){;?>selected<?php };?> ><?php echo strtoupper($nombreemp);?></option>
<?php
};
?>


</select>

</td></tr>

</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Dias de Prueba</td><td>
<input type="text" name="datosn[1]" value="<?php  echo $diasprueba;?>" size="3"></td>
<td>Estado</td><td>
<select name="datosn[3]">
<option value="0" <?php if ($estadop=='0'){;?>selected<?php };?> >Baja
<option value="1" <?php if ($estadop=='1'){;?>selected<?php };?> >Alta
</select>
</td>
<td>Web</td><td>
<input type="text" name="datosn[2]" size="50"  value="<?php  echo $web;?>"></td>
</tr>
</table>
</td></tr>
</table>

<span>Logotipo web&nbsp;<a href="../img/pl_logo.psd">Plantilla</a>&nbsp;<input type="file" name="logotipo"></span><br/>
<span>Boton de Descarga&nbsp;<a href="../img/pl_boton.psd">Plantilla</a>&nbsp;<input type="file" name="botonddescarga"></span><br/>
<span>Logotipo para paypal&nbsp;<a href="../img/pl_paypal.psd">Plantilla</a>&nbsp;<input type="file" name="logopaypal"></span><br/>
<span>Color Fondo&nbsp;<input type="text" name="colorn[0]" value="<?php  echo $colorfp;?>">Color Arriba</a>&nbsp;<input type="text" name="colorn[1]" value="<?php  echo $colorap;?>"></span><br/>
<span>Color Lateral&nbsp;<input type="text" name="colorn[2]" value="<?php  echo $colorlp;?>">Color Central</a>&nbsp;<input type="text" name="colorn[3]" value="<?php  echo $colorcp;?>"></span>

</div>


<?php 
$encab=array('Clientes','Gestores','Empleados','Empresas','Empresa','Usuarios','Visitas','Proveedores','Puestos de Trabajo','Vecinos');
$dat=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos','vecinos');
?>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;">  Opciones Administrar
</div>
<div class="panel"  style="column-count:3">


<?php 
$sql1="SELECT * from proyectosadministrar where idproyectos='".$idproyectos."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);*/


for ($t=0;$t<count($encab);$t++){;?>

<span>
<?php 
$datosaa=$resultado1[$dat[$t]];
?>
<input type="hidden" name="nombreaa[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">
<input type="hidden" name="datosaa[<?php  echo $t;?>]"  value="<?php  echo $datosaa;?>">
<input type="checkbox" name="datosan[<?php  echo $t;?>]" value="1"  <?php if($datosaa==1){;?> checked="checked" <?php };?>  >
&nbsp;
<?php  echo $encab[$t];?>
</span>
<br/>
<?php };?>




</div>


<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;">  Iconos Administrar
</div>
<div class="panel" style="column-count:2">

<?php for ($t=0;$t<count($encab);$t++){;?>
<span><table><tr><td width="100px"><?php  echo $encab[$t];?></td><td><input type="file" name="imgiconosa<?php  echo $t;?>"></td></tr></table></span>
<?php };?>
</div>


<div class="accordion">
<img src="../img/iconos/titulos.png" width="32px" style="vertical-align:middle;">  Titulos Administrar
</div>
<div class="panel" style="column-count:2">

<?php 
$sql1="SELECT * from proyectosnombreadm where idproyectos='".$idproyectos."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);*/
 
for ($t=0;$t<count($encab);$t++){;
$tituloaa=$resultado1[$dat[$t]];
if($tituloaa==null){;
$tituloaa=$encab[$t];
};
?>
<input type="hidden" name="tituloaa[<?php  echo $t;?>]"  value="<?php  echo $tituloaa;?>">
<input type="hidden" name="nombretaa[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">


<span>
<table><tr><td width="100px">
<?php  echo $encab[$t];?>
</td><td>
<input type="text" name="tituloan[<?php  echo $t;?>]" size="20" value="<?php  echo $tituloaa;?>">
</td></tr></table>
</span>

<?php };?>



</div>






<?php 
$encab=array('Cuadrante','Entrada / Salida','Incidencia','Mensajes','Alarmas','Tareas Habituales','Tareas Adicionales','Parametros','Existencias','Circuito','Trabajo','Ordenes','Control','Lecturas','Jornadas','Informes','Ruta','Envases','Incidencias +');
$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');
?>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;">  Opciones Herramientas
</div>
<div class="panel"  style="column-count:3">


<?php for ($t=0;$t<count($encab);$t++){;?>

<span>
<?php 
$datosha=$resultado[$dat[$t]];
?>
<input type="hidden" name="nombreha[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">
<input type="hidden" name="datosha[<?php  echo $t;?>]"  value="<?php  echo $datosha;?>">

<?php  
switch($t){;
case 1:
?>
<input type="hidden" name="datoshn[<?php  echo $t;?>]"  value="1"><input type="checkbox"  disabled="disabled" checked="checked">
<?php 
;break;
case 2:
?>

<input type="hidden" name="datoshn[<?php  echo $t;?>]"  value="1"><input type="checkbox"  disabled="disabled" checked="checked">
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="checkbox" name="datoshn[<?php  echo $t;?>]" value="1"  <?php if($datosha==1){;?> checked="checked" <?php };?>  >
<?php 
;break;
default:
?>
<input type="checkbox" name="datoshn[<?php  echo $t;?>]"  value="1" <?php if($datosha==1){;?> checked="checked" <?php };?>>
<?php 
};
?>
&nbsp;
<?php  echo $encab[$t];?>
</span>
<br/>
<?php };?>




</div>


<div class="accordion">
<img src="../img/iconos/fotos.png" width="32px" style="vertical-align:middle;">  Iconos Herramientas
</div>
<div class="panel" style="column-count:2">

<?php for ($t=0;$t<count($encab);$t++){;?>
<span><table><tr><td width="100px"><?php  echo $encab[$t];?></td><td><input type="file" name="imgiconos<?php  echo $t;?>"></td></tr></table></span>
<?php };?>
</div>


<div class="accordion">
<img src="../img/iconos/titulos.png" width="32px" style="vertical-align:middle;">  Titulos Herramientas
</div>
<div class="panel" style="column-count:2">

<?php 
$sql1="SELECT * from proyectosnombre where idproyectos='".$idproyectos."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);*/
 
for ($t=0;$t<count($encab);$t++){;
$tituloa=$resultado1[$dat[$t]];
?>
<input type="hidden" name="tituloa[<?php  echo $t;?>]"  value="<?php  echo $tituloa;?>">
<input type="hidden" name="nombreta[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">


<span>
<table><tr><td width="100px">
<?php  echo $encab[$t];?>
</td><td>
<?php  
switch($t){;
case 1:
?>
<input type="hidden" name="titulon[<?php  echo $t;?>]"  value="Entrada/Salida">
<input type="text" value="Entrada/Salida" disabled>

<?php 
;break;
case 2:
?>
<input type="hidden" name="titulon[<?php  echo $t;?>]"  value="Incidencias">
<input type="text" value="Incidencias" disabled>

<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="text" name="titulon[<?php  echo $t;?>]" size="20" value="<?php  echo $tituloa;?>">

<?php 
;break;
default:
?>
<input type="text" name="titulon[<?php  echo $t;?>]" size="20" value="<?php  echo $tituloa;?>">

<?php 
};
?>
</td></tr></table>
</span>

<?php };?>



</div>



<div class="accordion">
<img src="../img/iconos/precios.png" width="32px" style="vertical-align:middle;">  Precios
</div>
<div class="panel">

<div   style="column-count:2">
<?php 
$sql10="SELECT * from precioproyectos where idproyectos='".$idproyectos."'"; 
$result10=$conn->query($sql10);
$resultado10=$result10->fetch();

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);*/
 for ($t=0;$t<count($encab);$t++){;
 
$precioa=$resultado10[$dat[$t]];
?>
<input type="hidden" name="precioa[<?php  echo $t;?>]" value="<?php  echo $precioa;?>">

<span>
<table><tr><td width="100px">
<?php  echo $encab[$t];?>
</td><td>
<?php  
switch($t){;
case 1:
?>
<input type="text" name="precion[<?php  echo $t;?>]" value="<?php  echo $precioa;?>" >
<?php 
;break;
case 2:
?>
<input type="text" name="precion[<?php  echo $t;?>]" value="<?php  echo $precioa;?>" >
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="text" name="precion[<?php  echo $t;?>]" value="<?php  echo $precioa;?>" >
<?php 
;break;
default:
?>
<input type="text" name="precion[<?php  echo $t;?>]" value="<?php  echo $precioa;?>" >
<?php 
};
?>
</td></tr></table>
</span>

<?php };?>


</div>

<div>
<span>

<table>
<tr><td colspan="2">Precios Bloques Trabajadores</td></tr>
<?php 
$sql11="SELECT * from precioempleados where idproyectos='".$idproyectos."'";
$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result");

for($y=0;$y<5;$y++){;
/*mysqli_data_seek($result11, $y);
$resultado11=mysqli_fetch_array($result11);*/
$numemple=$resultado11[$y]['numempleados'];
$pemple=$resultado11[$y]['preciogrupo'];
?>
<input type="hidden" name="vnumtraba[<?php echo $y;?>]" value="<?php  echo $numemple;?>">
<input type="hidden" name="pnumtraba[<?php echo $y;?>]" value="<?php  echo $pemple;?>">
<tr><td><input type="number" name="vnumtrabn[<?php echo $y;?>]" value="<?php  echo $numemple;?>" min="1" max="10000"></td>
<td><input type="number" min="0" max="10000" name="pnumtrabn[<?php echo $y;?>]" value="<?php  echo $pemple;?>"></td></tr>

<?php
};

?>

</table>


<table>
<tr><td colspan="2">Precios Bloques Clientes / Puestos de Trabajo</td></tr>
<?php 
$sql11="SELECT * from preciocliente where idproyectos='".$idproyectos."'"; 
$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result");

for($y=0;$y<5;$y++){;
/*mysqli_data_seek($result11, $y);
$resultado11=mysqli_fetch_array($result11);*/
$numclie=$resultado11[$y]['numcliente'];
$pclie=$resultado11[$y]['preciogrupo'];
?>
<input type="hidden" name="vnumclia[<?php echo $y;?>]" value="<?php  echo $numclie;?>">
<input type="hidden" name="pnumclia[<?php echo $y;?>]" value="<?php  echo $pclie;?>">
<tr><td><input type="number" name="vnumclin[<?php echo $y;?>]" value="<?php  echo $numclie;?>" min="1" max="10000"></td>
<td><input type="number" name="pnumclin[<?php echo $y;?>]" min="0" max="10000" value="<?php  echo $pclie;?>"></td></tr>
<?php 
};
?>

</table>


<table>
<tr><td colspan="2">Precios Bloques Personalizacion</td></tr>
<?php 
$sql11="SELECT * from preciopersonalizacion where idproyectos='".$idproyectos."'"; 
$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result");
mysqli_data_seek($result11, 0);
$resultado11=mysqli_fetch_array($result11);*/
$numper=$resultado11[0]['numcliente'];
$pper=$resultado11[0]['preciogrupo'];
?>
<input type="hidden" name="vpersonalizaciona[0]" value="<?php  echo $numper;?>">
<input type="hidden" name="ppersonalizaciona[0]" value="<?php  echo $pper;?>">

<tr><td><input type="text" name="vpersonalizacionn[0]" value="<?php  echo $numper;?>"></td>
<td><input type="number" min="1" max="10000" name="ppersonalizacionn[0]" value="<?php  echo $pper;?>"></td></tr>

</table>
</span>
</div>


</div>




<div class="accordion">
<img src="../img/iconos/pagina.png" width="32px" style="vertical-align:middle;">  Pagina
</div>
<div class="panel">
<table>
<tr><td>
Informaci&oacute;n a tener en cuenta<br/>
%1$s -- estamos haciendo referencia al logo<br/>
%2$s -- estamos haciendo referencia al bot&oacute;n<br/>
%3$d -- estamos haciendo referencia al num de proyecto<br/>
</td></tr>
</table>


<textarea name="datosn[5]" rows="14" cols="130">
<?php  echo $pagweb;?>


</textarea>

</div>






<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>
<div class="panel">


</form>
<?php  include ('../js/acordeonjs.php');?>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
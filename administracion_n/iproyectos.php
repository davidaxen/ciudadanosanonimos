<?php  
include('bbdd.php');


if (($ide!=null) or ($validar==0)){;

 include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php');
 ?>


<div id="main">
<div class="titulo">
<p class="enc">ALTA DE PROYECTOS</p>
</div>
<div class="contenido"  style="padding-left:10px">

<script>
//Número máximo de casillas marcadas por cada fila
var maxi=1;

//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir mas de '+maxi+' casillas a la vez, durante el periodo de prueba.');
			//desmarco la casilla, porque no se puede permitir marcar
			check.checked=false;
			//resto una unidad al contador de grupo, porque he desmarcado una casilla
			contador[grupo]--;
		}
	}else {
		//si la casilla no estaba marcada, resto uno al contador de grupo
		contador[grupo]--;
	}
}
</script>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tabla" value="iproyecto">


<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Proyectos
</div>
<div class="panel">
<table>

<tr><td>
<table>
<tr><td>Nombre del Proyecto</td><td><input type="text" name="nombre2" size="100"></td></tr>
<?php 
$sqle="SELECT * from empresas where estado='1'"; 
$resulte=$conn->query($sqle);

/*$resulte=mysqli_query ($conn,$sqle) or die ("Invalid result");
$rowe=mysqli_num_rows($resulte);*/
?>
</table>
</td></tr>


<tr><td>
<table>
<tr><td>Empresa Gestora del Proyecto</td><td>
<select name="datosn[4]">
<option value="">Elige un gestor</option>
<?php
/*for($t=0;$t<$rowe;$t++){;
mysqli_data_seek($resulte,$t);
$resultadoe=mysqli_fetch_array($resulte);*/
foreach ($resulte as $rowmose) {
$idemp=$rowmose['idempresas'];
$nombreemp=$rowmose['nombre'];
?>
<option value="<?php echo $idemp;?>" ><?php echo strtoupper($nombreemp);?></option>
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
<td>Dias de Prueba</td><td><input type="text" name="dprueba" size="3"></td><td>Web</td><td><input type="text" name="web2" size="50"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Logotipo web&nbsp;<a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipo"></td></tr>
<tr><td>Boton de Descarga&nbsp;<a href="../img/pl_boton.psd">Plantilla</a></td><td><input type="file" name="botonddescarga"></td></tr>
<tr><td>Logotipo para paypal&nbsp;<a href="../img/pl_paypal.psd">Plantilla</a></td><td><input type="file" name="logopaypal"></td></tr>
<tr><td>Color Fondo&nbsp;<input type="text" name="cfondo">Color Arriba</a></td><td><input type="text" name="carriba"></td></tr>
<tr><td>Color Lateral&nbsp;<input type="text" name="clateral">Color Central</a></td><td><input type="text" name="ccentral"></td></tr>
</table>
</td><tr>
</table>

</div>
<!-- Administrar -->
<?php 
$encab=array('Clientes','Gestores','Empleados','Empresas','Empresa','Usuarios','Visitas','Proveedores','Puestos de Trabajo','Vecinos');
$dat=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos','vecinos');
?>


<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;">  Opciones Administrar
</div>
<div class="panel"  style="column-count:3">

<?php 
for ($t=0;$t<count($encab);$t++){;?>
<span>
<input type="hidden" name="nombreaa[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">
<input type="checkbox" name="datosan[<?php  echo $t;?>]" value="1" >
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
for ($t=0;$t<count($encab);$t++){;
$tituloaa=$resultado1[$dat[$t]];
?>
<input type="hidden" name="nombretaa[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">
<span>
<table><tr><td width="100px">
<?php  echo $encab[$t];?>
</td><td>
<input type="text" name="tituloan[<?php  echo $t;?>]" size="20" >
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
<input type="hidden" name="nombreha[<?php  echo $t;?>]" value="<?php  echo $dat[$t];?>">

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
<input type="checkbox" name="datoshn[<?php  echo $t;?>]" value="1" >
<?php 
;break;
default:
?>
<input type="checkbox" name="datoshn[<?php  echo $t;?>]"  value="1" >
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
for ($t=0;$t<count($encab);$t++){;
?>
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
<input type="text" name="titulon[<?php  echo $t;?>]" size="20" 

<?php 
;break;
default:
?>
<input type="text" name="titulon[<?php  echo $t;?>]" size="20" >

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

<?php for ($t=0;$t<count($encab);$t++){;?>
<span><table>
<tr><td width="100px">
<?php  echo $encab[$t];?></td><td>
<?php  
switch($t){;
case 1:
?>
<input type="number" name="precio[<?php  echo $t;?>]" placeholder="precio"  min="1" max="10000">
<?php 
;break;
case 2:
?>
<input type="number" name="precio[<?php  echo $t;?>]" placeholder="precio"  min="1" max="10000">
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="number" name="precio[<?php  echo $t;?>]" placeholder="precio" min="1" max="10000" >
<?php 
;break;
default:
?>
<input type="number" name="precio[<?php  echo $t;?>]" placeholder="precio"  min="1" max="10000">
<?php 
};
?>
</td></tr></table></span>
<?php };?>

</div>

<div><span>
<table>
<tr><td colspan="2">Precios Bloques Trabajadores</td></tr>
<?php for($y=0;$y<5;$y++){; ?>
<tr>
<td><input type="number" name="vnumtrabn[<?php echo $y;?>]" placeholder="num de trab - 5" min="1" max="100000"></td>
<td><input type="number" name="pnumtrabn[<?php echo $y;?>]" min="1" max="100000" placeholder="precio - 50" size="4"></td></tr>
<?php };?>
</table><table>
<tr><td colspan="2">Precios Bloques Clientes / Puestos de Trabajo</td></tr>
<?php for($y=0;$y<5;$y++){; ?>
<tr>
<td><input type="number" name="vnumclin[<?php echo $y;?>]" placeholder="num de cli - 5" min="1" max="10000"></td>
<td><input type="number" name="pnumclin[<?php echo $y;?>]" min="1" max="10000" placeholder="precio - 50"></td></tr>
<?php };?>
</table><table>
<tr><td colspan="2">Precios Bloques Personalizacion</td></tr>
<tr>
<td><input type="text" name="vpersonalizacionn[0]" placeholder="titulo del bloque"></td>
<td><input type="number" min="1" max="10000" name="ppersonalizacionn[0]" placeholder="precio bloque - 55"></td></tr>
</table></span>
</div>




</div>


<!--
<div class="accordion">
<img src="../img/iconos/paquetes.png" width="32px" style="vertical-align:middle;"> Paquetes
</div>
<div class="panel">

<table>
<tr><td valign="top">Tipos de precios</td><td valign="top">
<select name="tipoprecio">
<option value="1">Precios por Servicios</option>
<option value="2">Precio por opciones</option>
</select>
</td>
<td valign="top">Nomenclatura</td>
<td valign="top"><input type="text" name="nomcla" value="euro/anual"></td>
<td valign="top">Licencias:</td>
<td valign="top"><table>
<tr><td>Num Administradores<td><td><input type="number" name="numadm" value="1"></td></tr>
<tr><td>Num Trabajadores<td><td><input type="number" name="numtrab" value="5"></td></tr>
<tr><td>Num Clientes/Puesto de Trabajo<td><td><input type="number" name="numcli" value="50"></td></tr>
</table>
</td></tr>
</table>

<div style="background-color:#aaaaaa">

Opciones a cargar para Precios por Servicios<br/>
<table>
<tr><td>Nombre del Plan</td><td>Precio</td><td>Servicios</td></tr>
<tr>
<td valign="top">Plan B&aacute;sico</td>
<td valign="top"><input type="text" name="psbasico"></td>
<td>

<div  id="divicolumna">

<?php for ($t=0;$t<count($encab);$t++){;?>

<?php  
switch($t){;
case 1:
case 2:
?>
<span>
<input type="hidden" name="sbasico[<?php  echo $t;?>]"  value="1"><input type="checkbox"  id="<?php  echo $dat[$t];?>" disabled="disabled" checked="checked">
&nbsp;
<?php  echo $encab[$t];?>
</span>
<br/>
<?php 
;break;
};
?>

<?php };?>

</div>


</td>
</tr>
</table>
</div>

<p>&nbsp;</p>

<div style="background-color:#dddddd">

Opciones a cargar para Precios por Opciones<br/>
<table>
<tr><td>Paquete</td><td>Precio</td><td>Servicios</td></tr>

<tr>
<td valign="top">Plan B&aacute;sico
<input type="hidden" name="nobasico" value="Paquete Basico">
</td>
<td valign="top"><input type="text" name="pobasico"></td>

<td>

<div  id="divicolumna">

<?php for ($t=0;$t<count($encab);$t++){;?>

<span>



<?php  
switch($t){;
case 1:
?>
<input type="hidden" name="obasico[<?php  echo $t;?>]"  value="1"><input type="checkbox"  id="<?php  echo $dat[$t];?>" 
disabled="disabled" checked="checked">
<?php 
;break;
case 2:
?>
<input type="hidden" name="obasico[<?php  echo $t;?>]"  value="1"><input type="checkbox"  id="<?php  echo $dat[$t];?>" 
disabled="disabled" checked="checked">
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="checkbox" name="obasico[<?php  echo $t;?>]" id="<?php  echo $dat[$t];?>" value="1">
<?php 
;break;
default:
?>
<input type="checkbox" name="obasico[<?php  echo $t;?>]"  id="<?php  echo $dat[$t];?>" value="1">
<?php 
};
?>
&nbsp;
<?php  echo $encab[$t];?>
</span>
<br/>
<?php };?>

</div>

</td>
</tr>


<tr>
<td valign="top">Plan Avanzado
<input type="hidden" name="noavanzado" value="Paquete Avanzado">
</td>
<td valign="top"><input type="text" name="poavanzado"></td>

<td>

<div  id="divicolumna">

<?php for ($t=0;$t<count($encab);$t++){;?>

<span>



<?php  
switch($t){;
case 1:
?>
<input type="hidden" name="oavanzado[<?php  echo $t;?>]"  value="1"><input type="checkbox"  id="<?php  echo $dat[$t];?>" 
disabled="disabled" checked="checked">
<?php 
;break;
case 2:
?>
<input type="hidden" name="oavanzado[<?php  echo $t;?>]"  value="1"><input type="checkbox"  id="<?php  echo $dat[$t];?>" 
disabled="disabled" checked="checked">
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<input type="checkbox" name="oavanzado[<?php  echo $t;?>]" id="<?php  echo $dat[$t];?>" value="1">
<?php 
;break;
default:
?>
<input type="checkbox" name="oavanzado[<?php  echo $t;?>]"  id="<?php  echo $dat[$t];?>" value="1">
<?php 
};
?>
&nbsp;
<?php  echo $encab[$t];?>
</span>
<br/>
<?php };?>

</div>

</td>
</tr>




</table>
</div>




</div>
-->




<div class="accordion">
<img src="../img/iconos/pagina.png" width="32px" style="vertical-align:middle;">  Pagina
</div>
<div class="panel">
<table>
<tr><td>
Información a tener en cuenta<br/>
%1$s -- estamos haciendo referencia al logo<br/>
%2$s -- estamos haciendo referencia al boton<br/>
%3$d -- estamos haciendo referencia al num de proyecto<br/>
</td></tr>
</table>


<textarea name="pagweb" rows="14" cols="130">

<HTML><HEAD>
<TITLE>PROGRAMA DE GESTION DE PERSONAL Y TRABAJO</TITLE>
<meta name='author' content='smartcbc' />
<meta charset='UTF-8'/>
<meta name='Description' content='PROGRAMA DE GESTION DE PERSONAL Y TRABAJO'>
<meta name='viewport' content='width=device-width, initial-scale=1'>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

.hijo {
width:400px;border: 3px solid #f1f1f1;}

.hijo2 {
border: 0px solid #f1f1f1;}

.cuadro {
display:flex;
justify-content:center;
align-items:center;
}

input[type=text], input[type=password] {
  padding: 4px 10px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #03052c;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

.imgcontainer {
  text-align: center;
  /*margin: 24px 0 12px 0;*/
}


</style>

<script>

function myFunction() {

  var x = document.getElementById('myInput');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}
</script>

</head>

<body class='html' style='background-image:url(img/cafcontrol-fondo.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>
<form method='post' action='inicio_n.php' name='login_form'>

  <div class='imgcontainer'>
    <img src='img/%1$s' width='250px'>
<h3>TOME AHORA EL CONTROL DE SU NEGOCIO</h3>
  </div>

  <div class='container'>
<table><tr><td>
    <label for='uname'><b>Nombre    </b></label></td><td>
    <input type='text' name='user' onFocus='encender(this)' onBlur='apagar(this)' required placeholder='Introduce Usuario'></td></tr>
<tr><td>
    <label for='psw'><b>Password</b></label></td><td>
    <input type='password' name='pass' onFocus='encender(this)' onBlur='apagar(this)' id='myInput' required placeholder='Introduce Password'>
<img src='../img/iconos/pass.png' width='32px' onclick='myFunction()' style='vertical-align:middle'></td></tr></table>
<br/>        
    <button type='submit'>Entrar</button>
  </div>

  <div class='container' style='background-color:#f1f1f1;height:25px'>
    <span class='psw'>Forgot <a href='administracion_n/recuperarcon.php'>password?</a></span>
  </div>
</form>
</div>
</div>
<p>
 
</p>

<div class='cuadro' style='background-color:#c5c5c5;height:220px;color:#fff;'>
<div class='hijo2'>


  <div class='imgcontainer'>
<img src='img/%1$s' width='250px'>
      <br/>Una aplicación simplifica una tarea
  </div>

  <div class='container' style='column-count:2;'>
Tel.: 912 810 130<br/>
Movil.: 695 175 000<br/>
Email: info@smartcbc.com<br/>

Cadalso de los Vidrios 14 - local 12 - 28035 Madrid<br/>
Horario Mañanas: De 9:30 a 14:00<br/>
Horario Tarde: De 17:30 a 19:00<br/>        
  </div>


</div>
</div>

</body>
</html>


</textarea>

</div>



<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>


</form>

<?php  include ('../js/acordeonjs.php');?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

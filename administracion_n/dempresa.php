<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON EMPRESAS</p></div>
<div class="contenido">


<div class="main">
<span class="caja2">Creaci&oacute;n de Empresa por distribuidor</span>
<a href="iempresa.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Alta de Empresas</a></span>
<a href="mempresa.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Modificaci&oacute;n de Empresas</a></span>
<a href="lempresa.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Listado de Empresas</a></span>
<a href="lcempresa.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Comprobaci&oacuten de Uso<br/>Empresas</a></span>
</div>
<div class="main">
<span class="caja2">Creaci&oacute;n de Proyectos</span>
<a href="iproyectos.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Alta de Proyectos</a></span>
<a href="mproyectos.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Modificaci&oacute;n de Proyectos</a></span>
<a href="lproyectos.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Listado de Proyectos</a></span>
</div>
<div class="main">
<span class="caja2">Creaci&oacute;n de Empresas por internet</span>
<!--<span class="caja"><a href="mvalidar.php">Modificacion de Empresas</a></span>-->
<a href="lvalidar.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Listado de Empresas</a></span>
</div>
<div class="main">
<span class="caja2">Utilidades</span>
<a href="dlocalizacion.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Localizaci&oacute;n</a></span>
<a href="dcalendariolaboral.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Dias Festivos</a></span>
</div>
<div class="main">
<span class="caja2">Creaci&oacute;n de Ayuda</span>
<a href="iayuda.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Alta de Ayuda</a></span>
<a href="mayuda.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Modificaci&oacute;n de Ayuda</a></span>
<a href="layuda.php"><span class="caja"><img src="../img/iconos/empresas.png" width="64px"><br/>Listado de Ayuda</a></span>
</div>



</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


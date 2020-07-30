<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">DIAS FESTIVOS</p></div>
<div class="contenido">


<div class="main">
<span class="caja2">Dias Festivos</span>
<a href="icllocalidad.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Alta de Dias Festivos de Localidad</a></span>
<a href="mcllocalidad.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Modificaci&oacute;n de Dias Festivos de  Localidad</a></span>
<a href="lcllocalidad.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Listado de Dias Festivos de Localidad</a></span>
</div>






</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


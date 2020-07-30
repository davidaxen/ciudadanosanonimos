<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LOCALIZACION</p></div>
<div class="contenido">


<div class="main">
<span class="caja2">Localizaci&oacute;n</span>
<a href="iprovincia.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Alta de Provincia</a></span>
<a href="mprovincia.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Modificaci&oacute;n de Provincia</a></span>
<a href="lprovincia.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Listado de Provincia</a></span>
</div>






</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


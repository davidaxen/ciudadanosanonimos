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
<a href="dpaises.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Paises</a></span>
<a href="dcomunidades.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Comunidades</a></span>
<a href="dprovincia.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Provincia</a></span>
<a href="dlocalidad.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Localidad</a></span>
</div>






</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


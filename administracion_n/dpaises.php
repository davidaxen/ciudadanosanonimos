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
<a href="ipaises.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Alta de Paises</a></span>
<a href="mpaises.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Modificaci&oacute;n de Paises</a></span>
<a href="lpaises.php"><span class="caja"><img src="../img/iconos/mundo.png" width="64px"><br/>Listado de Paises</a></span>
</div>






</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


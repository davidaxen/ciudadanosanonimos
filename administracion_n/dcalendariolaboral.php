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
<a href="dclpaises.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Pais</a></span>
<a href="dclcomunidades.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Comunidad</a></span>
<a href="dcllocalidad.php"><span class="caja"><img src="../img/iconos/calendario.png" width="64px"><br/>Localidad</a></span>
</div>






</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


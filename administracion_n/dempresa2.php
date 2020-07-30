<?php  
include('bbdd.php');

 if ($ide!=null){;
 
   include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON EMPRESAS</p></div>
<div class="contenido">


<div class="main">
<span class="caja2"><h4>Creaci&oacute;n de Empresa por distribuidor</h4></span>
<a href="iempresa2.php"><span class="caja"><img src="../img/iconos/empresa.png" width="64px"><br/>Alta de Empresas</span></a>
<a href="mempresa2.php"><span class="caja"><img src="../img/iconos/empresa.png" width="64px"><br/>Modificaci&oacute;n de Empresas</span></a>
<a href="lempresa2.php"><span class="caja"><img src="../img/iconos/empresa.png" width="64px"><br/>Listado de Empresas</span></a>
<a href="lcempresa2.php"><span class="caja"><img src="../img/iconos/empresa.png" width="64px"><br/>Comprobaci&oacuten de Uso<br/>Empresas</a></span>

</div>



</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

?>
<?php  include('portada_n/cabecera.php');?>

<!--
<div class="colocacion centro">

</div>
-->

<div id="main">

<div id="main3">
<span><?php  include('portada_n/portada2.php');?></span>
<span><?php  include('logo2.php');?></span>
</div>

<div id="main4">

<span>
<center class="enc2">Ultimas Entradas</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasentradas.php" width="580" height="230" scrolling="auto"></iframe>
</span>

<span>
<center class="enc2">Ultimas Incidencias</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidencias.php" width="580" height="230" scrolling="auto"></iframe>
</span>

<span>
<iframe style="border:0" name="abajo" src="utilidades/1a2.php" width="390" height="330" scrolling="no"></iframe>
</span>



</div>


   		


</div>
    

	




</body>

</html>
<?php }else{;
include ('cierre.php');
};?>
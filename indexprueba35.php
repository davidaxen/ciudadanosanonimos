<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;


  include('portada_n/cabecera.php');?>

<!--
<div class="colocacion centro">

</div>
-->

<div id="main">

<div class="posicion t0 l0 w290 h140">
<center class="enc2">Acciones Actuales</center>
<?php  include('portada_n/portada2.php');?>
</div>

<div class="posicion t150 l0 w290 h360">
<center class="enc2">Puesto sin Personal</center>
<iframe style="border:0" name="abajo" src="portada_n/ultimasalarmas.php" width="390" height="330" scrolling="no"></iframe>
</div>

<div class="posicion t0 l300 w600 h250">
<center class="enc2">Ultimas Entradas</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasentradas.php" width="600" height="230" scrolling="no"></iframe>

</div>
<div class="posicion t255 l300 w600 h250">
<center class="enc2">Ultimas Incidencias</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidencias.php" width="600" height="230" scrolling="no"></iframe>
</div>
   		


</div>
    

	




</body>

</html>
<?php }else{;
include ('cierre.php');
};?>

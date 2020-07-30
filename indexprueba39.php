<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

?>
<?php  include('portada_n/cab_repr.php');?>



<div id="main">

<!-- arriba  -->
<div id="main3">
<?php  include('portada_n/portadarep2.php');?>
<?php  include('logorep.php');?>
</div>


<!-- medio -->
<div id="main4">
<center class="enc2">Ultimas Entradas</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasentradasrep.php" width="560" height="370" scrolling="auto"></iframe>

<center class="enc2">Ultimas Incidencias</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidenciasrep.php" width="560" height="170" scrolling="auto"></iframe>
</div>

<div id="main5">
<center class="enc2">Ultimas Incidencias Urgentes</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidenciasurgrep.php" width="560" height="170" scrolling="auto"></iframe>
</div>











   		


</div>
    

	



hola
</body>

</html>
<?php }else{;
include ('cierre.php');
};?>
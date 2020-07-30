<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;
  include('portada_n/cabecera.php');?>



<div class="colocacion derecha">

<div id="main3">
<!-- arriba  -->
<span>
<?php  include('portada_n/portada2.php');?>
</span>

<span >
<?php  include('logo2.php');?>
</span>
</div>

<div id="main4">
<!-- medio -->
<span >
<center class="enc2">Renovaciones en el pr&oacute;ximo mes</center>
<iframe  style="border:0" name="arriba" src="portada_n/proximasrenovaciones.php" width="580" height="230" scrolling="auto"></iframe>
</span>

<span >
<center class="enc2">Ultimas pruebas solicitadas</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimaspruebas.php" width="580" height="230" scrolling="auto"></iframe>
</span>

<!-- abajo -->
<span >
<center class="enc2">Ultimas pruebas con contrato</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasconcontrato.php" width="580" height="230" scrolling="auto"></iframe>
</span>

<span >
<center class="enc2">Ultimas pruebas sin contrato</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimassincontrato.php" width="580" height="230" scrolling="auto"></iframe>
</span>


</div>







   		


</div>
    

	




</body>

</html>
<?php }else{;
include ('cierre.php');
};?>
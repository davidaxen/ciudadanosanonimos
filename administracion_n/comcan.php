<?php  
include('bbdd.php');


if ($ide!=null){;

 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">HA CANCELADO EL PAGO CON PAYPAL</p>
</div>


<div class="contenido">



<?php 
/*
echo $tprecios;
print_r($_COOKIE);
print_r($_GET);
print_r($_POST);
*/

?>
<center>
<form  method="post"
<?php if ($tprecios==2){;?>
action="antcompra.php"
<?php }else{;?>
action="antcompra2.php"
<?php };?>
>
<input type="hidden" name="devuelto" value="1">
<input type="image" src="../img/volvercompra.png" alt="Submit" width="48" height="48">
</form>
</center>

</div>

</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
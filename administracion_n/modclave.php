<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php');  
?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<div class="contenido"  style="padding-left:10px">
<script>

function myFunction(vent) {
  var x = document.getElementById(vent);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>


<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="contraseña">
<input type="hidden" name="idcm" value="20">



<div class="accordion">
<img src="../img/iconos/pass.png" width="32px" style="vertical-align:middle;"> Contrase&ntilde;as
</div>
<div class="panel" style="display:block;">
<?php $i=0;?><input type="hidden" name="datosn[0]" value="0">
<table>


<tr><td>Contrase&ntilde;a Antigua</td><td><input type="password" name="datosn[1]" id="myInput1" ><img src="../img/iconos/pass.png" width="32px" onclick="myFunction('myInput1')" style="vertical-align:middle"></td>
<tr><td>Contrase&ntilde;a Nueva</td><td><input type="password" name="datosn[2]" id="myInput2" ><img src="../img/iconos/pass.png" width="32px" onclick="myFunction('myInput2')" style="vertical-align:middle"></td></tr>
<tr><td>Repetir Contrase&ntilde;a</td><td><input type="password" name="datosn[3]" id="myInput3" ><img src="../img/iconos/pass.png" width="32px" onclick="myFunction('myInput3')" style="vertical-align:middle"></td></tr>
</table>

</div>
<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>
</form>

<?php  include ('../js/acordeonjs.php');?>
</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>

<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>
<link rel="stylesheet" type="text/css" href="formulario.css">
<script type="text/javascript" language="javascript" src="ajax.js"></script>

<div id="main">
<div class="titulo">

</div>
</div>
<div class="contenido">

<form action="intro2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tabla" value="intro">
<table class="tabla" align="center">

<tr><td colspan="2"><p class="enc">ENVIO DE <?php  echo strtoupper($nc);?></p></td></tr>	
<tr><td><b>Pais</b></td><td><?php include('provincias.php'); ?></td></tr>
<tr><td><b>Ciudad</b></td><td>
<div id="listamunicipios">
      <select name="provincia" id="obj_municipio" >
        <option>Seleccionar...</option>
      </select>
    </div>
</td></tr>
<tr><td><b>Fecha de Finalización</b></td><td><input type="text" name="fechafin" placeholder="Ej:2020/01/01"></tr>
<tr><td colspan="2"><b>Pregunta</b></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="texto" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><b>Respuestas propuestas</b></td></tr>
<tr><td colspan="2">* solo rellena los espacios necesarios</td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[0]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[1]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[2]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[3]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="text" name="resp[4]" maxlength="250" size="100"></td></tr>
<tr><td colspan="2"><input class="input1" type="checkbox" name="otrosmot" value="1">Otros Motivos</td></tr>
<tr><td colspan="2"><input class="input1" type="checkbox" name="video" value="1">SELECCIONE SI LA PREGUNTA CONTIENE VIDEO</td></tr>
<tr><td><b>Ficheros</b></td><td><input type="file" name="fichero"></td></tr>
<tr><td></td></tr>
<tr><td align="center" colspan="2"><input class="button button5" type="submit" class="envio" value="ENVIAR" name="ENVIAR"></td></tr>
</table>
</form>
</div>
</div>

<?php } else {;
include ('../../cierre.php');

 };?>


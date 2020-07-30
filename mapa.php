<?php 
?>
<html>
<head>
<title>Mapa</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">POSICION DE SOCORRISTA</td></tr>
<tr><td class="enc"><?php  echo $titulo;?></td></tr>
</table>
<table>
<tr><td colspan="2">

<iframe width="525" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="http://maps.google.es/maps/ms?msa=0&amp;msid=216849671325816300371.0004bc53dc8d571eac061&amp;ie=UTF8&amp;t=h&amp;ll=<?php  echo $lat;?>,<?php  echo $lon;?>&amp;spn=0.002857,0.00456&amp;z=19&amp;output=embed"></iframe><br />

</td></tr>

<tr>
<td>Piscina</td><td><?php  echo $nombrecom;?></td>
</tr>
<tr>
<td>Socorrista</td><td><?php  echo $nombretrab?></td>
</tr>
<tr><td colspan="2">
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.back()"></td></tr>
</table>




</body>
</html>

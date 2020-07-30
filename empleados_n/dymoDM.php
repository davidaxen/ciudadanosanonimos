<?php 
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ETIQUETAS DYMO PARA EL EMPLEADO<br/><?php  echo $nomempl;?></p></div>
<div class="contenido">
<p>&nbsp;</p>
<table>
<tr class="menor1">
<td>Etiquetas S0722370 - 99012 ( 89 mm x 36 mm )</td>
<td>
<a href="pdfemplcode2DM.php?idempl=<?php  echo $idempl;?>" target="_blank"><img src="../img/dymo.png" border="0" width="25" height="20"></a>
</td>
</tr>

<tr class="menor1">
<td>Etiquetas S0722540 ( 57 mm x 32 mm )</td>
<td>
<a href="pdfemplcode3DM.php?idempl=<?php  echo $idempl;?>" target="_blank"><img src="../img/dymo.png" border="0" width="25" height="20"></a>
</td>
</tr>

<tr class="menor1">
<td>Etiquetas S0929120 ( 25 mm x 25 mm )</td>
<td>
<a href="pdfemplcode4DM.php?idempl=<?php  echo $idempl;?>" target="_blank"><img src="../img/dymo.png" border="0" width="25" height="20"></a>
</td>
</tr>

</table>
</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>
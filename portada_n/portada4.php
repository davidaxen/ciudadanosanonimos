<?php  
?>
<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>

<?php extract($_COOKIE);?>

<a href="/inicio_n.php"><img src="/img/Globe-icon.png" class="cuadro" ></a>
<!--inicio.gif-->
<img alt="volver" border="0" src="/img/Reload-icon.png" onclick="history.back()" class="cuadro">
<!--arrow_cycle.png-->
<a href="javascript:imprSelec('imprimir')"><img src="/img/Printer-Ink-icon.png" class="cuadro" ></a>
<!--imp.gif-->
<a href="/facturacion_n/contpisc.php"><img src="/img/Cabinet-icon.png" class="cuadro" ></a>
<!--ver.gif-->
<a href="/empleados_n/lempleados.php?tipo=alta&estado=1&ano=todos&smart=si"><img src="/img/Users-icon.png" class="cuadro" ></a>
<!--persona.gif-->
<a href="/inicio_n.php"><img src="/img/Document-icon.png" class="cuadro" ></a>
<!--modificar.gif-->
<a href="/portada_n/salir.php"><img src="/img/Delete-icon.png" class="cuadro" ></a>
<!--salir.gif-->

<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>

<?php
extract($_COOKIE);


if ($estado==1){;
$pagacc=$pag1;
}else{;
$pagacc=$pag2;
};
?>



<span id="submenu">
<a href="/<?php  echo $pagacc;?>"><img src="/img/iconos/inicio.png" class="cuadro"></a>

<img alt="volver" border="0" src="/img/iconos/volver.png" onclick="history.back()" class="cuadro">

<a href="javascript:location.reload()"><img src="/img/iconos/actualizar.png" class="cuadro" ></a>

<a href="javascript:imprSelec('imprimir')"><img src="/img/iconos/impresora.png" class="cuadro" ></a>



<?php if ($estado=='1'){;?>

<?php if ($idges!='0'){;?>
<a href="/administracion_n/micuenta_g.php?idempresas=<?php  echo $ide;?>">
<?php }else{;?>
<a href="/administracion_n/micuenta.php?idempresas=<?php  echo $ide;?>">
<?php };?>

<?php };?>

<?php if ($estado=='2'){;?><a href="/administracion_n/modempresav2.php?idempresas=<?php  echo $ide;?>"><?php };?>
<img src="/img/iconos/micuenta.png" class="cuadro"></a>


<a href="/portada_n/salir.php"><img src="/img/iconos/salir.png" class="cuadro" ></a>

</span>
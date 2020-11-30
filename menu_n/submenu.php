
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




<?php if ($estado=='1'){;?>

<?php if ($idges!='0'){;?>
<a href="/administracion_n/micuenta_g.php?idempresas=<?php  echo $ide;?>">
<?php }else{;?>
<a href="/administracion_n/micuenta.php?idempresas=<?php  echo $ide;?>">
<?php };?>

<?php };?>



<a href="/portada_n/salir.php"><img src="/img/iconos/salir-g.png" class="cuadro" ></a>

</span>
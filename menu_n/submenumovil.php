<?php
?>
<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);
var ventimp=window.open(' ','popimpr');
ventimp.document.write(ficha.innerHTML);
ventimp.document.close();
ventimp.print();
ventimp.close();}
</script>

<?php
extract($_COOKIE);
?>


<script>
function mod(i){
elem1=eval("ver"+i)
elem1.style.visibility="visible"
}

function modv(i){
elem1=eval("ver"+i)
elem1.style.visibility="hidden"
}

</script>


<span id="submenu">

<?php 
include('bbdd.php');

$sql1="select * from usuarios where user='".$gente."' and password='".$part."'"; 
//echo $sql1;
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas 1");
$resultado1=mysqli_fetch_array($result1);*/
$ad[1]=$resultado1['administracion'];
$ad[2]=$resultado1['servicios'];
$ad[3]=$resultado1['informes'];
$ad[4]=$resultado1['herramientas'];

$sql11="select * from usuariosnombre where idempresas='".$ide."'";
$result11=$conn->query($sql11);
$resultado11=$result11->fetch();

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result menucontabilidad");
$resultado11=mysqli_fetch_array($result11);*/
$nad[1]=$resultado11['administracion'];
$nad[2]=$resultado11['servicios'];
$nad[3]=$resultado11['informes'];
$nad[4]=$resultado11['herramientas'];

$sql12="select * from usuariosimg where idempresas='".$ide."'";
$result12=$conn->query($sql12);
$resultado12=$result12->fetch();

/*$result12=mysqli_query ($conn,$sql12) or die ("Invalid result menucontabilidad");
$resultado12=mysqli_fetch_array($result12);*/
$iad[1]=$resultado12['administracion'];
$iad[2]=$resultado12['servicios'];
$iad[3]=$resultado12['informes'];
$iad[4]=$resultado12['herramientas'];

$sql13="select * from usuariosenlace where idempresas='".$ide."'";
$result13=$conn->query($sql13);
$resultado13=$result13->fetch();

/*$result13=mysqli_query ($conn,$sql13) or die ("Invalid result menucontabilidad");
$resultado13=mysqli_fetch_array($result13);*/
$ead[1]=$resultado13['administracion'];
$ead[2]=$resultado13['servicios'];
$ead[3]=$resultado13['informes'];
$ead[4]=$resultado13['herramientas'];

$pagacc=$pag1;

?>

<a href="/<?php  echo $pagacc;?>"><img src="/img/iconos/inicio-g.png" class="cuadro" alt="Inicio"></a>

<img alt="volver" border="0" src="/img/iconos/volver-g.png" onclick="history.back()"  class="cuadro">
<!--arrow_cycle.png-->
<a href="javascript:location.reload()"><img src="/img/iconos/actualizar-g.png" class="cuadro" ></a>
<!--ver.gif-->
<a href="javascript:imprSelec('imprimir')"><img src="/img/iconos/impresora-g.png"  class="cuadro" ></a>
<!--imp.gif-->
<a href="/portada_n/salir.php"><img src="/img/iconos/salir-g.png" class="cuadro" ></a>


<!--salir.gif-->
<!-- AYUDA --><?php if ($ayuda=="1"){?>
<a href="/menu_n/menu_ayuda.php"><img src="/img/ayuda.png" width="48px" alt="Ayuda"></a>
<?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?php if ($trab=="1"){?>

<?php };?><!-- FIN TRABAJADORES -->

<!-- GESTORES --><?php if ($ges=="1"){?>
<a href="/menu_n/menu_gestores.php"><img src="/img/gestores.png"></a>
<?php };?><!-- FIN GESTORES -->

<?php if ($estado=='1'){;?>

<?php if ($ges=='1'){;?>
<a href="/administracion_n/micuenta_g.php?idempresas=<?php  echo $ide;?>">
<?php }else{;?>
<a href="/administracion_n/micuenta.php?idempresas=<?php  echo $ide;?>">
<?php };?>

<?php };?>
      
      
		<?php if ($estado=='2'){;?><a href="/administracion_n/modempresav2.php?idempresas=<?php  echo $ide;?>"><?php };?>
      <img src="/img/iconos/micuenta-g.png" width="32px" alt="Mi cuenta"></a>

<style>


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
  transition: 0.3s;
  vertical-align:middle;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color:#fff;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>	


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<?php if ($idcli!=0){;?>
<a href="/menu_n/menu_clientes.php">CLIENTES</a>
<?php }else{;
	if ($idtrab!=0){;
?>  
  <a href="/menu_n/menu_trabajador.php">TRABAJADORES</a>
  <?php }else{;?>
  
  <?php  for ($j=1;$j<count($ad)+1;$j++){;?>
<?php if ($ad[$j]=='1'){;?><a href="<?php  echo $ead[$j];?>">
<img src="/img/<?php  echo $iad[$j];?>" width="32px" alt="<?php  echo $nad[$j];?>">
<?php  echo strtoupper($nad[$j]);?></a><?php };?>
<?php };
};
};
?>


</div>

<span style="font-size:25px;cursor:pointer;color:#999999;" onclick="openNav()">
  <img src="/img/iconos/menu-g.png" width="32px"></span>
<!--&#9776;-->

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</span>
<?php
/*include('bbdd.php');*/
//print_r($_COOKIE);

//$sql1="select * from usuarios where user='".$gente."' and password='".$part."'"; 
$sql1="select * from usuarios where id='".$idusuario."'"; 

//echo $sql1;
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas 1");
$resultado1=mysqli_fetch_array($result1);*/
$ad[1]=$resultado1['administracion'];
$ad[2]=$resultado1['servicios'];
$ad[3]=$resultado1['informes'];
$ad[4]=$resultado1['herramientas'];
$ad[5]=$resultado1['ayuda'];

$sql11="select * from usuariosnombre where idempresas='".$ide."'";
$result11=$conn->query($sql11);
$resultado11=$result11->fetch();

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result menucontabilidad");
$resultado11=mysqli_fetch_array($result11);*/
$nad[1]=$resultado11['administracion'];
$nad[2]=$resultado11['servicios'];
$nad[3]=$resultado11['informes'];
$nad[4]=$resultado11['herramientas'];
$nad[5]=$resultado11['ayuda'];

$sql12="select * from usuariosimg where idempresas='".$ide."'";
$result12=$conn->query($sql12);
$resultado12=$result12->fetch();

/*$result12=mysqli_query ($conn,$sql12) or die ("Invalid result menucontabilidad");
$resultado12=mysqli_fetch_array($result12);*/
$iad[1]=$resultado12['administracion'];
$iad[2]=$resultado12['servicios'];
$iad[3]=$resultado12['informes'];
$iad[4]=$resultado12['herramientas'];
$iad[5]=$resultado12['ayuda'];


$sql13="select * from usuariosenlace where idempresas='".$ide."'";
$result13=$conn->query($sql13);
$resultado13=$result13->fetch();

/*$result13=mysqli_query ($conn,$sql13) or die ("Invalid result menucontabilidad");
$resultado13=mysqli_fetch_array($result13);*/
$ead[1]=$resultado13['administracion'];
$ead[2]=$resultado13['servicios'];
$ead[3]=$resultado13['informes'];
$ead[4]=$resultado13['herramientas'];
$ead[5]=$resultado13['ayuda'];

if(isset($estadoemp)==false) {
$estadoemp=null;
}	

if ($estadoemp==1){;
$pagacc=$pag1;
}else{;
$pagacc=$pag2;
};
?>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<style>


.menuini{
	padding:12px;
	border: 0px solid #000;
	font-size:14px;
	font-weight:bold;
}

tr:hover {background-color:transparent;}

</style>
<body onload="openNav()">
<div id="menu22">
<div style="align-self: center;">
<table><tr><td>
<a href="/inicio1.php"><img src="/img/<?php  echo $img;?>" width="190px"></a></td><td>
<a href="javascript:void(0)"  onclick="closeNav()" style="font-size:35px;">&times;</a></td>
</tr></table>
</div>
<br>
<!-- class="closebtn"-->


<?php if (($idtrab==0) and ($idcli==0) and ($idges==0)){;?>
<hr>
<?php  for ($j=1;$j<count($ad)+1;$j++){;?>
<?php if ($ad[$j]=='1'){;?>
<a href="<?php  echo $ead[$j];?>"><span class="menuini"><img src="/img/<?php  echo $iad[$j];?>" width="32px" style="vertical-align:middle;">
&nbsp;&nbsp;<?php  echo $nad[$j];?></span></a>
<hr>
<?php
 };
};
 };
 
if(isset($ayuda)==false) {
$ayuda=null;
}	
?>
<!-- AYUDA --><?php if ($ayuda=="1"){?>
<a href="/menu_n/menu_ayuda.php"><span class="menuini"><img src="/img/ayuda.png" width="32px" style="vertical-align:middle;">Ayuda</a></span><hr>
<?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES -->
<?php 
if ($idtrab!="0"){;
$sql31="select * from usuariosnombre where idempresas='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc1=$resultado31['servicios'];
$nc=$resultado31['informes'];

$sql32="select * from usuariosimg where idempresas='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic1=$resultado32['servicios'];
$ic=$resultado32['informes'];


?>
<hr>
<a href="/menu_n/menu_trabajador_servicios.php"><span class="menuini"><img src="/img/<?php  echo $ic1;?>" width="32px" style="vertical-align:middle;">&nbsp;&nbsp;<?php  echo $nc1;?></span></a>
<hr>
<a href="/menu_n/menu_trabajador.php"><span class="menuini"><img src="/img/<?php  echo $ic;?>" width="32px" style="vertical-align:middle;">&nbsp;&nbsp;<?php  echo $nc;?></span></a>
<hr>
<?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES -->
<?php if ($idcli!="0"){;
$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['clientes'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['clientes'];


?>
<a href="/menu_n/menu_clientes.php"><span class="menuini"><img src="/img/<?php  echo $ic;?>" width="32px" style="vertical-align:middle;"><?php  echo $nc;?></span></a>
<?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($idges!="0"){?>
<a href="/menu_n/menu_gestores.php"><span class="menuini"><img src="/img/iconos/gestores.png"  width="32px" style="vertical-align:middle;">Gestores</span></a>
<?php };?><!-- FIN GESTORES -->	
</div>

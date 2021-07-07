<?php
/*include('bbdd.php');*/
//print_r($_COOKIE);

//$sql1="select * from usuarios where user='".$gente."' and password='".$part."'"; 
$sql1="select * from usuarios where id='".$idusuario."'"; 
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();
//echo $sql1;
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

if(isset($estadoemp)==false) {
$estadoemp=null;
}	

if ($estadoemp==1){;
$pagacc=$pag1;
}else{;
$pagacc=$pag2;
};
/*
$cli=$resultado1['cliente');
$ges=$resultado1['gestor');
*/
?>
<div id="menu22">
<!--<a href="/<?php  echo $pagacc;?>"><img src="/img/inicio.png" width="48px"><br/>Inicio</a><hr>-->

<?php  for ($j=1;$j<count($ad)+1;$j++){;?>
<?php if ($ad[$j]=='1'){;?><a href="<?php  echo $ead[$j];?>"><img src="/img/<?php  echo $iad[$j];?>" width="48px"><br/><?php  echo $nad[$j];?></a><hr><?php };?>
<?php };?>
<?php 
if(isset($ayuda)==false) {
$ayuda=null;
}	
?>
<!-- AYUDA --><?php if ($ayuda=="1"){?>
<br/><a href="/menu_n/menu_ayuda.php"><img src="/img/ayuda.png" width="48px"><br/>Ayuda</a><br/><br/><hr>
<?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?php if ($idtrab!="0"){?>
<br/><!--<a href="/menu_n/menu_trabajador.php">--><img src="/img/iconos/empleados.png"><!--</a>-->
<?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?php if ($idcli!="0"){?>
<a href="/menu_n/menu_clientes.php"><img src="/img/clientes.png"></a>
<?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($idges!="0"){?>
<a href="/menu_n/menu_gestores.php"><img src="/img/iconos/gestores.png"><br/>Gestores</a>
<?php };?><!-- FIN GESTORES -->	
</div>

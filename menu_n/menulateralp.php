<?php
/*include('bbdd.php');*/
/*
$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=mysqli_query ($conn,$conn,$sql1) or die ("Invalid result empresas 1");
$ad[1]=mysqli_result($result1,0,'administrar');
$ad[2]=mysqli_result($result1,0,'generador');
$ad[3]=mysqli_result($result1,0,'herramientas');


$sql11="select * from usuariosnombre where idempresas='".$ide."'";
$result11=mysqli_query ($conn,$conn,$sql11) or die ("Invalid result menucontabilidad");
$nad[1]=mysqli_result($result11,0,'administrar');
$nad[2]=mysqli_result($result11,0,'generador');
$nad[3]=mysqli_result($result11,0,'herramientas');


$sql12="select * from usuariosimg where idempresas='".$ide."'";
$result12=mysqli_query ($conn,$conn,$sql12) or die ("Invalid result menucontabilidad");
$iad[1]=mysqli_result($result12,0,'administrar');
$iad[2]=mysqli_result($result12,0,'generador');
$iad[3]=mysqli_result($result12,0,'herramientas');


$sql13="select * from usuariosenlace where idempresas='".$ide."'";
$result13=mysqli_query ($conn,$conn,$sql13) or die ("Invalid result menucontabilidad");
$ead[1]=mysqli_result($result13,0,'administrar');
$ead[2]=mysqli_result($result13,0,'generador');
$ead[3]=mysqli_result($result13,0,'herramientas');
*/ 

if ($estadoemp==1){;
$pagacc=$pag1;
}else{;
$pagacc=$pag2;
};
/*
$cli=mysqli_result($result1,0,'cliente');
$ges=mysqli_result($result1,0,'gestor');
*/
?>
<div id="menu22">
<a href="/<?php  echo $pagacc;?>"><img src="/img/inicio.png" width="48px"><br/>Inicio</a><hr>
<!--
<?php  for ($j=1;$j<count($ad)+1;$j++){;?>
<?php if ($ad[$j]=='1'){;?><a href="<?php  echo $ead[$j];?>"><img src="/img/<?php  echo $iad[$j];?>" width="48px"><br/><?php  echo $nad[$j];?></a><hr><?php };?>
<?php };?>
-->

<!-- 
      <?php if ($estadoemp=='1'){;?><a href="/administracion_n/modempresa2.php?idempresas=<?php  echo $ide;?>"><?php };?>
		<?php if ($estadoemp=='2'){;?><a href="/administracion_n/modempresav2.php?idempresas=<?php  echo $ide;?>"><?php };?>
     
<img src="/img/micuenta.png" width="48px"><br/>Mi cuenta</a><hr>
-->
	
</div>

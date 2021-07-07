<?php
/*include('bbdd.php');*/

$sql1="select * from menurepresentante where idrepresentante='".$idrepresentante."'"; 
//echo $sql1;
$result1=$conn->query($sql1);
$resultado1=$result1->fetchAll();
$ad[1]=$resultado1[0]['empresa'];
$ad[2]=$resultado1[0]['trabajo'];
$ad[3]=$resultado1[0]['cuenta'];

/*$result1=mysqli_query ($conn,$conn,$sql1) or die ("Invalid result empresas 1");
$ad[1]=mysqli_result($result1,0,'empresa');
$ad[2]=mysqli_result($result1,0,'trabajo');
$ad[3]=mysqli_result($result1,0,'cuenta');*/


$sql11="select * from menurepresentantenombre where idrepresentante='".$idrepresentante."'";
$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();
$nad[1]=$resultado11[0]['empresa'];
$nad[2]=$resultado11[0]['trabajo'];
$nad[3]=$resultado11[0]['cuenta'];

/*$result11=mysqli_query ($conn,$conn,$sql11) or die ("Invalid result menucontabilidad");
$nad[1]=mysqli_result($result11,0,'empresa');
$nad[2]=mysqli_result($result11,0,'trabajo');
$nad[3]=mysqli_result($result11,0,'cuenta');*/


$sql12="select * from menurepresentanteimg where idrepresentante='".$idrepresentante."'";
$result12=$conn->query($sql12);
$resultado12=$result12->fetchAll();
$iad[1]=$resultado12[0]['empresa'];
$iad[2]=$resultado12[0]['trabajo'];
$iad[3]=$resultado12[0]['cuenta'];

/*$result12=mysqli_query ($conn,$conn,$sql12) or die ("Invalid result menucontabilidad");
$iad[1]=mysqli_result($result12,0,'empresa');
$iad[2]=mysqli_result($result12,0,'trabajo');
$iad[3]=mysqli_result($result12,0,'cuenta');*/


$sql13="select * from menurepresentanteenlace where idrepresentante='".$idrepresentante."'";
$result13=$conn->query($sql13);
$resultado13=$result13->fetchAll();
$ead[1]=$resultado13[0]['empresa'];
$ead[2]=$resultado13[0]['trabajo'];
$ead[3]=$resultado13[0]['cuenta'];

/*$result13=mysqli_query ($conn,$conn,$sql13) or die ("Invalid result menucontabilidad");
$ead[1]=mysqli_result($result13,0,'empresa');
$ead[2]=mysqli_result($result13,0,'trabajo');
$ead[3]=mysqli_result($result13,0,'cuenta');*/
 

if ($estado==1){;
$pagacc=$pag1r;
}else{;
$pagacc=$pag2r;
};
/*
$cli=mysqli_result($result1,0,'cliente');
$ges=mysqli_result($result1,0,'gestor');
*/
?>
<div id="menu22">
<a href="/<?php  echo $pagacc;?>"><img src="/img/inicio.png" width="48px"><br/>Inicio</a><hr>

<?php  for ($j=1;$j<count($ad)+1;$j++){;?>
<?php if ($ad[$j]=='1'){;?><a href="/<?php  echo $ead[$j];?>"><img src="/img/<?php  echo $iad[$j];?>" width="48px"><br/><?php  echo $nad[$j];?></a><hr><?php };?>
<?php };?>



      <?php if ($estadoemp=='1'){;?><a href="/administracion_n/modempresa2.php?idempresas=<?php  echo $ide;?>"><?php };?>
		<?php if ($estadoemp=='2'){;?><a href="/administracion_n/modempresav2.php?idempresas=<?php  echo $ide;?>"><?php };?>
  <!--    <img src="/img/micuenta.png" width="48px"><br/>Mi cuenta</a><hr>-->

<!-- AYUDA --><?php if ($ayuda=="1"){?>
<br/><a href="/menu_n/menu_ayuda.php"><img src="/img/ayuda.png" width="48px"><br/>Ayuda</a><br/><br/><hr>
<?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?php if ($trab=="1"){?>
<br/><a href="/menu_n/menu_trabajador.php"><img src="/img/trabajador.png"></a>
<?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?php if ($cli=="1"){?>
<a href="/menu_n/menu_clientes.php"><img src="/img/clientes.png"></a>
<?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($ges=="1"){?>
<a href="/menu_n/menu_gestores.php"><img src="/img/gestores.png"></a>
<?php };?><!-- FIN GESTORES -->	
</div>

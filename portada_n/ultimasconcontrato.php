<?php   
include('bbdd.php');
?>
		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
	  <!-- <link rel="stylesheet" href="/estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />-->
<?php 
if ($ide!=null){;
?>
<!--<div class="contenido">-->

<?php 
$sql="SELECT * from validar"; 
$sql.=" where validar in ('2')"; 
$sql.=" order by idvalidar desc"; 
//echo $sql;

$result=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_affected_rows();
?>
<table>
<tr class="enctab">
<td>Tipo</td>
<!--<td>Nº Empresa</td>-->
<td>Nombre Empresa</td>
<!--<td>NIF</td>-->
<td>Per.Con.</td><td>Tel.Con.</td><td>Email</td><td>Proyecto</td></tr>
<?php  for ($i=0; $i<$row; $i++){;$f=fmod($i,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>
<td><?php $validar=$num_rows['validar'];?>
<?php 
switch($validar){;
case 0:$nvalidar="Sin validar";break;
case 1:$nvalidar="En pruebas";break;
case 2:$nvalidar="En contrato";break;
case 3:$nvalidar="Sin contrato";break;
};
?>
<?php  echo $nvalidar;?>
</td>
<!--<td><?php $idvalidar=mysqli_result($result,$i,'idvalidar');?><?php  echo $idvalidar;?></td>-->
<td><?php $nombreemp=mysqli_result($result,$i,'nombreemp');?><?php  echo $nombreemp;?></td>
<!--<td><?php $nifemp=mysqli_result($result,$i,'nifemp');?><?php  echo $nifemp;?></td>-->
<td><?php $percontacto=mysqli_result($result,$i,'percontacto');?><?php  echo $percontacto;?></td>
<td><?php $telcontacto=mysqli_result($result,$i,'telcontacto');?><?php  echo $telcontacto;?></td>
<td><?php $emailemp=mysqli_result($result,$i,'email');?><?php  echo $email;?></td>
<td><?php $idpremp=mysqli_result($result,$i,'idpr');?>
<?php 
$sqli="SELECT * from proyectos where idproyectos='".$idpremp."'"; 

$resulti=$conn->query($sqli);
$num_rows=$resulti->fetchAll();
$row=count($num_rows);

//$resulti=mysqli_query ($conn,$sqli) or die ("Invalid resulti");
$logopremp=$num_rows[0]['logo'];
?>
<img src="../administracion_n/images/<?php  echo $logopremp;?>" width="50">

</td>

</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!--</div>-->



<?php }else{;
include ('../cierre.php');
 };?>


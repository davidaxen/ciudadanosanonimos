<?php   
include('bbdd.php');

if ($ide!=null){;
?>

<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >

<?php 
$mt=date("m",time());
$yt=date("Y",time());
$mt2=$mt+1;

$sql="SELECT * from empresas where estado='1'";
$sql.=" and mesalta between  '".$mt."' and '".$mt2."'";
$sql.=" and yearalta < '".$yt."'";
$sql.=" order by mesalta asc, idempresas asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<table>
<tr class="enctab"><td>Nº</td><td>Nombre Empresa</td><td>NIF</td><td>L. Admin.</td><td>L. Cli.</td><td>L. Empl.</td><td>Fecha Alta</td></tr>
<?php  for ($i=0; $i<$row; $i++){;
$f=fmod($i,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>
<td><?php $idempresas=mysqli_result($result,$i,'idempresas');?><?php  echo $idempresas;?></td>
<td><?php $nombre=mysqli_result($result,$i,'nombre');?><?php  echo $nombre;?></td>
<td><?php $nif=mysqli_result($result,$i,'nif');?><?php  echo $nif;?></td>
<td><?php $licadm=mysqli_result($result,$i,'licadm');?><?php  echo $licadm;?></td>
<td><?php $liccli=mysqli_result($result,$i,'liccli');?><?php  echo $liccli;?></td>
<td><?php $lictra=mysqli_result($result,$i,'lictra');?><?php  echo $lictra;?></td>
<td><?php $falta=mysqli_result($result,$i,'falta');?><?php  echo $falta;?></td>
</tr>
<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div id="imprimir">
<div class="titulo">
<p class="enc">LISTADO DE EMPRESAS POR PROYECTO</p>
</div> 
<div class="contenido">

<?php 

$sql="SELECT * from empresas where idproyectos='".$idproyectos."' order by estado desc, idempresas asc"; 
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>N� Empresa</td><td>Nombre Empresa</td><td>NIF</td><td>Dom.</td><td>Loc.</td><td>CP.</td><td>N� Cuenta</td><td>Logotipo</td><td>Estado</td></tr>
</thead>
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempresas=$rowmos['idempresas'];
$nombre=$rowmos['nombre'];
$estadop=$rowmos['estado'];
$nif=$rowmos['nif'];
$domicilio=$rowmos['domicilio'];
$localidad=$rowmos['localidad'];
$cp=$rowmos['cp'];
$ncc=$rowmos['ncc'];
$logotipo=$rowmos['logotipo'];
?>

<tr class="dattab">
<td><?php  echo $idempresas;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td><?php  echo $domicilio;?></td>
<td><?php  echo $localidad;?></td>
<td><?php  echo $cp;?></td>
<td><?php  echo $ncc;?></td>
<td><img src="../img/<?php  echo $logotipo;?>" width="50"></td>
<td>
<a href="lcempresap.php?idempresas=<?php echo $idempresas;?>">
<?php if($estadop=='1'){;?>Alta<?php }else{;?>Baja<?php };?>
</a>
</td>
</tr>

<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

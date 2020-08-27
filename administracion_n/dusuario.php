<?php  
include('bbdd.php');

if ($ide!=null){;


$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['usuario'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['usuario'];

include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON ADMINISTRADORES</p></div>
<div class="contenido">


<div class="main">
<a href="iusuario.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Crear de Administradores</span></a>

<a href="musuario.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificacion de Administradores</span></a>

<a href="lusuario.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Administradores</span></a>
</div>



</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>


<?php
include('../bbdd/sqlfacturacion.php');


if (isset($_GET[compactada]))
{
      $a=stripslashes ($_GET[compactada]);
      $mi_array=unserialize($a);
      $compactada=serialize($mi_array);
			$compactada=urlencode($compactada);
$user=$mi_array['user'];        
$pass=$mi_array['pass']; 
$com=$mi_array['com']; 
$img=$mi_array['img']; 
$ide=$mi_array['ide']; 
}  

$sql="select * from menuexistencias where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();

$ex1=$resultado[0]['materiales'];
$ex2=$resultado[0]['herramientas'];
$ex3=$resultado[0]['vestuario'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuexistencias");
$ex1=mysqli_result($result,0,'materiales');
$ex2=mysqli_result($result,0,'herramientas');
$ex3=mysqli_result($result,0,'vestuario');*/
?>
<html>
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - PROGRAMA DE FACTURACION Y GESTION DE LA EMPRESA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="estilo/reset-min.css">
		<link rel="stylesheet" href="estilo/style.css" type="text/css" media="screen" href="indexprueba33m.php" charset="utf-8" />
		<link rel="stylesheet" href="estilo/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="estilo/print.css" type="text/css" media="print" charset="utf-8" />
		</head>
<body>
<div id="logo2"><img src="../img/<?php  echo $img;?>" width=200 height=60 border=0>
<br>Menu Existencias</div> 	

<!-- EXISTENCIAS -->
			<li><a>EXISTENCIAS</a>
		
				<ul>
        <?php if ($ex1=='1'){;?>          
          <li><a href="../existencias/dexistencia.php">MATERIALES</a>
                    <?php };?>
        <?php if ($ex2=='1'){;?>
          <li><a href="../existencias/dherramientas.php">HERRAMIENTAS</a>
          <?php };?>
        <?php if ($ex3=='1'){;?>
					<li><a href="../existencias/dropa.php">VESTUARIO</a></li>
					<?php };?>


		
				</ul>
			</li>
<!-- FIN EXISTENCIAS -->
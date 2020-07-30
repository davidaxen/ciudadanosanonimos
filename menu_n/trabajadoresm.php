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

$sql2="select idempleado,estado from empleados where nif='".$user."' and idempresa='".$ide."'"; 
$result2=mysqli_query ($conn,$conn,$sql2) or die ("Invalid result empleados");
$idempl=mysqli_result($result2,0,'idempleado');
$estado=mysqli_result($result2,0,'estado');
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
<br>Menu Trabajadores</div> 	
<li><a>TRABAJADORES</a>
		
				<ul>
          <li><a href="../empleados/lempleados.php?idempl=<?php  echo $idempl;?>">DATOS</a></li>				
          <li><a href="../empleados/lempcont.php?idempl=<?php  echo $idempl;?>">CONTRATO</a></li>
					<li><a href="../empleados/dvrecibosempl.php?idempl=<?php  echo $idempl;?>">RECIBOS</a></li>
					<li><a href="../empleados/dvnominas.php?idempl=<?php  echo $idempl;?>">NOMINAS</a></li>
          <li><a href="../empleados/dvcertifiempl.php?idempl=<?php  echo $idempl;?>">CERTIFICADOS</a></li>
					<li><a>VACACIONES >></a>
						<ul>
							<li><a href="../empleados/avaca.php?idempl=<?php  echo $idempl;?>">ALTA</a></li>
							<li><a href="../empleados/lvaca.php?idempl=<?php  echo $idempl;?>">LISTADO</a></li>
						</ul>
					</li>
					<?php  if ($estado==1){;?>
          <li><a href="../empleados/lcuadranteemp.php?idempl=<?php  echo $idempl;?>">CUADRANTES</a></li>
					<?php };?>
		
				</ul>
				</li>
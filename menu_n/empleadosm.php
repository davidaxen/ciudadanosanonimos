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


$sql="select * from menuempleados where user='".$user."' and idempresa='".$ide."'";

$result=$conn->query($sql);
$resultado=$result->fetchAll();

$e1=$resultado[0]['empleado'];
$e2=$resultado[0]['recibos'];
$e3=$resultado[0]['anticipos'];
$e4=$resultado[0]['nominas'];
$e5=$resultado[0]['liquidacion'];
$e6=$resultado[0]['ficheros'];
$e7=$resultado[0]['certificados'];
$e8=$resultado[0]['irpf'];
$e9=$resultado[0]['segsocial'];
$e10=$resultado[0]['vacaciones'];
$e11=$resultado[0]['cuadrantes'];
$e12=$resultado[0]['ropa'];
$e13=$resultado[0]['cotizacion'];


/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$e1=mysqli_result($result,0,'empleado');
$e2=mysqli_result($result,0,'recibos');
$e3=mysqli_result($result,0,'anticipos');
$e4=mysqli_result($result,0,'nominas');
$e5=mysqli_result($result,0,'liquidacion');
$e6=mysqli_result($result,0,'ficheros');
$e7=mysqli_result($result,0,'certificados');
$e8=mysqli_result($result,0,'irpf');
$e9=mysqli_result($result,0,'segsocial');
$e10=mysqli_result($result,0,'vacaciones');
$e11=mysqli_result($result,0,'cuadrantes');
$e12=mysqli_result($result,0,'ropa');
$e13=mysqli_result($result,0,'cotizacion');*/
?>
<html>
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - PROGRAMA DE FACTURACION Y GESTION DE LA EMPRESA</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" type="text/css" href="estilo/reset-min.css">
		<link rel="stylesheet" href="estilo/style.css" type="text/css" media="screen" href="indexprueba33m.php" charset="utf-8" />
		<link rel="stylesheet" href="estilo/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="estilo/print.css" type="text/css" media="print" charset="utf-8" />
		</head>
<body>
<div id="logo2"><img src="../img/<?php  echo $img;?>" width=200 height=60 border=0>
<br>Menu Empleados</div> 	
<li><a>EMPLEADOS</a>
		
				<ul>
				
				<?php if ($e1=='1'){;?>
				  <li><a href="../empleados/dempleados.php?compactada=<?php  echo $compactada;?>" >EMPLEADOS</a></li>
        <?php };?>
        <?php if ($e2=='1'){;?>
          <li><a>RECIBOS >></a>
          	<ul>
							<li><a href="../empleados/altasrecibosempl.php?compactada=<?php  echo $compactada;?>" >EMISION</a></li>
							<li><a href="../empleados/dvrecibosempl.php?compactada=<?php  echo $compactada;?>" >EMISION POR PRODUCTO</a></li>
							<li><a href="../empleados/altasrecibosemplb.php?compactada=<?php  echo $compactada;?>" >EMISION 2</a></li>
							<li><a href="../empleados/dvrecibosemplb.php?compactada=<?php  echo $compactada;?>" >VISUALIZACIÓN</a></li>
						</ul>
          </li>
				<?php };?>
				<?php if ($e3=='1'){;?>
					<li><a>ANTICIPOS >></a>
						<ul>
							<li><a href="../empleados/altasanticipos.php?compactada=<?php  echo $compactada;?>">ALTA</a></li>
							<li><a href="../empleados/dvanticipos.php?compactada=<?php  echo $compactada;?>">VISUALIZACIÓN</a></li>
						</ul>
					</li>
					<?php };?>
				<?php if ($e4=='1'){;?>
					<li><a>NOMINAS >></a>
						<ul>
							<li><a href="../empleados/altasnominas.php?compactada=<?php  echo $compactada;?>">EMISION</a></li>
							<li><a href="../empleados/dvnominas.php?compactada=<?php  echo $compactada;?>">VISUALIZACION</a></li>
						</ul>
					</li>
					<?php };?>
				<?php if ($e5=='1'){;?>
					<li><a>LIQUIDACIONES >></a>
						<ul>
							<li><a href="../empleados/altasliquidaciones.php?compactada=<?php  echo $compactada;?>">EMISION</a></li>
							<li><a href="../empleados/dvliquidaciones.php?compactada=<?php  echo $compactada;?>">VISUALIZACION</a></li>
						</ul>
					</li>
					<?php };?>
				<?php if ($e6=='1'){;?>
					<li><a>FICHEROS >></a>
						<ul>
							<li><a href="../empleados/cvnominas.php?compactada=<?php  echo $compactada;?>">NOMINAS</a></li>
							<li><a href="../empleados/ficherocontrato.php?compactada=<?php  echo $compactada;?>">CONTRATOS</a></li>
							<li><a href="../empleados/ficheroAFI.php?compactada=<?php  echo $compactada;?>">ALTA Y BAJAS</a></li>
							<li><a href="../empleados/ficheroFAN.php?compactada=<?php  echo $compactada;?>">TC1 Y TC2</a></li>
							<li><a href="../empleados/certixml.php?compactada=<?php  echo $compactada;?>">CERTIFICADOS</a></li>
						</ul>
					</li>
          <?php };?>
				<?php if ($e7=='1'){;?>          
          <li><a href="../empleados/dvcertifiempl.php?compactada=<?php  echo $compactada;?>">CERTIFICADOS</a></li>
          <?php };?>
				<?php if ($e8=='1'){;?>
          <li><a href="../empleados/verirpf.php?compactada=<?php  echo $compactada;?>">IRPF</a></li>
          <?php };?>
				<?php if ($e9=='1'){;?>
					<li><a href="../empleados/verss.php?compactada=<?php  echo $compactada;?>">SEG. SOCIAL</a></li>
					<?php };?>
				<?php if ($e10=='1'){;?>
					<li><a>VACACIONES >></a>
						<ul>
							<li><a href="../empleados/avaca.php?compactada=<?php  echo $compactada;?>">ALTA</a></li>
							<li><a href="../empleados/lvaca.php?compactada=<?php  echo $compactada;?>">LISTADO</a></li>
						</ul>
					</li>
					<?php };?>
				<?php if ($e11=='1'){;?>
          <li><a href="../empleados/cuadrante.php?compactada=<?php  echo $compactada;?>">CUADRANTES</a></li>
		   <?php };?>
		   				<?php if ($e12=='1'){;?>
          <li><a href="../empleados/datosropa.php?compactada=<?php  echo $compactada;?>">VESTUARIO</a></li>
		   <?php };?>
				<?php if ($e13=='1'){;?>
					<li><a>COTIZACIONES >></a>
						<ul>
							<li><a href="../empleados/altasliquidaciones.php?compactada=<?php  echo $compactada;?>">GRUPO</a></li>
							<li><a href="../empleados/cotminima.php?compactada=<?php  echo $compactada;?>">COTIZACION MINIMA</a></li>
							<li><a href="../empleados/ityims.php?compactada=<?php  echo $compactada;?>">IT Y IMS</a></li>
						</ul>
					</li>
					<?php };?>
				</ul>
				</li>
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
         



$sql="select * from menufacturacion where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();

$f1=$resultado[0]['clientes'];
$f2=$resultado[0]['proveedores'];
$f3=$resultado[0]['facturas'];
$f4=$resultado[0]['facturasa'];
$f5=$resultado[0]['facturasb'];
$f6=$resultado[0]['facturasc'];
$f11=$resultado[0]['facturasd'];
$f7=$resultado[0][,'albaran'];
$f8=$resultado[0]['facturasrecibidas'];
$f9=$resultado[0]['hacienda'];
$f10=$resultado[0]['banco'];
$f11=$resultado[0]['gestores'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$f1=mysqli_result($result,0,'clientes');
$f2=mysqli_result($result,0,'proveedores');
$f3=mysqli_result($result,0,'facturas');
$f4=mysqli_result($result,0,'facturasa');
$f5=mysqli_result($result,0,'facturasb');
$f6=mysqli_result($result,0,'facturasc');
$f11=mysqli_result($result,0,'facturasd');
$f7=mysqli_result($result,0,'albaran');
$f8=mysqli_result($result,0,'facturasrecibidas');
$f9=mysqli_result($result,0,'hacienda');
$f10=mysqli_result($result,0,'banco');
$f11=mysqli_result($result,0,'gestores');*/
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
<br>MENU DE FACTURACION<p>
</div> 	
<!-- FACTURACION -->
			<li><a>LISTADOS</a>
		
				<ul>
				<?php if ($f1=='1'){;?>
          <li><a href="../facturacion/lclientes.php?compactada=<?php  echo $compactada;?>" >CLIENTES</a></li>
         <?php };?>
         <?php if ($f11=='1'){;?>
          <li><a href="../facturacion/lgestores.php?compactada=<?php  echo $compactada;?>" >GESTORES</a></li>
         <?php };?>
        <?php if ($f2=='1'){;?>
          <li><a href="../facturacion/lproveedores.php?compactada=<?php  echo $compactada;?>" >PROVEEDORES</a></li>
          <?php };?>
        <?php if ($f10=='1'){;?>
          <li><a href="../facturacion/lbancos.php?compactada=<?php  echo $compactada;?>" >BANCOS</a></li>
          <?php };?>
        <?php if ($f3=='1'){;?>
					<li><a>FACTURAS >></a>
						<ul>

        <?php if ($f4=='2'){;?>
							<li><a href="../facturacion/altasfacturas.php?compactada=<?php  echo $compactada;?>">EMISION GRUPAL</a></li>
							 <?php };?>
        <?php if ($f5=='2'){;?>
							<li><a href="../facturacion/altasfacturasp.php?compactada=<?php  echo $compactada;?>">EMISION POR PRODUCTO</a></li>
							 <?php };?>
        <?php if ($f6=='2'){;?>
							<li><a href="../facturacion/altasfacturasa.php?compactada=<?php  echo $compactada;?>">EMISION PARA ALQUILER</a></li>
							 <?php };?>
				<?php if ($f11=='2'){;?>
							<li><a href="../facturacion/altasfacturasi.php?compactada=<?php  echo $compactada;?>">PERSONALES</a></li>
							 <?php };?>
							<li><a href="../facturacion/verfactura.php?compactada=<?php  echo $compactada;?>">VISUALIZACIÓN</a></li>
						</ul>
					</li>
					<?php };?>
        <?php if ($f7=='1'){;?>
					<li><a>ALBARAN >></a>
						<ul>
							<li><a href="../facturacion/altasalbaranes.php?compactada=<?php  echo $compactada;?>">EMISION</a></li>
							<li><a href="../facturacion/veralbaranes.php?compactada=<?php  echo $compactada;?>">VISUALIZACION</a></li>
						</ul>
					</li>
					<?php };?>
        <?php if ($f8=='1'){;?>
					<li><a>FACTURAS RECIBIDAS >></a>
						<ul>
							<li><a href="../facturacion/altafrecibidas.php?compactada=<?php  echo $compactada;?>" >RECEPCION</a></li>
							<li><a href="../facturacion/verfrecibidas.php?compactada=<?php  echo $compactada;?>" >VISUALIZACION</a></li>
							<li><a href="../facturacion/verfrecibidasg.php?compactada=<?php  echo $compactada;?>">DESGLOSE GLOBAL</a></li>
						</ul>
					</li>
					<?php };?>
        <?php if ($f9=='1'){;?>
					<li><a>HACIENDA >></a>
						<ul>
							<li><a href="../facturacion/veriva.php?compactada=<?php  echo $compactada;?>">IVA</a></li>
							<li><a href="../facturacion/m347.php?compactada=<?php  echo $compactada;?>">MODELO 347</a></li>

						</ul>
					</li>
		<?php };?>

				</ul>
			</li>
<!-- FIN FACTURACION -->

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

$sql="select * from menucontabilidad where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();

$c1=$resultado[0]['cobros'];
$c2=$resultado[0]['pagos'];
$c3=$resultado[0]['recibos'];
$c4=$resultado[0]['asientos'];
$c5=$resultado[0]['listados'];
$c6=$resultado[0]['informes'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c1=mysqli_result($result,0,'cobros');
$c2=mysqli_result($result,0,'pagos');
$c3=mysqli_result($result,0,'recibos');
$c4=mysqli_result($result,0,'asientos');
$c5=mysqli_result($result,0,'listados');
$c6=mysqli_result($result,0,'informes');*/
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
<br>Menu Contabilidad</div> 	

<!-- CONTABILIDAD -->
			<li><a>CONTABILIDAD</a>
		
				<ul>
				<?php if ($c1=='1'){;?>
          <li><a href="../contabilidad/dcobros.php">COBROS</a>
          <?php };?>
        <?php if ($c2=='1'){;?>
          <li><a href="../contabilidad/dpagos.php">PAGOS</a>
          <?php };?>
        <?php if ($c3=='1'){;?>
					<li><a href="../contabilidad/recibos.php">RECIBOS</a></li>
					<?php };?>
        <?php if ($c4=='1'){;?>
					<li><a href="../contabilidad/asientos.php">ASIENTOS</a></li>
					<?php };?>
        <?php if ($c5=='1'){;?>
					<li><a>LISTADOS >></a>
						<ul>
							<li><a href="../contabilidad/lamort.php">INMOVILIZADO</a></li>
							<li><a href="../contabilidad/lif.php" >INVERSIONES FINANCIERAS</a></li>
						</ul>
					</li>
					<?php };?>
        <?php if ($c6=='1'){;?>
					<li><a>INFORMES >> </a>
								<ul>
    		    				<li><a href="../contabilidad/dbalance.php">BALANCES</a>
										<li><a href="../contabilidad/dpyg.php">PERDIDAS Y GANANCIAS</a></li>
										<li><a href="../contabilidad/dpresupuestos.php">PRESUPUESTOS</a></li>
										<li><a href="../contabilidad/ddiario.php">DIARIO</a></li>
										<li><a href="../contabilidad/danual.php">ANUAL</a></li>
										<li><a href="../contabilidad/dmayor.php">LIBRO MAYOR CUENTAS</a></li>
										<li><a href="../contabilidad/dmayorgrupo.php">LIBRO MAYOR SUBCUENTAS</a></li>
								</ul>
			</li>
			<?php };?>

				</ul>
			</li>
<!-- FIN CONTABILIDAD -->
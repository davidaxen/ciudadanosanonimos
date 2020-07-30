<?php
$sql="select * from menucontabilidad where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c1=mysqli_result($result,0,'cobros');
$c2=mysqli_result($result,0,'pagos');
$c3=mysqli_result($result,0,'recibos');
$c4=mysqli_result($result,0,'asientos');
$c5=mysqli_result($result,0,'listados');
$c6=mysqli_result($result,0,'informes');
?>

<!-- CONTABILIDAD -->
			<li><a href="#">Contabilidad</a>
		
				<ul>
<?php if ($c1=='1'){;?><li><a href="/contabilidad_n/dcobros.php">Cobros</a><?php };?>
<?php if ($c2=='1'){;?><li><a href="/contabilidad_n/dpagos.php">Pagos</a><?php };?>
<?php if ($c3=='1'){;?><li><a href="/contabilidad_n/recibos.php">Recibos</a></li><?php };?>
<?php if ($c4=='1'){;?><li><a href="/contabilidad_n/asientos.php">Asientos</a></li><?php };?>
<?php if ($c5=='1'){;?><li><a href="/contabilidad_n/dlistados.php">Listados</a></li><?php };?>
<?php if ($c6=='1'){;?><li><a href="/contabilidad_n/dinformes.php">Informes</a></li><?php };?>

				</ul>
			</li>
<!-- FIN CONTABILIDAD -->
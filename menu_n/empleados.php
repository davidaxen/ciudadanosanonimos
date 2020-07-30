<?php
$sql="select * from menuempleados where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
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
$e13=mysqli_result($result,0,'cotizacion');
?>

<li><a href="#">Empleados</a>
		
				<ul>
				
<?php if ($e1=='1'){;?><li><a href="/empleados_n/dempleados.php">Empleados</a></li><?php };?>
<?php if ($e2=='1'){;?><li><a href="/empleados_n/drecibos.php">Recibos</a></li><?php };?>
<?php if ($e3=='1'){;?><li><a href="/empleados_n/danticipos.php">Anticipos</a></li><?php };?>
<?php if ($e4=='1'){;?><li><a href="/empleados_n/dnominas.php">Nominas</a></li><?php };?>
<?php if ($e5=='1'){;?><li><a href="/empleados_n/dliquidaciones.php">Liquidaciones</a></li><?php };?>
<?php if ($e6=='1'){;?><li><a href="/empleados_n/dficheros.php">Ficheros</a></li><?php };?>
<?php if ($e7=='1'){;?><li><a href="/empleados_n/dvcertifiempl.php">Certificados</a></li><?php };?>
<?php if ($e8=='1'){;?><li><a href="/empleados_n/dhacienda.php">Hacienda</a></li><?php };?>
<?php if ($e9=='1'){;?><li><a href="/empleados_n/verss.php">Seg. Social</a></li><?php };?>
<?php if ($e10=='1'){;?><li><a href="/empleados_n/dvacaciones.php">Vacaciones</a></li><?php };?>
<?php if ($e11=='1'){;?><li><a href="/empleados_n/cuadrante.php">Cuadrantes</a></li><?php };?>
<?php if ($e12=='1'){;?><li><a href="/empleados_n/datosropa.php">Vestuario</a></li><?php };?>
<?php if ($e13=='1'){;?><li><a href="/empleados_n/dcotizaciones.php">Cotizaciones</a></li><?php };?>
				</ul>
				</li>